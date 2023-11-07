<?php

namespace App\Controllers;

use App\Api;
use App\Models\Weather;

class WeatherController
{
    private Api $api;
    private const DEFAULT_CITY = "Cookietown";

    public function __construct()
    {
        $this->api = new Api();
    }

    public function index(): Weather
    {
        $city = $_SESSION['city'] ?? self::DEFAULT_CITY;

        return $this->api->fetchWeather($city);
    }

    public function set(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['city'])) {
            $_SESSION['city'] = $_GET['city'];
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}