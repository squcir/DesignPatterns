<?php

interface Target {

    public function request();

}

class Adaptee
{

    public function specialRequest()
    {

    }

}

/**
 * 类适配器
 */
class ClassAdapter extends Adaptee implements Target
{

    public function request()
    {
        $this->specialRequest();
    }

}

/**
 * 对象适配器
 */
class ObjectAdapter implements Target
{

    /**
     * @var Adaptee
     */
    private $adaptee;

    public function request()
    {
        $this->adaptee->specialRequest();
    }

}