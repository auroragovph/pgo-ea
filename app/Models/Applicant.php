<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'name'     => 'json',
        'personal' => 'json',
        'school'   => 'json',
        'family'   => 'json',
        'other'    => 'json',
        'props'    => 'json',
    ];


    public function getTrackingNumberAttribute()
    {
        return generate_tracking_number($this->id);
    }


    public function scholar()
    {
        return $this->hasOne(Scholar::class);
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class)->orderByDesc('created_at');
    }
}
