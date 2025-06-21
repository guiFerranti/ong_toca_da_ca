<?php

use App\Models\ManageableContent;

if (!function_exists('get_content')) {
    function get_content($key, $default = null)
    {
        return ManageableContent::getContent($key, $default);
    }
}
