<?php

namespace MahiMahi\EmailLog\Tests;

use Orchestra\Testbench\TestCase;
use MahiMahi\EmailLog\EmailLogServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EmailLogServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
