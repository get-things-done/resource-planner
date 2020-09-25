<?php
namespace GetThingsDone\ResourcePlanner\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceSchedule extends Model
{
    protected $dates = [
        'started_at','ended_at'
    ];

    protected $fillable = [
        'resource_id','started_at','ended_at'
    ];

    public function scopeInTimestampRange($query,int $started_at = 0,int $ended_at = 0)
    {
        [$started_at, $ended_at] = $this->correctTimestampRange($started_at, $ended_at);
        return $this->where('started_at','<',$started_at)->where('ended_at','>',$ended_at);
    }

    public function scopeNotInTimestampRange($query,int $started_at = 0,int $ended_at = 0)
    {
        [$started_at, $ended_at] = $this->correctTimestampRange($started_at, $ended_at);
        return $this->where('started_at','>',$started_at)->where('ended_at','<',$ended_at);
    }

    public function correctTimestampRange(int $started_at,int $ended_at): array
    {
        if($started_at > $ended_at)
        {
            [$started_at, $ended_at] = [$ended_at, $started_at];
        }
        return [$started_at, $ended_at];
    }

}