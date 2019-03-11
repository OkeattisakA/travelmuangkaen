<?php

namespace App\Http\Controllers\Member;

use App\Place;
use App\Placephoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PlacephotoController extends Controller
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
    public function create($place_id)
    {
        $place = Place::find($place_id);
        $placephotos = Placephoto::where('place_id',$place_id)->get();
        return view('member.placephotos.create',compact('place','placephotos'));
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
        $input['place_id'] = $input['place_id'];
        $destinationPath = 'uploads/images';
        if($file = $request->file('placephotos')){
            foreach ($request->placephotos as $placephoto){
                $name = date("Y-m-d").'-'.uniqid().'-'.$input['place_id'].'-'.$placephoto->getClientOriginalName();
                $placephoto->move($destinationPath, $name);
                $input['placephoto_path'] = $name;
                $response = Placephoto::create($input);
            }
            Session::flash('flash_message','อัพโหลดรูปภาพสำเร็จ');
            Session::flash('flash_type','success');

            activity()->log('UploadPlacePhoto');
            return redirect("member/placephotos/create/".$input['place_id']."");
        }else{
            Session::flash('flash_message','กรุณาเพิ่มรูปภาพ');
            Session::flash('flash_type','error');
            return redirect("member/placephotos/create/".$input['place_id']."");
        }
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
    public function destroy(Request $request,$placephoto_id)
    {
        $input = $request->all();
        $place_id = $input['place_id'];
        $placephoto = Placephoto::find($placephoto_id);
        $placephoto_path = $placephoto['placephoto_path'];
        unlink(public_path('uploads/images/'.$placephoto_path));
        $placephoto->delete();
        activity()->log('DeletePlacePhoto');
        return redirect("member/placephotos/create/".$place_id."");
    }
}
