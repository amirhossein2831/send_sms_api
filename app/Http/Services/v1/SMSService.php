<?php

namespace App\Http\Services\v1;

use App\Http\Services\Service;
use Illuminate\Support\Facades\Http;

class SMSService extends Service
{
    public function sendSMSRequest(string $number, $text): string
    {
        $header = $this->initialHeader($number, $text);

        $response = Http::get($header);

        if ($response->successful()) {
            return 'ok';
        }
        return 'failed';
    }

    private function initialHeader($number,$text): string
    {
        $user = env('SMS_API_USER');
        $password = env("SMS_API_PASSWORD");
        $senderNumber = env("SMS_API_SENDER");
        $textToSend = is_null($text) ?
            'باتشکر از شما بزودی با شما تماس خواهیم گرفت':
            $text;

        return "http://sms20.ir/send_via_get/send_sms.php".
        "?username=$user".
        "&password=$password".
        "&sender_number=$senderNumber".
        "&receiver_number=$number".
        "&note=$textToSend";
    }
}
