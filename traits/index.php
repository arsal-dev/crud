<?php

trait myTait
{
    function hello()
    {
        return 'hello';
    }
}

trait myTrait2
{
    function hello()
    {
        return 'bye bye';
    }
}

class a
{
    use myTait, myTrait2;
}

class b
{
    use myTait;
}

class c
{
    use myTait;
}

$akaObj = new a;
echo $akaObj->hello();
// echo $akaObj->bye();
