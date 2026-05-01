<?php
defined('GASCORE') || die();

return (object) [
    'plugin_id' => 'image-optimizer',
    'name' => 'Image optimizer',
    'description' => 'The image optimizer plugin is meant to compress and reduce the size of JPG, JPEG, PNG & GIF user file uploads for better performance & size reduction. Thanks to https://resmush.it/ for providing the free API. In case the API fails, the optimizer fallback is to standalone PHP functions.',
    'version' => '1.0.0',
    'url' => 'https://altumco.de/image-optimizer-plugin',
    'author' => 'GAS Open Source',
    'author_url' => 'https://github.com/rikhza/gas-url-shorter/',
    'status' => 'inexistent',
    'actions'=> true,
    'avatar_style' => 'background: #e0eafc; background: -webkit-linear-gradient(to right, #e0eafc, #cfdef3); background: linear-gradient(to right, #e0eafc, #cfdef3);',
    'icon' => '📸',
];
