<?php

class Input{
    public static function get($item){
        if (isset($_POST[$item])) {
            return trim($_POST[$item]);
        }
        elseif (isset($_GET[$item])) {
            return trim($_GET[$item]);
        }
        return '';
    }

    public function runSanitize($value, $sanitizeType){
        switch ($sanitizeType) {
            case 'string':
                $sanitizeValue = filter_var($value, FILTER_SANITIZE_STRING);
            break;
            case 'int':
                $sanitizeValue = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            break;
            case 'float':
                $sanitizeValue = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            break;
            case 'email':
                $sanitizeValue = filter_var($value, FILTER_SANITIZE_EMAIL);
            break;
            case 'url':
                $sanitizeValue = filter_var($value, FILTER_SANITIZE_URL);
            break;
        }
        return $sanitizeValue;
    }
}