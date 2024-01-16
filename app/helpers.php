<?php

if (!function_exists('generateList')) {
    function generateList($items)
    {
        $html = '<ul>';

        foreach ($items as $item) {
            $html .= '<li>' . $item . '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}

if (!function_exists('helloWorld')) {
    function helloWorld()
    {
        return "Hello World";
    }
}
