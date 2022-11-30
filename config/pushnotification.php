<?php
/**
 * @see https://github.com/Edujugon/PushNotification
 */

return [
    'gcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'My_ApiKey',
    ],
    'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAAMC_zu0U:APA91bGAy7TSvzYmm8ZsSGX1Ip3M0pz1oPCkYUVoYfzjnvArMZJYbCYXYtrk_cv47DhefuEqMjUikMt_nZNsIhzPEy-RWvVPODmG-JJwKeAsjEvNuzyyJoIbfm7Fr81VSPwp22-nGTXs',
    ],
    'apn' => [
        'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
        'passPhrase' => 'secret', //Optional
        'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
        'dry_run' => true,
    ],
];
