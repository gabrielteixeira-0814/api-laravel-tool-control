<?php

namespace Tests;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;


//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
//use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    private Generator $faker;

    public function setUp(): void
    {
        parent::setUp();
        // Artisan::call('passport:install');
        Artisan::call('migrate:refresh');
    }

    public function __get($key) {
    
        if ($key === 'faker')
            return $this->faker;
        throw new Exception('Unknown Key Requested');
    }
}