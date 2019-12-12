<?php

class Month
{
    /**
     * Номер месяца.
     *
     * @var int
     */
    private $number;

    /**
     * Название месяца.
     *
     * @var string
     */
    private $name;

    /**
     * @var Day[]
     */
    private $days = [];

    public function __construct($number, $name)
    {
        $this->number = $number;
        $this->name   = $name;
    }

    public function addDay(Day $day)
    {
        $this->days[] = $day;

        return $this;
    }

    /**
     * @return int
     */
    public function number(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
