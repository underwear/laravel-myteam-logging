<?php

return [
    // Myteam logger bot token
    'token' => env('MYTEAM_LOGGER_BOT_TOKEN'),

    // Myteam chat id
    'chat_id' => env('MYTEAM_LOGGER_CHAT_ID'),

    // Myteam api base url,
    'api_host' => env('MYTEAM_LOGGER_API_HOST', 'https://myteam.mail.ru')
];