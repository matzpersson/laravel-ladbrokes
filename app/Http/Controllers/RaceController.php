<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{

    /**
     * Reset race close.
     *
     * @return \Illuminate\Http\Response
     */
    public function restart()
    {

        // -- For demonstration purposes only.
        // -- Re-seed the closing time to demonstrate row closure after closing time incrementing each race with 1 then 2 minutes.
        date_default_timezone_set('Australia/Brisbane');
        $races = Race::all();
        $increment = 1;
        foreach ($races as $race) {

            $starttime = date('Y-m-d H:i:s',strtotime('+' . $increment . ' minutes'));
            $race->closing_time = $starttime;
            $race->save();

            $increment += 2;
        }
        return Race::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Race::with("meeting")->get();
    }

    /**
     * Display a paginated listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginate(Request $request)
    {

        // -- Hardcoded timezone is not good but works for the sake of the demo Should probably be UTC closing time applying closing time to local time
        // -- as a flight would do.
        date_default_timezone_set('Australia/Brisbane');
        $now = date('y-m-d H:i:s');

        // -- Handle sort
        if (request()->has('sort')) {

            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Race::with("meeting")->where('closing_time','>',$now)->orderBy($sortCol, $sortDir);

        } else {

            $query = Race::with("meeting")->where('closing_time','>',$now)->orderBy('closing_time', 'asc');

        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json( $query->paginate($perPage) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $race = Race::findOrFail($id);
        $race->update($request->all());

        return response()->json($job, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $race = Race::findOrFail($id);
        $race->delete();

        return response()->json(null, 204);
    }
}
