<?php

interface parentInterface
{
    function sum($a, $b);
    function sub($a, $b);
}

interface aikOR
{
    function aikFunc();
}

class drived implements parentInterface, aikOR
{
    function sum($a, $b)
    {
        return $a + $b;
    }

    function sub($a, $b)
    {
        return $a - $b;
    }

    function aikFunc()
    {
        echo 'kuch bhi';
    }
}

$obj = new drived;
echo $obj->sub(50, 23);
