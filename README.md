# S3 Dashboard

![GitHub Release](https://img.shields.io/github/v/release/shaz3e/s3-dashboard)
![GitHub issues](https://img.shields.io/github/issues/shaz3e/s3-dashboard)
![GitHub Contributors](https://img.shields.io/github/contributors/shaz3e/s3-dashboard)
![PHP Version](https://img.shields.io/packagist/php-v/laravel/laravel)
![GitHub Stars](https://img.shields.io/github/stars/shaz3e/s3-dashboard)
![GitHub Forks](https://img.shields.io/github/forks/shaz3e/s3-dashboard)

S3 Dashboard is a Laravel-based starter kit designed for rapid application development with built-in roles and permissions, user management, and authentication features. This kit also provides essential middleware and multi-SMTP support, allowing a secure and scalable environment out-of-the-box.

---

## Features

### Authentication & User Management

-   **User Registration, Login, Password Reset, Forgot Password, and Email Verification**.
-   **Roles & Permissions**: Easily manage roles and permissions, thanks to [Spatie Laravel Permissions](https://spatie.be/docs/laravel-permission/).
-   **Three Default Roles**: `superadmin`, `developer`, and `tester` with unrestricted route access.

### Middleware

1. **Auth Middleware**: Secure routes with user authentication.
2. **Lock Middleware**: Lock users’ accounts when idle to prevent unauthorized access. Users can unlock by re-entering their password.
3. **Active Middleware**: Control access based on user activity status. New users are inactive by default and user can activate and verify their account from email link, but admins can activate/inactivate users and this will automatically log out on their next action.
4. **Verify Middleware**: Require email verification before granting account access. This is enabled by default for quick access but can be enabled/disabled via the **Authentication Settings**
5. **Locale Middleware**: Allows users to manage language settings. Currently, only English is supported. Contributions for other languages are welcome!

### SMTP & Email Settings

-   **Multi-SMTP Support**: Configure multiple SMTP servers to ensure failover support. If the default server fails, the system will attempt to send emails through other configured SMTP servers.
-   **ObserverServiceProvider**: Manage all observers from one place.
-   **PolicyServiceProvider**: Customize policy registration in cases where the model and policy names do not match.

### General Settings

Easily configure:

-   Application settings, including App Name, URL, Site URL, and Timezone.
-   Logo settings (Main Logo, Favicon, Light Theme Logo, Dark Theme Logo).
-   Authentication settings Email Verification (Enable/Disable) for new account registrations.
-   Email settings, such as Default Sending Email.

### Additional Functionalities

-   **Client & Staff Management**: Manage client and staff data in a single table, eliminating the need for multiple models.
-   **Customizable Middleware**: The `UserObserver` class can be used to customize user behaviors like activation and verification post-installation.
-   **Social Login**: Currently supported Github but in future Google and Facebook will be added Thanks to [Laravel Socialite](https://laravel.com/docs/11.x/socialite)

---

## Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/shaz3e/s3-dashboard.git
    ```
2. **Configure environment variables**
    ```bash
    cp .env.example .env
    ```
3. **Generate Key**
    ```bash
    php artisan key:generate
    ```
4. **Update Database Credentials**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=s3dashboard
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
5. **Install Dependencies**:
    ```bash
    composer install
    ```
6. **Run Migrations**:
    ```bash
    php artisan migrate
    ```
7. **Seed the Database**:
    ```bash
    php artisan db:seed
    ```

You are done now after seeding data there multiple staff and users are created
if the APP_ENV set to local you will get Auto Login option thanks to [Spatie Laravel Login Link](https://github.com/spatie/laravel-login-link)

### Custom Package

Specially designed for **S3 Dashboard**

-   [Email Templates](https://github.com/Shaz3e/email-templates/)

## Credit

-   Laravel: Built using [Laravel](https://laravel.com/), an elegant PHP framework for web artisans.
-   Author: [Shaz3e](https://www.shaz3e.com) | [YouTube](https://www.youtube.com/@shaz3e) | [Facebook](https://www.facebook.com/shaz3e) | [Twitter](https://twitter.com/shaz3e) | [Instagram](https://www.instagram.com/shaz3e) | [LinkedIn](https://www.linkedin.com/in/shaz3e/)
-   Supported By: [Diligent Creators](https://www.diligentcreators.com) | [Facebook](https://www.facebook.com/diligentcreators) | [Instagram](https://www.instagram.com/diligentcreators/) | [Twitter](https://twitter.com/diligentcreator) | [LinkedIn](https://www.linkedin.com/company/diligentcreators/) | [Pinterest](https://www.pinterest.com/DiligentCreators/) | [YouTube](https://www.youtube.com/@diligentcreator) [TikTok](https://www.tiktok.com/@diligentcreators) | [Google Map](https://g.page/diligentcreators)

![GitHub commit activity](https://img.shields.io/github/commit-activity/m/shaz3e/email-templates)

![GitHub Stats](https://github-readme-stats.vercel.app/api?username=shaz3e&show_icons=true&count_private=true&theme=default)

![GitHub Contributions Graph](https://github-profile-summary-cards.vercel.app/api/cards/profile-details?username=shaz3e&theme=default)
