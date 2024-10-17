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
            'host' => '',
            'port' => 465,
            'encryption' => 'ssl',
            'username' => '',
            'password' => '',
            'active' => true,
        ];

        SmtpServer::create($smtpServers);
    }
}
