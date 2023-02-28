<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateDriver extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'create_drivers';

    protected $dates = [
        'expirydate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'licence_no',
        'expirydate',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getExpirydateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpirydateAttribute($value)
    {
        $this->attributes['expirydate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function hasVehicle()
    {
    return $this->vehicles()->exists();
    }
}
