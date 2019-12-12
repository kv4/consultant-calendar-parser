<?php

class Day
{
    private const WEEKEND = 'weekend';
    private const HOLIDAY = 'holiday';

    /**
     * @var int
     */
    private $number;

    /**
     * @var string[]
     */
    private $status;

    public function __construct($number, array $status = [])
    {
        $this->number = $number;
        $this->status = $status;
    }

    /**
     * Выходной день.
     *
     * @return bool
     */
    public function isHoliday()
    {
        return in_array(self::HOLIDAY, $this->status);
    }

    /**
     * Праздничный день.
     *
     * @return bool
     */
    public function isWeekend()
    {
        return in_array(self::WEEKEND, $this->status);
    }
}
