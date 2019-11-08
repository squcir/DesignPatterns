<?php

class Singleton
{

    private static $instance = null;

    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    private function __clone()
    {
    }

    public static function createInstance($name)
    {
        if (empty(self::$instance)) {
            self::$instance = new self($name);
        }

        return self::$instance;
    }

    public function getName()
    {
        return $this->name;
    }

}


$s = Singleton::createInstance(1);
echo $s->getName()."\n";
$s = Singleton::createInstance(2);
echo $s->getName()."\n";

