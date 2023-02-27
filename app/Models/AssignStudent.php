<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignStudent extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'assign_students';

    protected $dates = [
        'fromdate',
        'todate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_id',
        'master_id',
        'route_id',
        'vehicle_name_id',
        'stop_name_id',
        'fromdate',
        'todate',
        'amount_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function name()
    {
        return $this->belongsTo(User::class, 'name_id');
    }

    public function master()
    {
        return $this->belongsTo(CourseEnrollMaster::class, 'master_id');
    }

    public function route()
    {
        return $this->belongsTo(TransportRoute::class, 'route_id');
    }

    public function vehicle_name()
    {
        return $this->belongsTo(Createvehicle::class, 'vehicle_name_id');
    }

    public function stop_name()
    {
        return $this->belongsTo(TransportStop::class, 'stop_name_id');
    }

    public function getFromdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFromdateAttribute($value)
    {
        $this->attributes['fromdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTodateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTodateAttribute($value)
    {
        $this->attributes['todate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function amount()
    {
        return $this->belongsTo(TransportStop::class, 'amount_id');
    }
}
