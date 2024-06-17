<?php
if (!function_exists('sanitize_input')) {
    function sanitize_input($input) {
        // Remove potentially malicious HTML tags
        $input = strip_tags($input);

        // Replace common XSS vectors with HTML entities
        $xss_filtered = preg_replace(
            array(
                '/[&]/', '/[<]/', '/[>]/', '/["]/', "/[']/",
                '/javascript:/i', '/vbscript:/i', '/expression\(/i', '/onload=/i', '/onerror=/i',
                '/onclick=/i', '/onmouseover=/i', '/onfocus=/i', '/onblur=/i', '/onchange=/i',
                '/oncontextmenu=/i', '/ondblclick=/i', '/onkeydown=/i', '/onkeypress=/i', '/onkeyup=/i',
                '/onmousedown=/i', '/onmousemove=/i', '/onmouseout=/i', '/onmouseup=/i', '/onreset=/i',
                '/onscroll=/i', '/onselect=/i', '/onsubmit=/i', '/onunload=/i', '/style=/i',
                '/<script>/i', '/<\/script>/i', '/<iframe>/i', '/<\/iframe>/i', '/<object>/i', '/<\/object>/i'
            ),
            array(
                '&amp;', '&lt;', '&gt;', '&quot;', '&#39;',
                '', '', '', '', '',
                '', '', '', '', '',
                '', '', '', '', '',
                '', '', '', '', '',
                '', '', '', '', ''
            ),
            $input
        );

         // Remove control characters and null bytes
         $xss_filtered = preg_replace('/[\x00-\x1F\x7F]/u', '', $xss_filtered);

         // Additional sanitization to handle UTF-7 encoding attacks
         $xss_filtered = str_replace(array(
             '+ADw-', '+AD4-', '+ACI-', '+AFs-', '+AF0-', '+AHs-', '+AH0-', '+IBg-', '+IBk-'
         ), array(
             '&lt;', '&gt;', '&quot;', '[', ']', '{', '}', '`', '|'
         ), $xss_filtered);
 
         return $xss_filtered;
    }
}

if (!function_exists('strip_tags_input')) {
    function strip_tags_input($input) {
        return strip_tags($input);
    }
}

if (!function_exists('safe_output')) {
    function safe_output($input) {
        // Encode special characters to HTML entities
        return htmlspecialchars($input, ENT_QUOTES, 'EUC-KR');
    }
}

?>
