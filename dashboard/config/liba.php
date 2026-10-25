<?php

return [
    'public_site_url' => rtrim(env('PUBLIC_SITE_URL', 'http://libaweb.test'), '/'),
    'gemini_model' => env('GEMINI_MODEL', 'gemini-2.5-flash'),
];
