<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $guarded = [];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function latestRemark()
    {
        return $this->remarks()->orderByDesc('created_at')->take(1);
    }
}
