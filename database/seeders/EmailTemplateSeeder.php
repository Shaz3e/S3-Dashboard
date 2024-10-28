<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email_templates = array(
            array('id' => '1', 'key' => 'register', 'name' => 'Registration Email without Verification', 'subject' => 'Welcome to {{ app_name }}', 'placeholders' => '["[\\"app_name\\"", "\\"name\\"", "\\"email\\"", "\\"password\\"", "\\"login_url\\"]"]', 'content' => '<p>Hi <strong>{{ name }}</strong>,</p>
          <p>Welcome to <strong>{{ app_name }}</strong>! We&rsquo;re thrilled to have you with us.</p>
          <p>Here are your login details:</p>
          <ul>
          <li><strong>Email:</strong> {{ email }}</li>
          <li><strong>Password:</strong> {{ password }}</li>
          </ul>
          <p>You can log in to your account here: {{ login_url }}</p>
          <p>If you have any questions or need support, please feel free to reach out. We\'re here to help!</p>
          <p><em>Best regards,</em><br /><strong>{{ app_name }}</strong></p>', 'deleted_at' => NULL, 'created_at' => '2024-10-28 19:01:21', 'updated_at' => '2024-10-28 19:10:16'),
            array('id' => '2', 'key' => 'regiser_activate', 'name' => 'Register &amp; Activate Account', 'subject' => 'Activate Your Account with {{ app_name }}!', 'placeholders' => '["[\\"app_name\\"", "\\"activation_link\\"", "\\"name\\"]"]', 'content' => '<p>Hi <strong>{{ name }}</strong>,</p>
          <p>Welcome to <strong>{{ app_name }}</strong>! To complete your registration, please verify your email and activate your account by clicking the link below:</p>
          <p><a title="Activate Your Account" href="{{ activation_link }}" target="_blank" rel="noopener">Activate Your Account</a></p>
          <p>If you didn&rsquo;t sign up for this account, please ignore this email.</p>
          <p><em>Thank you,</em><br /><strong>The {{ app_name }} Team</strong></p>', 'deleted_at' => NULL, 'created_at' => '2024-10-28 19:04:03', 'updated_at' => '2024-10-28 19:09:59'),
            array('id' => '3', 'key' => 'verify_account', 'name' => 'Account Verification Email', 'subject' => 'Verify Your Account', 'placeholders' => '["[\\"name\\"", "\\"verification_link\\"", "\\"app_name\\"]"]', 'content' => '<p>Hi <strong>{{ name }}</strong>,</p>
          <p>Thank you for registering with us! To complete your account setup, please verify your email address.</p>
          <p>Click the link below to activate your account: <a title="Verify My Account" href="{{ verification_link }}">Verify My Account</a></p>
          <p>If you didn&rsquo;t create an account, please ignore this email.</p>
          <p>Thank you,<br /><strong>{{ app_name }}</strong></p>', 'deleted_at' => NULL, 'created_at' => '2024-10-28 19:14:42', 'updated_at' => '2024-10-28 19:15:15'),
            array('id' => '4', 'key' => 'reset_password', 'name' => 'Reset Password Email', 'subject' => 'Reset Your Password', 'placeholders' => '["[\\"name\\"", "\\"reset_password_link\\"", "\\"app_name\\"]"]', 'content' => '<p>Hi {{ name }},</p>
          <p>We received a request to reset your password. To set up a new password, please click the link below:</p>
          <p><a title="Reset My Password" href="{{ reset_password_link }}">Reset My Password</a></p>
          <p>If you didn&rsquo;t request a password reset, you can safely ignore this email.</p>
          <p><em>Thank you,</em><br /><strong>{{ app_name }}</strong></p>', 'deleted_at' => NULL, 'created_at' => '2024-10-28 19:53:04', 'updated_at' => '2024-10-28 19:53:04'),
            array('id' => '5', 'key' => 'reset_password_success', 'name' => 'Reset Password Successful', 'subject' => 'Your Password Has Been Reset', 'placeholders' => '["[\\"name\\"", "\\"app_name\\"", "\\"reset_password_link\\"]"]', 'content' => '<p>Hi <strong>{{ name }}</strong>,</p>
          <p>We wanted to let you know that your password has been successfully reset. If you made this change, no further action is needed.</p>
          <p>If you did not request a password reset, please contact our support team immediately to secure your account or <a title="reset your password" href="{{ reset_password_link }}" target="_blank" rel="noopener">reset your password</a>&nbsp;again.</p>
          <p><em>Thank you,</em><br /><strong>{{ app_name }}</strong></p>', 'deleted_at' => NULL, 'created_at' => '2024-10-28 20:09:47', 'updated_at' => '2024-10-28 20:25:31')
        );

        DB::table('email_templates')->insert($email_templates);
    }
}
