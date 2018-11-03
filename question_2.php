<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-9-16
 * Time: 下午12:36
 */
Class SingleTon
{
    private static $singleInstance = null;
    private function __construct()
    {

    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (SingleTon::$singleInstance == null) {
            self::$singleInstance = new SingleTon();
        }
        return self::$singleInstance;
    }
}