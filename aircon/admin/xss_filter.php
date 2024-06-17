<?php
    
    function sanitize_input($input_text) {
        $xss_filtered = preg_repAlace(array('/[&]/', '/[<]/', '/[>]/', '/["]/', "/[']/"), array('&amp;', '&lt;', '&gt;', '&quot;', '&#39;'), $input_text);
        $filtered_input = htmlspecialchars(strip_tags($xss_filtered), ENT_QUOTES, 'EUC-KR');
        return $filtered_input;
    }

if (!function_exists('strip_tags_input')) {
    function strip_tags_input($input_text) {
        return strip_tags($input_text);
    }
}
?>
