<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Wisdom;
use App\Wisdomphoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
class WisdomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisdoms = Wisdom::all();
        return view('admin.wisdoms.index',compact('wisdoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('wisdom-create')) {
            abort(403);
        }

        $setting = Setting::all();
        return view('admin.wisdoms.create',compact('setting'));
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
            'wisdom_name_th' => 'required',
            'wisdom_name_eng' => 'required',
            'wisdom_address' => 'required',
            'wisdom_lat' => 'required',
            'wisdom_lng' => 'required',
            'wisdom_detail' => 'required',
            'wisdom_cover' => 'required',
            'wisdom_tagline' => 'required',
        ]);

        $input = $request->all();
        $input['wisdom_publishby'] = Auth::id();
        $input['wisdom_status'] = 1;
        $input['wisdom_switch'] = 1;
        $input['wisdom_reader'] = 0;

        $destinationPath = 'uploads/covers';
        $file = $request->file('wisdom_cover');
        $name = 'Cover-'.date("Y-m-d").'-'.uniqid().'-'.$file->getClientOriginalName();
        $file->move($destinationPath, $name);

        $input['wisdom_cover'] = $name;

        $id = Wisdom::create($input);
        $insertedId = $id->wisdom_id;

        //Line Notify
        $token = DB::table('settings')->select('setting_linetoken')->first()->setting_linetoken;
        $user = Auth::user()->name;
        $wisdom = $input['wisdom_name_th'];
        $msg = 'คุณ '.$user . ' ต้องการเพิ่มข้อมูลภูมิปัญญาท้องถิ่น '.$wisdom .' กรุณาตรวจสอบ https://travelmuangkaen.test/admin/wisdoms/'.$insertedId.'';
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

        activity()->log('CreateWisdom');

        Session::flash('flash_message','เพิ่มข้อมูลภูมิปัญญาท้องถิ่นสำเร็จ');
        Session::flash('flash_type','success');
        return redirect("admin/wisdomphotos/create/".$insertedId."");
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
        return view('admin.wisdoms.show',compact('wisdom','wisdomphotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($wisdom_id)
    {
        if (!Gate::allows('wisdom-edit')) {
            abort(403);
        }
        $wisdom = Wisdom::findOrFail($wisdom_id);
        return view('admin.wisdoms.edit', compact('wisdom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $wisdom_id)
    {
        $wisdom = Wisdom::findOrFail($wisdom_id);
        $input = $request->all();
        if ($request->hasFile('wisdom_cover')) {

            $destinationPath = 'uploads/covers';

            $file = $request->file('wisdom_cover');
            $name = 'Cover-'.date("Y-m-d").'-'.uniqid().'-'.$file->getClientOriginalName();
            $file->move($destinationPath, $name);
            $input['wisdom_cover'] = $name;
        }

        $wisdom->update($input);

        Session::flash('flash_message','แก้ไขข้อมูลสำเร็จ');
        Session::flash('flash_type','info');

        return redirect("admin/wisdoms/".$wisdom_id."");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($wisdom_id)
    {
        if (!Gate::allows('wisdom-delete')) {
            abort(403);
        }

        $wisdom = Wisdom::find($wisdom_id);
        $wisdom->delete();

        Session::flash('flash_message','ลบข้อมูลสำเร็จ');
        Session::flash('flash_type','warning');

        activity()->log('DeleteWisdom');

        return redirect("admin/wisdoms/");
    }

    public function approve($wisdom_id)
    {
        DB::table('wisdoms')
            ->where('wisdom_id', $wisdom_id)
            ->update([
                'wisdom_status' => 1,
                'wisdom_switch' => 1
            ]);

        Session::flash('flash_message','อนุมัติภูมิปัญญาท้องถิ่นสำเร็จ');
        Session::flash('flash_type','success');

        return redirect("admin/wisdoms/".$wisdom_id."");
    }

    public function swshow($wisdom_id)
    {
        DB::table('wisdoms')
            ->where('wisdom_id', $wisdom_id)
            ->update([
                'wisdom_switch' => 1
            ]);

        Session::flash('flash_message','เปิดแสดงผล');
        Session::flash('flash_type','success');

        return redirect("admin/wisdoms/".$wisdom_id."");
    }

    public function swnotshow($wisdom_id)
    {
        DB::table('wisdoms')
            ->where('wisdom_id', $wisdom_id)
            ->update([
                'wisdom_switch' => 0
            ]);
        Session::flash('flash_message','ปิดแสดงผล');
        Session::flash('flash_type','success');

        return redirect("admin/wisdoms/".$wisdom_id."");
    }

}
