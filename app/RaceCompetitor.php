<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceCompetitor extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'race_id',
        'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Define inverse one to many relationship for RaceCompetitor.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function competitor() {
        return $this->belongsTo(RaceCompetitor::class)
            ->select(['id', 'name', 'position', 'race_id']);
    }

}
