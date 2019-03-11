<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\Placereview;
use App\Placeroutelog;
use App\Wisdom;
use App\Wisdomreview;
use App\Wisdomroutelog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index');
    }

    public function places()
    {
        //Top Read
        $data_topread = DB::table('places')->orderBy('place_reader', 'desc')->limit(5)->get();

        foreach ($data_topread as $label)
        {
            $labels[] = $label->place_name_th;
        }

        foreach ($data_topread as $value)
        {
            $values[] = $value->place_reader;
        }

        $chart_topread = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนคนเปิดอ่าน")
            ->title('รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้เปิดอ่านมากสุด 5 อันดับ')
            ->labels($labels)
            ->values($values)
            ->dimensions(0,300);
        //Top Review
        $data_topreview = DB::table('placereviews')->select(DB::raw('place_id,COUNT(*) as reviewcount'))->groupBy('place_id')->orderBy('reviewcount', 'desc')->get();

        foreach ($data_topreview as $place)
        {
            $places = Place::where('place_id','=',$place->place_id)->get();

            foreach ($places as $placenameth)
            {
                $placelabel[] = $placenameth->place_name_th;
            }
        }

        foreach ($data_topreview as $reviewcount)
        {
            $reviewcounts[] = $reviewcount->reviewcount;
        }

        $chart_topreview = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนรีวิว")
            ->title('รายงานข้อมูลสถานที่ท่องเที่ยวที่มีการรีวิวมากสุด 5 อันดับ')
            ->labels($placelabel)
            ->values($reviewcounts)
            ->dimensions(0,300);

        //Top Search
        $data_topsearch = DB::table('places')->orderBy('place_search', 'desc')->limit(5)->get();
        foreach ($data_topsearch as $topsearchlabel)
        {
            $topsearchlabels[] = $topsearchlabel->place_name_th;
        }

        foreach ($data_topsearch as $topsearchvalue)
        {
            $topsearchvalues[] = $topsearchvalue->place_search;
        }

        $chart_topsearch = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนที่ค้นหา")
            ->title('รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้ค้นหามากสุด')
            ->labels($topsearchlabels)
            ->values($topsearchvalues)
            ->dimensions(0,300);

        return view('admin.reports.places.index',compact('chart_topread','chart_topreview','chart_topsearch','chart_place_toproute'));
    }


    public function wisdoms()
    {
        $data_topread = DB::table('wisdoms')->orderBy('wisdom_reader', 'desc')->limit(5)->get();

        foreach ($data_topread as $label)
        {
            $labels[] = $label->wisdom_name_th;
        }

        foreach ($data_topread as $value)
        {
            $values[] = $value->wisdom_reader;
        }

        $chart_topread = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนคนเปิดอ่าน")
            ->title('รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้เปิดอ่านมากสุด 5 อันดับ')
            ->labels($labels)
            ->values($values)
            ->dimensions(0,300);


        $data_topreview = DB::table('wisdomreviews')->select(DB::raw('wisdom_id,COUNT(*) as reviewcount'))->groupBy('wisdom_id')->orderBy('reviewcount', 'desc')->get();

        foreach ($data_topreview as $wisdom)
        {
            $wisdoms = Wisdom::where('wisdom_id','=',$wisdom->wisdom_id)->get();

            foreach ($wisdoms as $wisdomnameth)
            {
                $wisdomlabel[] = $wisdomnameth->wisdom_name_th;
            }
        }

        foreach ($data_topreview as $reviewcount)
        {
            $reviewcounts[] = $reviewcount->reviewcount;
        }

        $chart_topreview = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนรีวิว")
            ->title('รายงานข้อมูลสถานที่ท่องเที่ยวที่มีการรีวิวมากสุด 5 อันดับ')
            ->labels($wisdomlabel)
            ->values($reviewcounts)
            ->dimensions(0,300);

        //Top Search
        $data_topsearch = DB::table('wisdoms')->orderBy('wisdom_search', 'desc')->limit(5)->get();
        foreach ($data_topsearch as $topsearchlabel)
        {
            $topsearchlabels[] = $topsearchlabel->wisdom_name_th;
        }

        foreach ($data_topsearch as $topsearchvalue)
        {
            $topsearchvalues[] = $topsearchvalue->wisdom_search;
        }

        $chart_topsearch = Charts::create('bar', 'fusioncharts')
            ->elementLabel("จำนวนที่ค้นหา")
            ->title('รายงานข้อมูลภูมิปัญญาท้องถิ่นที่ผู้ใช้ค้นหามากสุด')
            ->labels($topsearchlabels)
            ->values($topsearchvalues)
            ->dimensions(0,300);

        return view('admin.reports.wisdoms.index',compact('chart_topread','chart_topreview','chart_topsearch'));
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

    public function placeroutelogs()
    {
        $placeroutelogs = Placeroutelog::all();
        return view('admin.reports.placeroutelogs.index',compact('placeroutelogs'));
    }

    public function wisdomroutelogs()
    {
        $wisdomroutelogs = Wisdomroutelog::all();
        return view('admin.reports.wisdomroutelogs.index',compact('wisdomroutelogs'));
    }

    public function place_pdf()
    {
        $Places = Place::all();
        $pdf = PDF::loadView('admin.reports.places.pdf',['Places' => $Places]);
        return @$pdf->stream();
    }

    public function place_top_read()
    {
        $places = DB::table('places')->orderBy('place_reader', 'desc')->get();
        $pdf = PDF::loadView('admin.reports.places.topread',['places' => $places]);
        return @$pdf->stream();
    }

    public function place_top_review()
    {
        //$placereviews = DB::table('placereviews')->select(DB::raw('place_id,COUNT(place_id) as reviewcount'))->groupBy('place_id')->orderBy('reviewcount', 'desc')->get();
        $placereviews = Placereview::groupBy('place_id')->select('place_id', DB::raw('count(place_id) as reviewcount'))->get();
        $pdf = PDF::loadView('admin.reports.places.topreview',['placereviews' => $placereviews]);
        return @$pdf->stream();
    }

    public function place_top_search()
    {
        $placetopsearchs = DB::table('places')->orderBy('place_search', 'desc')->get();
        //$placereviews = DB::table('placereviews')->select(DB::raw('place_id,COUNT(place_id) as reviewcount'))->groupBy('place_id')->orderBy('reviewcount', 'desc')->get();
        //$placereviews = Placereview::groupBy('place_id')->select('place_id', DB::raw('count(place_id) as reviewcount'))->get();
        $pdf = PDF::loadView('admin.reports.places.topsearch',['placetopsearchs' => $placetopsearchs]);
        return @$pdf->stream();
    }

    public function wisdom_top_read()
    {
        $wisdoms = DB::table('wisdoms')->orderBy('wisdom_reader', 'desc')->get();
        $pdf = PDF::loadView('admin.reports.wisdoms.topread',['wisdoms' => $wisdoms]);
        return @$pdf->stream();
    }

    public function wisdom_top_review()
    {
        //$placereviews = DB::table('placereviews')->select(DB::raw('place_id,COUNT(place_id) as reviewcount'))->groupBy('place_id')->orderBy('reviewcount', 'desc')->get();
        $wisdomreviews = Wisdomreview::groupBy('wisdom_id')->select('wisdom_id', DB::raw('count(wisdom_id) as reviewcount'))->get();
        $pdf = PDF::loadView('admin.reports.wisdoms.topreview',['wisdomreviews' => $wisdomreviews]);
        return @$pdf->stream();
    }

    public function wisdom_top_search()
    {
        $wisdomtopsearchs = DB::table('wisdoms')->orderBy('wisdom_search', 'desc')->get();
        //$placereviews = DB::table('placereviews')->select(DB::raw('place_id,COUNT(place_id) as reviewcount'))->groupBy('place_id')->orderBy('reviewcount', 'desc')->get();
        //$placereviews = Placereview::groupBy('place_id')->select('place_id', DB::raw('count(place_id) as reviewcount'))->get();
        $pdf = PDF::loadView('admin.reports.wisdoms.topsearch',['wisdomtopsearchs' => $wisdomtopsearchs]);
        return @$pdf->stream();
    }

}
