@extends('layouts.guest')
@section('title','แผนที่')
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

        #floating-panel{
            position: absolute;
            top: 9.5%;
            left: 10%;
            z-index: 5;
            text-align: center;
            line-width: 30px;
        }

    </style>
    {{--<div id="floating-panel">--}}
        {{--<form class="form-inline">--}}
            {{--<div class="input-group">--}}
                {{--<input id="text_search" type="text" class="form-control">--}}

            {{--</div>--}}
            {{--<ul class="list-group" id="result">--}}

            {{--</ul>--}}
        {{--</form>--}}
    {{--</div>--}}

    <div id="map"></div>
    @push('scripts')
        <script type="text/javascript">

            // $('#text_search').on('keyup',function(){
            //     $('#result').html('');
            //     var text = $('#text_search').val();
            //
            //     $.ajax({
            //         type : 'get',
            //         url  : 'search',
            //         data : {'keyword':text},
            //         success:function(data) {
            //             $.each(data,function(key,value){
            //                 $('#result').append('<li class="list-group-item">' + value.place_name_th + '</li>')
            //             });
            //         }
            //     });
            // });

            var start_lat = {{ $setting[0]->setting_start_lat }};
            var start_lng = {{ $setting[0]->setting_start_lng }};


            function initMap(){
                var mapOptions = {
                    center: {lat: start_lat, lng: start_lng},
                    zoom: 13
                }
                var maps = new google.maps.Map(document.getElementById('map'),mapOptions);

                var marker, info;


                $.getJSON('/placesjson',function (jsonObj){
                    $.each(jsonObj,function(i,item){
                        var imageplace = '{{ asset("place.png") }}';
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(item.place_lat,item.place_lng),
                            map: maps,
                            icon: {
                                url: imageplace,
                                labelOrigin: new google.maps.Point(30, 50),
                                anchor: new google.maps.Point(16,32)

                            },
                            label: {
                                text: item.place_name_th,
                                color: "#C70E20",
                                fontWeight: "bold"
                            }
                        });

                        info = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker,'click',(function (marker,i) {
                            return function(){
                                var contentString = '<h5 align="center">'+item.place_name_th+'</h5><br>' + item.place_detail;
                                info.setContent(contentString);
                                info.open(maps,marker);
                            }
                        })(marker,i));
                    });
                });

                var marker2, info2;

                $.getJSON('/wisdomsjson',function (jsonObj){
                    $.each(jsonObj,function(i,item){
                        var imagewisdom = '{{ asset("wisdom.png") }}';
                        marker2 = new google.maps.Marker({
                            position: new google.maps.LatLng(item.wisdom_lat,item.wisdom_lng),
                            map: maps,
                            icon: {
                                url: imagewisdom,
                                labelOrigin: new google.maps.Point(30, 50),
                                anchor: new google.maps.Point(16,32)

                            },
                            label: {
                                text: item.wisdom_name_th,
                                color: "#6600FF",
                                fontWeight: "bold"
                            }
                        });

                        info2 = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker2,'click',(function (marker2,i) {
                            return function(){
                                var contentString = '<h5 align="center">'+item.wisdom_name_th+'</h5><br>' + item.wisdom_detail;
                                info.setContent(contentString);
                                info.open(maps,marker2);
                            }
                        })(marker2,i));
                    });
                });

                // infoWindow = new google.maps.InfoWindow;
                //
                // navigator.geolocation.getCurrentPosition(function(position) {
                //     current_lat = position.coords.latitude;
                //     current_lng = position.coords.longitude;
                //     var latlng = new google.maps.LatLng(current_lat,current_lng);
                //     infoWindow.setPosition(latlng);
                //     infoWindow.setContent('คุณอยู่ที่นี่');
                //     infoWindow.open(maps);
                //     maps.setCenter(latlng);
                // }, function() {
                //     //
                // });
            }

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZumAHjvBa3X7-ykCtR7-nQjj56thStc&callback=initMap"
                async defer></script>
    @endpush

@endsection