<?php

abstract class parentClass
{
    public static $salary = 50000;

    public function show()
    {
        echo $this->salary;
    }

    abstract protected static function increase();
}


class drived extends parentClass
{
    public static function increaseNow()
    {
        parent::$salary += 2000;
    }
    public static function increase()
    {
        self::increaseNow();
        echo parent::$salary;
    }
}


// $obj = new parentClass;
// echo parentClass::$salary;

// $obj = new drived;
// $obj->increase();

// drived::increase();
