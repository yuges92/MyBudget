<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\App;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;


    protected function setUp(): void
    {

        parent::setUp();

//        $this->withoutExceptionHandling();

    }
}
