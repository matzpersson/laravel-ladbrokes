<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'closing_time', 'meeting_id', 'remaining'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * Define inverse one to many relationship for Meeting.
     *
     * @return \Illuminate\Http\Response
     */    
    public function meeting() {
        return $this->belongsTo(Meeting::class)
            ->with("type")
            ->select();
    }

    /**
     * Define one to many relationship for RaceCompetitor.
     *
     * @return \Illuminate\Http\Response
     */   
    public function competitors() {
        return $this->hasMany(RaceCompetitor::class, 'race_id')->with('node');
    }

}
