<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleAssign extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'vehicle_assigns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'driver_id',
        'route_id',
        'vehicle_name_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function hasAssignedVehicle()
    {
        return $this->vehicles()->count() > 0;
    }

    public function driver()
    {
        return $this->belongsTo(CreateDriver::class, 'driver_id');
    }

    public function route()
    {
        return $this->belongsTo(TransportRoute::class, 'route_id');
    }

    public function vehicle_name()
    {
        return $this->belongsTo(Createvehicle::class, 'vehicle_name_id');
    }
}
