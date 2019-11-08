<?php

interface IQuoteStrategy
{

    public function getPrice($originPrice);

}

class NewCustomerQuoteStrategy implements IQuoteStrategy
{

    public function getPrice($originPrice)
    {
        return $originPrice;
    }

}

class OldCustomerQuoteStrategy implements IQuoteStrategy
{

    public function getPrice($originPrice)
    {
        return bcmul($originPrice, 0.9, 2);
    }

}

class VipCustomerQuoteStrategy implements IQuoteStrategy
{

    public function getPrice($originPrice)
    {
        return bcmul($originPrice, 0.8, 2);
    }
}

class QuoteContext
{

    private $quoteStrategy;

    public function __construct(IQuoteStrategy $strategy)
    {
        $this->quoteStrategy = $strategy;
    }

    public function getPrice($originPrice)
    {
        return $this->quoteStrategy->getPrice($originPrice);
    }

}

$old = new OldCustomerQuoteStrategy();
$context = new QuoteContext($old);
echo $context->getPrice(80)."\n";


/**
 * 策略传入上下文
 *
 * 扩展上下文或是策略
 */
