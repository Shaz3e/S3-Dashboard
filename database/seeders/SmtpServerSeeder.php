<?php

namespace Database\Seeders;

use App\Models\SmtpServer;
use Illuminate\Database\Seeder;

class SmtpServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smtpServers = [
            'transport' => 'smtp',
            'host' => 'mail.shaz3e.com',
            'port' => 465,
            'encryption' => 'ssl',
            'username' => 'test@shaz3e.com',
            'password' => '3sEymGVpDDdQ8TOD1z',
            'active' => true,
        ];

        SmtpServer::create($smtpServers);
    }
}