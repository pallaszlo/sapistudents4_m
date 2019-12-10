<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	
    protected $fillable = [
        'name', 'email','status','program_id', 'picture',
    ];

    protected $hidden = ['created_at', 'updated_at', 'picture'];

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
