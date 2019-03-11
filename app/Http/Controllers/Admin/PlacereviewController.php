<?php

namespace App\Http\Controllers\Admin;

use App\Placereview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class PlacereviewController extends Controller
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
    public function destroy($placereview_id)
    {
        $placereview = Placereview::find($placereview_id);
        $placereview->delete();
        Session::flash('flash_message','ลบรีวิวสำเร็จ');
        Session::flash('flash_type','warning');

        return back();
    }

    public function approve($place_id,$placereview_id)
    {
        DB::table('placereviews')
            ->where('placereview_id', $placereview_id)
            ->update([
                'placereview_status' => 1
            ]);

        Session::flash('flash_message','อนุมัติรีวิวสำเร็จ');
        Session::flash('flash_type','success');

        return redirect("admin/places/".$place_id."");
    }
}
