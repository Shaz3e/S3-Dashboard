<?php

namespace App\Services;

use App\Models\SmtpServer;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendEmail($mailable, $recipient)
    {
        // Fetch active SMTP settings from the database
        $smtpSettings = SmtpServer::where('active', true)->get();

        foreach ($smtpSettings as $smtp) {
            try {
                // Dynamically set mail configuration
                Config::set('mail.mailers.smtp', [
                    'transport'  => $smtp->transport,
                    'host'       => $smtp->host,
                    'port'       => $smtp->port,
                    'encryption' => $smtp->encryption,
                    'username'   => $smtp->username,
                    'password'   => $smtp->password,
                    'timeout'    => $smtp->timeout,
                    'auth_mode'  => $smtp->auth_mode,
                ]);

                // Attempt to send the email
                Mail::to($recipient)->send($mailable);

                // Log success or break out if email is sent successfully
                // logger()->info('Email Sent using SMTP: ' . $smtp->host);
                // return response()->json(['message' => 'Email sent successfully']);
            } catch (Exception $e) {
                // Log failure and continue to the next SMTP setting
                // logger()->error('Email failed for SMTP: ' . $smtp->host . ' Error: ' . $e->getMessage());
            }
        }

        // If no SMTP server was able to send the email
        // return response()->json(['message' => 'All SMTP servers failed to send email'], 500);
    }
}
