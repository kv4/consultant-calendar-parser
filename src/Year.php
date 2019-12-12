<?php

class Year
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var Month[]
     */
    private $months = [];

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function addMonth(Month $month)
    {
        $this->months[] = $month;

        return $this;
    }

    /**
     * @return Month[]
     */
    public function months()
    {
        return $this->months;
    }
}
