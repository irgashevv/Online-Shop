<?php

include_once __DIR__ . "/AnnotationHelper.php";

class ValidationService
{
    public static function validate($comment, $value)
    {
        $data = AnnotationHelper::defineValueByAnnotation('valid', $comment);
        $data = json_decode($data . '', true);
        foreach ($data as $key => $validateValue) {
            switch ($key) {
                case 'type':
                    $result = self::typeValidate($validateValue, $value);
                    if (!$result) return false;
                    break;
                case 'maxlength':
                    $result = self::maxLengthValidate($validateValue, $value);
                    if (!$result) return false;
                    break;
                case 'max':
                    $result = self::maxValidate($validateValue, $value);
                    if (!$result) return false;
                    break;
                case 'min':
                    $result = self::minValidate($validateValue, $value);
                    if (!$result) return false;
                    break;
                case 'regx':
                    $result = self::regxValidate($validateValue, $value);
                    if (!$result) return false;
                    break;
            }
        }
        return true;
    }

    public static function typeValidate($validateValue, $value)
    {
        switch ($validateValue) {
            case 'string':
                if (!is_string($value)) {
                    MessageService::setError('Not String. Value = ' . $value);
                    return false;
                }
                break;
            case 'int':
                if (!is_numeric($value)) {
                    MessageService::setError('Not Integer. Value = ' . $value);
                    return false;
                }
                break;
        }
        return true;
    }

    public static function maxLengthValidate($validateValue, $value)
    {
        if ($validateValue < strlen($value)) {
            MessageService::setError('Wrong String Length. Value = ' . $value);
            return false;
        }
        return true;
    }

    public static function maxValidate($validateValue, $value)
    {
        if (intval($validateValue) < intval($value)) {
            MessageService::setError('Value More Max. Value = ' . $value);
            return false;
        }
        return true;
    }

    public static function minValidate($validateValue, $value)
    {
        if (intval($value) < intval($validateValue)) {
            MessageService::setError('Value more min. Value = ' . $value);
            return false;
        }
        return true;
    }

    public static function regxValidate($validateValue, $value)
    {
        if (!preg_match($validateValue, $value)) {
            MessageService::setError('Not valid picture. Value = ' . $value);
            return false;
        }
        return true;
    }
}