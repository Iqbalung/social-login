<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [

        'client_id' => env('GITHUB_CLIENT_ID','8707309c8420739c0277'),
        'client_secret' => env('GITHUB_CLIENT_SECRET','6cc530aac27d5768b18835efd52bfefee13d2f68'),
        'redirect' => env('GITHUB_REDIRECT_URL','http://localhost:8000/auth/github/callback'),

    ],

    'tiktok' => [
        'client_id' => env('TIKTOK_CLIENT_ID','awwcw974aaf8fxm8'),
        'client_secret' => env('TIKTOK_CLIENT_ID','1ea86426448127a7962ec12949f591c2'),
        'redirect' => env('TIKTOK_REDIRECT_URL','http://localhost:8000/auth/tiktok/callback'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID','347811452297-d1c8rpm9h40850ifr6hrmuot5dn1ojtp.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET','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'),
        'redirect' => env('GOOGLE_REDIRECT_URL','http://localhost:8000/auth/google/callback'),
    ],


    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID','616500133309792'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET','211a72d5ee06665db90d792217b5a4e6'),
        'redirect' => env('FACEBOOK_REDIRECT_URL','http://localhost:8000/auth/facebook/callback'),
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_CLIENT_ID','86qp6x4mc3n0u9'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET','5vMBu4ClpHFE4fJP'),
        'redirect' => env('LINKEDIN_REDIRECT_URL','http://localhost:8000/auth/linkedin/callback'),
    ],
    

];
