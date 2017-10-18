<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Define one to many relationship for Race.
     *
     * @return \Illuminate\Http\Response
     */   
    public function races() {
        return $this->hasMany(Race::class, 'meeting_id');
    }

    /**
     * Define inverse one to many relationship for MeetingType.
     *
     * @return Object
     */
    public function type() {
        return $this->belongsTo(MeetingType::class)
            ->select(['id', 'name']);
    }


}
