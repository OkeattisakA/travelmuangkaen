<?php

namespace App\Http\Controllers;

use App\Placereview;
use Illuminate\Http\Request;
use App\Place;
use App\Placephoto;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
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
        $input = $request->all();
        $destinationPath = 'uploads/reviews';
        $file = $request->file('placereview_photo');
        $name = 'Review-'.date("Y-m-d").'-'.uniqid().'-'.$file->getClientOriginalName();
        $file->move($destinationPath, $name);
        $input['placereview_photo'] = $name;

        Placereview::create($input);

        //Line Notify
        $token = DB::table('settings')->select('setting_linetoken')->first()->setting_linetoken;
        $user = Auth::user()->name;
        $place = $input['placereview_detail'];
        $msg = 'คุณ '.$user . ' ต้องการเพิ่มรีวิวสถานที่ท่องเที่ยว '.$place .' กรุณาตรวจสอบ https://travelmuangkaen.test/admin/places/'.$input['place_id'].'';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://notify-api.line.me/api/notify',[
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' .$token
            ],
            'form_params' => [
                'message' => $msg
            ]
        ]);
        Session::flash('flash_message','เขียนรีวิวสำเร็จ รอผู้ดูแลระบบตรวจสอบ');
        Session::flash('flash_type','success');

        activity()->log('WriteReviewPlace');
        return redirect("places/".$input['place_id']."");
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
