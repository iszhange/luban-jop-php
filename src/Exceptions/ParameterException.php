<?php
/**
 * 参数异常类
 */
namespace LuBan\Jop\Exceptions;


class ParameterException extends Exception
{

    /**
     * 默认消息
     * @var string
     */
    const DEFAULT_MESSAGE = 'Unknown';

    /**
     * 参数缺失
     * @var int
     */
    const PARAM_MISS = 6000;

    /**
     * 参数类型错误
     * @var int
     */
    const PARAM_TYPE_ERROR = 6001;


    public function __construct($message, $code = self::PARAM_MISS)
    {
        parent::__construct($message, $code, null);
    }


}