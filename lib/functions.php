<?php

namespace Oxboot\Theme;

/**
* Determine whether to show the sidebar
* @return bool
*/
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('oxboot/display_sidebar', false);
    return $display;
}
