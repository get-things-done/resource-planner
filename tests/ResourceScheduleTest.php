<?php
namespace GetThingsDone\ResourcePlanner;

use Illuminate\Support\Str;
use GetThingsDone\ResourcePlanner\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GetThingsDone\ResourcePlanner\Models\ResourceSchedule;

class ResourceScheduleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @dataProvider timestampRangeProvider
     */
    public function it_have_resource($resource, $expected)
    {   
        $resource_id = Str::uuid();

        ResourceSchedule::create([
            'resource_id' => $resource_id,
            'started_at' => $resource['started_at'],
            'ended_at' => $resource['ended_at']
        ]);

        $this->assertTrue(
            ResourceSchedule::where('resource_id', $resource_id)
                ->inTimestampRange(
                    $expected['started_at']->timestamp,
                    $expected['ended_at']->timestamp,
                )->count() === 1
        );
        
    }

    public function timestampRangeProvider()
    {
        return [
            'time (Now -> Next-Hour) in range (0 -> Tomorow)' => [
                [
                    'started_at' => 0,
                    'ended_at' => now()->addDay()
                ],
                [
                    'started_at' => now(),
                    'ended_at' => now()->addHour()
                ]
            ]
        ];
    }
}