<?php

namespace App\Models;

use Carbon\Carbon;

class Weather
{
    private string $name;
    private string $description;
    private float $temperature;
    private string $timezone;

    public function __construct
    (
        string $name,
        string $description,
        float  $temperature,
        string $timezone
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->temperature = $temperature;
        $this->timezone = $timezone;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return ucfirst($this->description);
    }

    public function getTemperature(): int
    {
        return round($this->temperature);
    }

    public function getCurrentTime(): string
    {
        $carbon = Carbon::now(timezone_name_from_abbr('', $this->timezone, 0));
        return $carbon->format('H:i');
    }
}
