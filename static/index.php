<?php


class myClass
{
    public static $name = 'Ahmed';

    public static function show()
    {
        echo self::$name;
    }
}


class drived extends myClass
{
    public static $name = "John";
    public static function show()
    {
        echo self::$name;
    }
}


// $myClass = new myClass;
// $myClass->show();

// echo myClass::show();

drived::show();
