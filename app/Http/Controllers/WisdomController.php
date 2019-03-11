<?php

namespace App\Http\Controllers;

use App\Wisdom;
use App\Wisdomphoto;
use Illuminate\Http\Request;

class WisdomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$wisdoms = Wisdom::where('wisdom_status',1)->get();
        $wisdoms = Wisdom::where('wisdom_status',1)->where('wisdom_switch',1)->get();
        return view('wisdoms.index',compact('wisdoms'));
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
    public function show($wisdom_id)
    {
        $wisdom = Wisdom::find($wisdom_id);
        $wisdomphotos = Wisdomphoto::where('wisdom_id',$wisdom_id)->get();
        $wisdom->increment('wisdom_reader');
        return view('wisdoms.show',compact('wisdom','wisdomphotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($wisdom_id)
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

    public function wisdomsjson()
    {
        $wisdoms = Wisdom::where('wisdom_status',1)->where('wisdom_switch',1)->get();
        return response()->json($wisdoms);
    }

    public function wisdomsearch($wisdom_id)
    {
        $wisdom = Wisdom::find($wisdom_id);
        $wisdomphotos = Wisdomphoto::where('wisdom_id',$wisdom_id)->get();
        $wisdom->increment('wisdom_reader');
        $wisdom->increment('wisdom_search');
        return view('wisdoms.show',compact('wisdom','wisdomphotos'));
    }
}
