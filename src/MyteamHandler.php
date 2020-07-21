<?php

namespace MyteamLogger;

use Exception;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

/**
 * Class MyteamHandler
 *
 * @package App\Logging
 */
class MyteamHandler extends AbstractProcessingHandler
{
    /**
     * Bot API token
     *
     * @var string
     */
    private $botToken;

    /**
     * Chat id for bot
     *
     * @var int
     */
    private $chatId;

    /**
     * Application name
     *
     * @string
     */
    private $appName;

    /**
     * Application environment
     *
     * @string
     */
    private $appEnv;

    /**
     * @var string
     */
    private $apiHost;

    /**
     * MyteamHandler constructor.
     *
     * @param int $level
     */
    public function __construct($level)
    {
        $level = Logger::toMonologLevel($level);

        parent::__construct($level, true);

        // define variables for making Myteam request
        $this->botToken = config('myteam-logger.token');
        $this->chatId = config('myteam-logger.chat_id');
        $this->apiHost = config ('myteam-logger.api_host');

        // define variables for text message
        $this->appName = config('app.name');
        $this->appEnv = config('app.env');
    }

    /**
     * @param array $record
     */
    public function write(array $record): void
    {
        if (!$this->botToken || !$this->chatId) {
            return;
        }

        // trying to make request and send notification
        try {
            file_get_contents(
                $this->apiHost . '/bot/v1/messages/sendText?'
                . http_build_query([
                    'text' => $this->formatText($record['formatted'], $record['level_name']),
                    'chatId' => $this->chatId,
                    'token' => $this->botToken
                ])
            );
        } catch (Exception $exception) {

        }
    }

    /**
     * @param string $text
     * @param string $level
     *
     * @return string
     */
    private function formatText(string $text, string $level): string
    {
        return $this->appName . '(' . $level . ')' . PHP_EOL . 'Env: ' . $this->appEnv . PHP_EOL . $text;
    }
}