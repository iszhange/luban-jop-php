<?php
/**
 * 参数校验类
 */

namespace LuBan\Jop\Libs;

use LuBan\Jop\Exceptions\ParameterException;

class RequestParamCheckUtil
{
    /**
     *
     * @param mixed $value
     * @param string $fieldName
     * @throws \Exception
     */
    public static function checkNotNull($value, $fieldName)
    {
        if (self::checkEmpty($value))
            throw new ParameterException("client-check-error:Missing Required Arguments: {$fieldName}" , ParameterException::PARAM_MISS);
    }

    /**
     *
     * @param string $value
     * @param int $maxLength
     * @param string $fieldName
     * @throws \Exception
     */
    public static function checkMaxLength($value, $maxLength, $fieldName)
    {
        if (!self::checkEmpty($value) && mb_strlen($value , 'UTF-8') > $maxLength)
            throw new ParameterException("client-check-error:Invalid Arguments:the length of {$fieldName} can not be larger than {$maxLength} .", ParameterException::PARAM_TYPE_ERROR);
    }

    /**
     *
     * @param string $value
     * @param int $maxSize
     * @param string $fieldName
     * @throws \Exception
     */
    public static function checkMaxListSize($value, $maxSize, $fieldName)
    {
        if (self::checkEmpty($value))
            return ;

        $list = explode(',', $value);
        if (count($list) > $maxSize)
            throw new ParameterException("client-check-error:Invalid Arguments:the listsize(the string split by \",\") of {$fieldName} must be less than {$maxSize} ." , ParameterException::PARAM_TYPE_ERROR);
    }

    /**
     *
     * @param integer|float $value
     * @param integer|float $maxValue
     * @param string $fieldName
     * @throws \Exception
     */
    public static function checkMaxValue($value, $maxValue, $fieldName)
    {
        if(self::checkEmpty($value))
            return ;

        self::checkNumeric($value,$fieldName);

        if ($value > $maxValue)
            throw new ParameterException("client-check-error:Invalid Arguments:the value of {$fieldName} can not be larger than {$maxValue} .", ParameterException::PARAM_TYPE_ERROR);
    }

    /**
     *
     * @param integer|float $value
     * @param integer|float $minValue
     * @param string $fieldName
     * @throws \Exception
     **/
    public static function checkMinValue($value, $minValue, $fieldName)
    {
        if (self::checkEmpty($value))
            return ;

        self::checkNumeric($value,$fieldName);

        if ($value < $minValue)
            throw new ParameterException("client-check-error:Invalid Arguments:the value of {$fieldName} can not be less than {$minValue} ." , ParameterException::PARAM_TYPE_ERROR);
    }

    /**
     *
     * @param mixed $value
     * @param string $fieldName
     * @throws \Exception
     */
    protected static function checkNumeric($value, $fieldName)
    {
        if (!is_numeric($value))
            throw new ParameterException("client-check-error:Invalid Arguments:the value of {$fieldName} is not number : {$value} .", ParameterException::PARAM_TYPE_ERROR);
    }

    /**
     *
     * @param mixed $value
     * @return bool
     */
    public static function checkEmpty($value)
    {
        if (!isset($value))
            return true ;
        if ($value === null )
            return true;
        if (is_array($value) && count($value) == 0)
            return true;
        if (is_string($value) &&trim($value) === "")
            return true;

        return false;
    }

}