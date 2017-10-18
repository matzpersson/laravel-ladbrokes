<?php

namespace App\Http\Controllers;

use App\RaceCompetitor;
use Illuminate\Http\Request;

class RaceCompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Paginate a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate(Request $request)
    {
        // -- Handle sort
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = RaceCompetitor::orderBy($sortCol, $sortDir);
        } else {
            $query = RaceCompetitor::orderBy('id', 'asc');
        }

        // -- Handle filter
        if ($request->exists('race_id')) {
            $query->where(function($q) use($request) {
                $value = "{$request->race_id}";
                $q->where('race_id', $value);
            });
        }

        // -- Handle Page
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;

        return response()->json( $query->paginate($perPage) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RaceCompetitor  $raceCompetitor
     * @return \Illuminate\Http\Response
     */
    public function show(RaceCompetitor $raceCompetitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RaceCompetitor  $raceCompetitor
     * @return \Illuminate\Http\Response
     */
    public function edit(RaceCompetitor $raceCompetitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RaceCompetitor  $raceCompetitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RaceCompetitor $raceCompetitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RaceCompetitor  $raceCompetitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RaceCompetitor $raceCompetitor)
    {
        //
    }
}
