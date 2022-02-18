<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DateCollection;
use App\Http\Resources\DateResource;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Log::select('date')->distinct()->get();

        foreach ($dates as $key => $date) {
            $browser =  Log::select(DB::raw('browser, count(browser) as requests'))->where('date', '=', $date['date'])->groupBy('browser')->limit(3)->get();
            $url =  Log::select(DB::raw('URL, count(URL) as requests'))->where('date', '=', $date['date'])->groupBy('URL')->limit(1)->get();
            $requests = Log::all()->where('date', '=', $date['date'])->count();
            $dates[$key]['requests'] = $requests;
            $dates[$key]['popularURL'] = $url;
            $dates[$key]['popularBrowser'] = $browser;
        }

        return DateResource::collection($dates);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
