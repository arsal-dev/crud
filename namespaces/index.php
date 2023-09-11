<?php
include 'first.php';
include 'second.php';

// use function first\myFunc;

$first = new second\hello;
echo $first->myFunc();

// echo myFunc();
