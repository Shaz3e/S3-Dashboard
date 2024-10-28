<?php

return [
    'client' => [
        'list',
        'create',
        'read',
        'update',
        'delete',
        'restore',
        'force.delete'
    ],
    'user' => [
        'list',
        'create',
        'read',
        'update',
        'delete',
        'restore',
        'force.delete'
    ],
    'smtp-server' => [
        'list',
        'create',
        'read',
        'update',
        'delete',
        'restore',
        'force.delete'
    ],
    'role' => [
        'list',
        'create',
        'read',
        'update',
        'delete',
        'restore',
        'force.delete'
    ],

    // Settings Permissions
    'general-setting' => [
        'list',
        'read',
        'update',
    ],
    'auth-setting' => [
        'list',
        'read',
        'update',
    ],
];
