<?php

namespace App\Http\Controllers;

use App\Place;
use App\Placephoto;
use App\Setting;
use View;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\DB;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$places = Place::where('place_status',1)->get();
        $places = Place::where('place_status', 1)->where('place_switch', 1)->get();
        return view('places.index', compact('places'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($place_id)
    {
        $place = Place::find($place_id);
        $placephotos = Placephoto::where('place_id', $place_id)->get();
        $place->increment('place_reader');
        //$pagetitle = $place['place_name_th'];
        //dd($pagetitle);
        return view('places.show', compact('place', 'placephotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf($place_id)
    {
        $place = Place::find($place_id);
        return view('places.pdf', compact('place'));
    }

    public function placesjson()
    {
        $places = Place::where('place_status', 1)->where('place_switch', 1)->get();
        return response()->json($places);
    }

    public function placesearch($place_id)
    {
        $place = Place::find($place_id);
        $placephotos = Placephoto::where('place_id', $place_id)->get();
        $place->increment('place_reader');
        $place->increment('place_search');
        return view('places.show', compact('place', 'placephotos'));
    }

    public function mpdf($place_id)
    {
        $place = Place::find($place_id);
        $html = '
<html>
<head></head>
<body>
<p align="center">'.$place->place_name_th.' | '.$place->place_name_eng.'</p>
<p>'.$place->place_detail.'</p>
<img src="photos/1/1.png" alt="">
</body>
</html>';

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'Garuda'
        ]);
        $url = "/uploads/images/";
        $mpdf->setBasePath($url);
        $mpdf->SetTitle("ระบบสารสนเทศภูมิศาสตร์แสดงข้อมูลการท่องเที่ยวและข้อมูลภูมิปัญญาท้องถิ่น ในพื้นที่เทศบาลเมืองเมืองแกนพัฒนา อำเภอแม่แตง จังหวัดเชียงใหม่");
        $mpdf->SetAuthor("ระบบสารสนเทศภูมิศาสตร์แสดงข้อมูลการท่องเที่ยวและข้อมูลภูมิปัญญาท้องถิ่น ในพื้นที่เทศบาลเมืองเมืองแกนพัฒนา อำเภอแม่แตง จังหวัดเชียงใหม่");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}