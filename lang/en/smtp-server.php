<?php

return [
    'error' => [
        'not_found' => 'SMTP Server not found',
        'restricted' => 'You are not allowed to take this action',
    ],

    'success' => [
        'created' => 'New SMTP Server has been created',
        'updated' => 'SMTP Server has been updated',
    ],

    'warning' => [],
    'info' => [],

    'created_at' => [],
    'updated_at' => [],

    'title' => [
        'index' => 'View SMTP Servers',
        'create' => 'Create New SMTP Server',
        'show' => 'View SMTP Server',
        'edit' => 'Edit SMTP Server',
    ],

    'breadcrumb' => [
        'index' => 'View SMTP Servers',
        'create' => 'Create New SMTP Server',
        'show' => 'View SMTP Server',
        'edit' => 'Edit SMTP Server',
    ],

    'menu' => [
        'index' => 'SMTP Servers Settings',
        'create' => 'Create SMTP Server',
        'show' => 'View SMTP Server',
        'edit' => 'Edit SMTP Server',
    ],

    'card_heading' => [],
    'card_text' => [],

    'field_label' => [],

    'help_text' => [
        'transport' => 'Select email sending protocol (e.g., SMTP, Sendmail, Mailgun)',
        'host' => 'Email server address (e.g., smtp.example.com)',
        'port' => 'Email server port number (e.g., 25,465,587)',
        'encryption' => 'Select encryption method (e.g., TLS, SSL, None)',
        'username' => 'Email account username',
        'password' => 'Email account password',
        'timeout' => 'Connection timeout (in seconds). Leave blank for no timeout.',
        'auth_mode' => 'Authentication method (Eneable this if your SMTP requires authentication)',
        'active' => 'Enable or disable email sending from this SMTP',
        'default' => 'Set this SMTP as default',
    ],

    'button' => [
        'index' => 'View All',
        'create' => 'Create',
        'show' => 'View',
        'edit' => 'Edit',
        'delete' => 'Delete',
    ],

    'table' => [
        'transport' => 'Transport Type',
        'host' => 'Host',
        'port' => 'Port',
        'encryption' => 'Encryption',
        'username' => 'Username',
        'password' => 'Password',
        'timeout' => 'Timeout in Seconds',
        'no_timeout' => 'No Timeout',
        'auth_mode' => 'Auth Mode',
        'active' => 'Status',
        'default' => 'Default SMTP Connection',
        'actions' => 'Actions',
    ],
];
