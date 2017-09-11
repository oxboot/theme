<?php

return [

    'paths' => [
        get_theme_file_path().'/views',
        get_parent_theme_file_path().'/views',
    ],

    'compiled' => wp_upload_dir()['basedir'].'/cache'
];
