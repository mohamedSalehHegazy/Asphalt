<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'long', 'late', 'description','img','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
