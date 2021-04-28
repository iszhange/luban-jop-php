<?php


namespace LuBan\Jop\Interfaces;


use LuBan\Jop\Exceptions\ParameterException;

interface Request
{

    public function getVersion();

    public function getApiMethodName();

    public function getApiParas();

    /**
     * @throws ParameterException
     */
    public function check();

}