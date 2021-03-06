# Laravel Myteam logger

Send logs to [Myteam](https://biz.mail.ru/myteam/) chat via Myteam bot

## Install

```bash
composer require underwear/laravel-myteam-logging
```

Define Myteam Bot Token and chat id (users myteam id) and set as environment parameters.
Add to <b>.env</b> 

```
MYTEAM_LOGGER_BOT_TOKEN=id:token
MYTEAM_LOGGER_CHAT_ID=chat_id
MYTEAM_LOGGER_API_HOST=https://myteam.mail.ru/
```


Add to <b>config/logging.php</b> file new channel:

```php
'myteam' => [
    'driver' => 'custom',
    'via'    => MyteamLogger\MyteamLogger::class,
    'level'  => 'debug',
]
```

If your default log channel is a stack, you can add it to the <b>stack</b> channel like this
```php
'stack' => [
    'driver' => 'stack',
    'channels' => ['single', 'myteam'],
]
```

Or you can simply change the default log channel in the .env 
```
LOG_CHANNEL=myteam
```

Publish config file
```
php artisan vendor:publish --provider "MyteamLogger\MyteamLoggerServiceProvider"
```

## Create bot

For using this package you need to create Myteam bot

See the official docs [Myteam BOT API Docs](https://myteam.mail.ru/botapi/)

## Credits
* [Igor Filippov](https://github.com/underwear) (maintainer)
* [Kamil Mukhametzyanov](https://github.com/GrKamil) (used his telegram logger as foundation)
