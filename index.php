<?php

use GuzzleHttp\Exception\GuzzleException;
use TelegramGithubNotify\App\Http\Actions\SendNotifyAction;
use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

date_default_timezone_set(config('app.timezone'));

try {
    $sendNotifyAction = new SendNotifyAction();
    $sendNotifyAction();
} catch (GuzzleException $e) {
    error_log('\nError: ' . $e->getMessage());
}
