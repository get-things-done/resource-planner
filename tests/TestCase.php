<?php

namespace GetThingsDone\ResourcePlanner\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use GetThingsDone\ResourcePlanner\ResourcePlannerServiceProvider;

abstract class TestCase extends BaseTestCase
{

    protected function getPackageProviders($app)
    {
        return [ResourcePlannerServiceProvider::class];
    }
}
