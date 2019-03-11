@extends('layouts.main')

@section('title')
    {{ $place->place_name_th }} | {{ $place->place_name_eng }}
@endsection

@section('content')

    <style type="text/css">

        #share-buttons img {
            width: 35px;
            padding: 5px;
            border: 0;
            box-shadow: 0;
            display: inline;
        }

    </style>

    <br>
    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header">
                    <strong>{{ $place->place_name_th }} | {{ $place->place_name_eng }}

                        @if($place->place_status === 1)
                            <span class="badge badge-success">ตรวจสอบแล้ว</span>
                        @else
                            <span class="badge badge-warning">รอการตรวจสอบ</span>
                        @endif

                    </strong>
                    <div class="pull-right"><a href="{{ url("member/places/{$place->place_id}/edit") }}" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="แก้ไข"></i></a></div>

                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">เพิ่มโดย : {{ $place->user->name }} | เมื่อวันที่ {{ $place->created_at }}</li>
                </ol>


                <div class="card-block">
                    {!! $place->place_detail !!}
                </div>

                <div class="card">
                    <div class="card-header">
                        แผนที่
                    </div>
                    <div class="card-body">
                        <div id="map" style="width: 100%; height: 350px"></div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        หาระยะทาง
                    </div>
                    <div class="card-body">

                        {!! Form::hidden('current_lat',null,['class' => 'form-control']) !!}
                        {!! Form::hidden('current_lng',null,['class' => 'form-control']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <label for="origin">จุดเริ่มต้น</label>
                                <select class="form-control" id="origin">
                                    <option disabled selected hidden>เลือกจุดเริ่มต้น</option>
                                    <option value="CurrentPosition">ที่อยู่ปัจจุบัน</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="destination">ปลายทาง</label>
                                <select class="form-control" id="destination">
                                    <option>{{ $place->place_name_th }}</option>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="response" id="response">
                            <i class="fa fa-road" aria-hidden="true"></i> ระยะทางทั้งหมด : <span id="distance"></span>
                            <br>
                            <i class="fa fa-clock-o" aria-hidden="true"></i> เวลาในการเดินทาง : <span id="duration"></span>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        รูปภาพ
                    </div>
                    <div class="card-body">
                        @if (count($placephotos) > 0)
                            @foreach ($placephotos as $placephoto)
                                <img src="{{ asset("uploads/images/$placephoto->placephoto_path") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">
                            @endforeach
                        @else
                            ไม่มีรูปภาพ
                        @endif

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        รีวิว
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ผู้ใช้</th>
                                <th>ข้อความรีวิว</th>
                                <th>รูปภาพ</th>
                                <th>วันที่รีวิว</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($place->placereviews as $placereview)
                                @if($placereview->placereview_status ==1)
                                    <tr>
                                        <td>
                                            <a href="https://www.facebook.com/{{ $placereview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $placereview->user->provider_id }}/picture" class="img-avatar"></a>
                                            <a href="https://www.facebook.com/{{ $placereview->user->provider_id }}">{{ $placereview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $placereview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">
                                        </td>
                                        <td>{{ $placereview->placereview_detail }}</td>
                                        <td align="center">
                                            <a href="{{ asset("uploads/reviews/$placereview->placereview_photo") }}" data-lightbox="{{ $placereview->placereview_id }}">
                                                <img src="{{ asset("uploads/reviews/$placereview->placereview_photo") }}" alt="" style="width: 50px; height: 50px;" class="img-fluid img-thumbnail">
                                            </a>
                                        </td>
                                        <td>{{ $placereview->created_at }}</td>
                                    </tr>
                                @else

                                @endif

                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $placereview->user->provider_id }}/picture" class="img-avatar"></a>--}}
                                        {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}">{{ $placereview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $placereview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">--}}
                                    {{--</td>--}}
                                    {{--<td>{{ $placereview->placereview_detail }}</td>--}}
                                    {{--<td>{{ $placereview->created_at }}</td>--}}
                                    {{--@if($placereview->placereview_status ==1)--}}
                                        {{--<td>--}}
                                            {{--<span class="badge badge-success">ตรวจสอบแล้ว</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a class="btn btn-danger" href="" role="button" data-toggle="tooltip" data-placement="bottom" title="ลบรีวิว"><i class="fa fa-trash-o"></i></a>--}}
                                        {{--</td>--}}
                                    {{--@else--}}
                                        {{--<td>--}}
                                            {{--<span class="badge badge-danger">รอการตรวจสอบ</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a class="btn btn-success" href="{{ url("admin/placereviews/approve/{$place->place_id}/{$placereview->placereview_id}") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="อนุมัติ"><i class="fa fa-check"></i></a>--}}
                                        {{--</td>--}}
                                    {{--@endif--}}
                                {{--</tr>--}}
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>


        <!--/.col-->
    </div>
    <!--/.row-->

    @push('scripts')
        <script type="text/javascript">

            $( document ).ready(function() {
                $("#response").hide();
                $('[data-toggle="tooltip"]').tooltip();
            });



            var place_lat = {{ $place->place_lat }};
            var place_lng = {{ $place->place_lng }};

            navigator.geolocation.getCurrentPosition(function(position) {
                current_lat = position.coords.latitude;
                current_lng = position.coords.longitude;
                $('[name="current_lat"]').val(current_lat);
                $('[name="current_lng"]').val(current_lng);
            }, function() {
                //
            });

            function initMap() {

                var directionsService = new google.maps.DirectionsService();
                var directionsDisplay = new google.maps.DirectionsRenderer();
                var DistanceMatrixService = new google.maps.DistanceMatrixService();

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: place_lat, lng: place_lng},
                    zoom: 13
                });
                directionsDisplay.setMap(map);


                var marker = new google.maps.Marker({
                    position: {lat: place_lat, lng: place_lng},
                    draggable: true,
                    map: map
                });

                var onChangeHandler = function () {
                    calculateAndDisplayRoute(directionsService,directionsDisplay,DistanceMatrixService);
                };

                document.getElementById('origin').addEventListener('change',onChangeHandler);
                document.getElementById('destination').addEventListener('change',onChangeHandler);
            }

            function calculateAndDisplayRoute(directionsService,directionsDisplay,DistanceMatrixService){

                current_lat = $('[name="current_lat"]').val();
                current_lng = $('[name="current_lng"]').val();

                var start = new google.maps.LatLng(current_lat,current_lng);
                var end = new google.maps.LatLng(place_lat, place_lng);

                //https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=18.7961807,98.981193&destinations=19.226025060241177,98.83459420629879&key=AIzaSyDIssfHcNVmq8zjW0KjH2igNomJr2qHczg
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: 'DRIVING',
                    drivingOptions: {
                        departureTime: new Date(Date.now()),  // for the time N milliseconds from now.
                    }
                };
                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsDisplay.setDirections(result);
                    }
                });

                DistanceMatrixService.getDistanceMatrix(
                    {
                        origins: [start],
                        destinations: [end],
                        travelMode: 'DRIVING'
                    },callback);
            }

            function callback(response, status) {
                if (status == 'OK') {
                    var origins = response.originAddresses;
                    var destinations = response.destinationAddresses;


                    for (var i = 0; i < origins.length; i++) {
                        var results = response.rows[i].elements;
                        for (var j = 0; j < results.length; j++) {
                            var element = results[j];
                            var distance = element.distance.text;
                            $('#distance').text(distance);
                            var duration = element.duration.text;
                            $('#duration').text(duration);
                            var from = origins[i];
                            var to = destinations[j];
                        }
                    }
                    $("#response").show();
                }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZumAHjvBa3X7-ykCtR7-nQjj56thStc&callback=initMap"
                async defer></script>
    @endpush
@endsection

