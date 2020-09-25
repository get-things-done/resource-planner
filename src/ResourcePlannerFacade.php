<?php

namespace GetThingsDone\ResourcePlanner;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GetThingsDone\ResourcePlanner\Skeleton\SkeletonClass
 */
class ResourcePlannerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'resource-planner';
    }
}
