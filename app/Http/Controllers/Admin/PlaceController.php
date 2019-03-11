<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\Placephoto;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('admin.places.index',compact('places'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('place-create')) {
            abort(403);
        }

        $setting = Setting::all();
        return view('admin.places.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'place_name_th' => 'required',
            'place_name_eng' => 'required',
            'place_address' => 'required',
            'place_address' => 'required',
            'place_detail' => 'required',
            'place_lat' => 'required',
            'place_lng' => 'required',
            'place_cover' => 'required',
            'place_tagline' => 'required',
//            'place_tag' => 'required',
        ]);

        $input = $request->all();
        $input['place_publishby'] = Auth::id();
        $input['place_status'] = 1;
        $input['place_switch'] = 1;
        $input['place_reader'] = 0;


        $destinationPath = 'uploads/covers';
        $file = $request->file('place_cover');
        $name = 'Cover-'.date("Y-m-d").'-'.uniqid().'-'.$file->getClientOriginalName();
        $file->move($destinationPath, $name);

        $input['place_cover'] = $name;

        $id = Place::create($input);
        $insertedId = $id->place_id;

        //Line Notify
        $token = DB::table('settings')->select('setting_linetoken')->first()->setting_linetoken;
        $user = Auth::user()->name;
        $place = $input['place_name_th'];
        $msg = 'คุณ '.$user . ' ต้องการเพิ่มข้อมูลสถานที่ท่องเที่ยว '.$place .' กรุณาตรวจสอบ https://travelmuangkaen.test/admin/places/'.$insertedId.'';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://notify-api.line.me/api/notify',[
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' .$token
            ],
            'form_params' => [
                'message' => $msg,
            ]
        ]);

        activity()->log('CreatePlace');

        Session::flash('flash_message','เพิ่มข้อมูลสถานที่ท่องเที่ยวสำเร็จ');
        Session::flash('flash_type','success');
        return redirect("admin/placephotos/create/".$insertedId."");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($place_id)
    {
        $place = Place::find($place_id);
        $placephotos = Placephoto::where('place_id',$place_id)->get();
        return view('admin.places.show',compact('place','placephotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($place_id)
    {
        if (!Gate::allows('place-edit')) {
            abort(403);
        }
        $place = Place::findOrFail($place_id);
        return view('admin.places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $place_id)
    {
        $place = Place::findOrFail($place_id);
        $input = $request->all();
        if ($request->hasFile('place_cover')) {

            $destinationPath = 'uploads/covers';

            $file = $request->file('place_cover');
            $name = 'Cover-'.date("Y-m-d").'-'.uniqid().'-'.$file->getClientOriginalName();
            $file->move($destinationPath, $name);
            $input['place_cover'] = $name;
        }

        $place->update($input);

        Session::flash('flash_message','แก้ไขข้อมูลสำเร็จ');
        Session::flash('flash_type','info');

        return redirect("admin/places/".$place_id."");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($place_id)
    {
        if (!Gate::allows('place-delete')) {
            abort(403);
        }

        $place = Place::find($place_id);
        $place->delete();

        Session::flash('flash_message','ลบข้อมูลสำเร็จ');
        Session::flash('flash_type','warning');
        activity()->log('DeletePlace');
        return redirect("admin/places/");
    }

    public function approve($place_id)
    {
        DB::table('places')
            ->where('place_id', $place_id)
            ->update([
                'place_status' => 1,
                'place_switch' => 1
            ]);

        Session::flash('flash_message','อนุมัติสถานที่ท่องเที่ยวสำเร็จ');
        Session::flash('flash_type','success');

        return redirect("admin/places/".$place_id."");
    }

    public function swshow($place_id)
    {
        DB::table('places')
            ->where('place_id', $place_id)
            ->update([
                'place_switch' => 1
            ]);

        Session::flash('flash_message','เปิดแสดงผล');
        Session::flash('flash_type','success');

        return redirect("admin/places/".$place_id."");
    }

    public function swnotshow($place_id)
    {
        DB::table('places')
            ->where('place_id', $place_id)
            ->update([
                'place_switch' => 0
            ]);
        Session::flash('flash_message','ปิดแสดงผล');
        Session::flash('flash_type','success');

        return redirect("admin/places/".$place_id."");
    }

}
