<?php

namespace App\Http\Controllers;

use App\Place;
use App\Wisdom;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->term;
        $places = Place::where('place_name_th','LIKE','%' .$search. '%')->get();
        $data = [];

        foreach ($places as $key => $value){
            $data[] = [
                'id' => $value->place_id,
                'value' => $value->place_name_th,
                'place_name_th' => $value->place_name_th,
            ];
        }
        return response($data);
    }

    public function showVueSearch()
    {
        return view('demos.vuesearch');
    }

    public function getPlaceSearch(Request $request)
    {
        $search =  $request->search;
        $posts = '';
        if (trim($request->search)) {
            $posts = Place::where([
                ['place_name_th','LIKE',"%{$search}%"],
                ['place_status','=',"1"],
            ])
                ->orderBy('created_at','DESC')->limit(5)->get();

            $posts = $posts->map(function ($post, $key) {
                return [
                    'title' => $post['place_name_th'],
                    'titleeng' => $post['place_name_eng'],
                    'url'  => url('places/'.$post['place_id'].'/search'),
                    'image' => 'uploads/covers/'.$post['place_cover'],
                ];
            });
        }

        return $posts;
    }

    public function getWisdomSearch(Request $request)
    {
        $search =  $request->search;
        $posts = '';
        if (trim($request->search)) {
            $posts = Wisdom::where([
                ['wisdom_name_th','LIKE',"%{$search}%"],
                ['wisdom_status','=',"1"],
            ])
                ->orderBy('created_at','DESC')->limit(5)->get();

            $posts = $posts->map(function ($post, $key) {
                return [
                    'title' => $post['wisdom_name_th'],
                    'titleeng' => $post['wisdom_name_eng'],
                    'url'  => url('wisdoms/'.$post['wisdom_id'].'/search'),
                    'image' => 'uploads/covers/'.$post['wisdom_cover'],
                ];
            });
        }

        return $posts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
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
