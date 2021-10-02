<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{

    protected $guarded = [];
    
    protected $casts = [
        'period' => 'json'
    ];

    public function latestRemark()
    {
        return $this->remarks()->orderByDesc('created_at')->take(1);
    }
}
