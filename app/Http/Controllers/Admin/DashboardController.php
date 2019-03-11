<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\Placereview;
use App\Setting;
use App\Wisdom;
use App\Wisdomreview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('setting-manage')) {
            abort(403);
        }

        $places = Place::orderBy('created_at','DESC')->limit(5)->get();
        $placereviews = Placereview::orderBy('created_at','DESC')->limit(5)->get();

        $wisdoms = Wisdom::orderBy('created_at','DESC')->limit(5)->get();
        $wisdomreviews = Wisdomreview::orderBy('created_at','DESC')->limit(5)->get();
        $setting = Setting::all();
        return view('admin.dashboards.index',compact('setting','places','placereviews','wisdoms','wisdomreviews'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
