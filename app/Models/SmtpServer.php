<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SmtpServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport',
        'host',
        'port',
        'encryption',
        'username',
        'password',
        'timeout',
        'auth_mode',
        'active',
        'default',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($smtpServer) {
            // If the server is being set as default
            if ($smtpServer->default) {
                // Set other servers to not default
                self::where('id', '!=', $smtpServer->id)->update(['default' => false]);

                // Update .env file with the new default SMTP settings
                self::updateEnv($smtpServer);
            }
        });
    }

    protected static function updateEnv($smtpServer)
    {
        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        $envData = [
            'MAIL_MAILER' => $smtpServer->transport,
            'MAIL_HOST' => $smtpServer->host,
            'MAIL_PORT' => $smtpServer->port,
            'MAIL_USERNAME' => $smtpServer->username,
            'MAIL_PASSWORD' => "\"{$smtpServer->password}\"",
        ];

        // Update the key-value pairs
        foreach ($envData as $key => $value) {
            $envContent = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $envContent);
        }

        File::put($envPath, $envContent);
    }
}
