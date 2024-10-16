<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Phone/Mobile/WhatsApp Validation
    |--------------------------------------------------------------------------
    |
    | ^[a-zA-Z]: Attribute must start with a letter.
    | [a-zA-Z0-9._-]: Allows letters, numbers, periods, dashes, and underscores.
    | {5,31}: Ensures Attribute has between 6 and 32 characters.
    |
    */
    'phone' => 'regex:/^\+[1-9]{1}[0-9]{1,3}[0-9]{7,14}$/',

    /*
    |--------------------------------------------------------------------------
    | Default String Validation for Skype
    |--------------------------------------------------------------------------
    |
    | ^[a-zA-Z]: Attribute must start with a letter.
    | [a-zA-Z0-9._-]: Allows letters, numbers, periods, dashes, and underscores.
    | {5,31}: Ensures Attribute has between 6 and 32 characters.
    |
    */
    'skype' => 'regex:/^[a-zA-Z][a-zA-Z0-9._-]{5,31}$/',
];
