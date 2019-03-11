@extends('layouts.main')
@section('title','Dashboards')
@section('content')

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow:hidden;
        }

        .app-body,.main,.container-fluid{
            height:100%;
        }
        .main .container-fluid {
            padding: 0px 0px;
        }

        #map {
            height: calc(100% - 0%);
            height: -moz-calc(100% - 0%);
            height: -webkit-calc(100% - 0%);
        }
    </style>

    <div id="map"></div>

    <script>
        var map;
        var start_lat = {{ $setting[0]->setting_start_lat }}
        var start_lng = {{ $setting[0]->setting_start_lng }}
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: start_lat, lng: start_lng},
                    zoom: 13
                });
            }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIssfHcNVmq8zjW0KjH2igNomJr2qHczg&callback=initMap"
            async defer></script>

@endsection