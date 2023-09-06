<?php

class employee
{
    protected $name;
    protected $age;
    protected $salary;


    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function info()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Base Salary: " . $this->salary . "<br>";
    }
}


class manager extends employee
{
    public function info()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Salary: " . $this->salary + 50000 . "<br>";
    }
}


$emp1 = new employee('Ahmed', 22, '300,000');
$emp1->info();

echo '<br>';

$emp2 = new employee('Arsalan', 11, '20,000');
$emp2->info();

echo '<br>';

$manag1 = new manager('Azad Chaiwala', 88, 2000);
$manag1->info();