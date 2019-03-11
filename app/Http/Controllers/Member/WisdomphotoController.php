<?php

namespace App\Http\Controllers\Member;

use App\Wisdom;
use App\Wisdomphoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WisdomphotoController extends Controller
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
    public function create($wisdom_id)
    {
        $wisdom = Wisdom::find($wisdom_id);
        $wisdomphotos = Wisdomphoto::where('wisdom_id',$wisdom_id)->get();
        return view('member.wisdomphotos.create',compact('wisdom','wisdomphotos'));
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
        $input['wisdom_id'] = $input['wisdom_id'];
        $destinationPath = 'uploads/images';
        if($file = $request->file('wisdomphotos')){
            foreach ($request->wisdomphotos as $wisdomphoto){
                $name = date("Y-m-d").'-'.uniqid().'-'.$input['wisdom_id'].'-'.$wisdomphoto->getClientOriginalName();
                $wisdomphoto->move($destinationPath, $name);
                $input['wisdomphoto_path'] = $name;
                $response = Wisdomphoto::create($input);
            }
            Session::flash('flash_message','อัพโหลดรูปภาพสำเร็จ');
            Session::flash('flash_type','success');

            activity()->log('UploadWisdomPhoto');
            return redirect("member/wisdomphotos/create/".$input['wisdom_id']."");
        }else{
            Session::flash('flash_message','กรุณาเพิ่มรูปภาพ');
            Session::flash('flash_type','error');
            return redirect("member/wisdomphotos/create/".$input['wisdom_id']."");
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
    public function destroy(Request $request,$wisdomphoto_id)
    {
        $input = $request->all();
        $wisdom_id = $input['wisdom_id'];
        $wisdomphoto = Wisdomphoto::find($wisdomphoto_id);
        $wisdomphoto_path = $wisdomphoto['wisdomphoto_path'];
        unlink(public_path('uploads/images/'.$wisdomphoto_path));
        $wisdomphoto->delete();
        activity()->log('DeleteWisdomPhoto');
        return redirect("member/wisdomphotos/create/".$wisdom_id."");
    }
}
