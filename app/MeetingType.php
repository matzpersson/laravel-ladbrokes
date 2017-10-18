<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingType extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Define one to many relationship for Meeting.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function meetings() {
        return $this->hasMany(Meeting::class, 'type_id');
    }

}
