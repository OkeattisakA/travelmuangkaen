@extends('layouts.guest')
@section('title',''. $wisdom->wisdom_name_th .' | ' . $wisdom->wisdom_name_eng . '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>

            </p>
            <div class="card" >
                <div class="card-header">
                    {{ $wisdom->wisdom_name_th }} | {{ $wisdom->wisdom_name_eng }}
                    <div class="pull-right"><a href="{{ url("places/{$wisdom->wisdom_id}/pdf") }}" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i></a></div>

                </div>

                <div class="card-body">
                    {!! $wisdom->wisdom_detail !!}
                </div>
            </div>

            <div class="card" >
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
                                <option>{{ $wisdom->wisdom_name_th }}</option>
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
                    รูปภาพ : {{ $wisdom->wisdom_name_th }}
                </div>
                <div class="card-body">
                    @if (count($wisdomphotos) > 0)
                        @foreach ($wisdomphotos as $wisdomphoto)
                            <a href="{{ asset("uploads/images/$wisdomphoto->wisdomphoto_path") }}" data-lightbox="roadtrip">
                                <img src="{{ asset("uploads/images/$wisdomphoto->wisdomphoto_path") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">
                            </a>
                        @endforeach
                    @else

                    @endif

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    รีวิว : {{ $wisdom->wisdom_name_th }}
                </div>
                <div class="card-body">
                    @foreach($wisdom->wisdomreviews as $wisdomreview)
                        @if($wisdomreview->wisdomreview_status == 1)
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="https://www.facebook.com/{{ $wisdomreview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $wisdomreview->user->provider_id }}/picture" class="img-avatar" align="right"></a>
                                </div>
                                <div class="col-md-11">
                                    <a href="https://www.facebook.com/{{ $wisdomreview->user->provider_id }}">{{ $wisdomreview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $wisdomreview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">
                                    <br>
                                    <b>{{ $wisdomreview->wisdomreview_detail }}</b>
                                    <hr>
                                    <a href="{{ asset("uploads/reviews/$wisdomreview->wisdomreview_photo") }}" data-lightbox="{{ $wisdomreview->wisdomreview_id }}">
                                        <img src="{{ asset("uploads/reviews/$wisdomreview->wisdomreview_photo") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">
                                    </a>
                                    <br>
                                    รีวิวเมื่อ {{ $wisdomreview->created_at }}
                                </div>
                            </div>
                            <hr>
                        @elseif($wisdomreview->wisdomreview_status ==0)

                            @if (Auth::guest())

                            @elseif(Auth::user()->isAn('facebook'))
                                @if($wisdomreview->wisdomreview_by == Auth::user()->id)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="https://www.facebook.com/{{ $wisdomreview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $wisdomreview->user->provider_id }}/picture" class="img-avatar" align="right"></a>
                                        </div>
                                        <div class="col-md-11">
                                            <a href="https://www.facebook.com/{{ $wisdomreview->user->provider_id }}">{{ $wisdomreview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $wisdomreview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">
                                            <br>
                                            <b>{{ $wisdomreview->wisdomreview_detail }}</b>
                                            <br>
                                            <button type="button" class="btn btn-outline-danger btn-sm">รอการตรวจสอบ</button>
                                            <hr>
                                            <a href="{{ asset("uploads/reviews/$wisdomreview->wisdomreview_photo") }}" data-lightbox="{{ $wisdomreview->wisdomreview_id }}">
                                                <img src="{{ asset("uploads/reviews/$wisdomreview->wisdomreview_photo") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">
                                            </a>
                                            <br>
                                            รีวิวเมื่อ {{ $wisdomreview->created_at }}
                                        </div>
                                    </div>
                                    <hr>
                                @else

                                @endif
                            @else

                            @endif

                        @endif
                    @endforeach


                    @if (Auth::guest())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert" align="center">
                                    เข้าสู่ระบบด้วย Facebook เพื่อเขียนรีวิว
                                    <br>
                                    <a href="{{ url('/redirect') }}" class="btn btn-facebook" type="button">
                                        <span>Facebook</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @else
                        @if(Auth::user()->isAn('facebook'))
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['url' => 'wisdomreviews','files' => true]) !!}

                                    <div class="form-group">
                                        {!! Form::label('wisdomreview_detail','ข้อความรีวิว') !!}
                                        {!! Form::textarea('wisdomreview_detail',null,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('wisdomreview_photo','รูปภาพ') !!}
                                        {!! Form::file('wisdomreview_photo',['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group pull-right">
                                        <img src="http://graph.facebook.com/{{ Auth::user()->provider_id }}/picture" class="img-avatar">
                                        <b>{{ Auth::user()->name }}</b>
                                        <img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ Auth::user()->provider_id }}" alt="" style="width: 20px; height: 20px;">
                                        {!! Form::submit('เขียนรีวิว',['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {{ Form::hidden('wisdomreview_star',5) }}
                                    {{ Form::hidden('wisdomreview_status',0) }}
                                    {{ Form::hidden('wisdom_id',$wisdom->wisdom_id) }}
                                    {{ Form::hidden('wisdomreview_by',Auth::id()) }}

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @else

                        @endif
                    @endif

                </div>
            </div>

            {{--<div class="card">--}}
            {{--<div class="card-header">--}}
            {{--รีวิว--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}

            {{--@foreach ($place->placereviews as $placereview)--}}
            {{--@if($placereview->placereview_status == 1)--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-1">--}}
            {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $placereview->user->provider_id }}/picture" class="img-avatar" align="right"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-11">--}}
            {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}">{{ $placereview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $placereview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">--}}
            {{--<div class="small text-muted">--}}
            {{--Registered: {{ $placereview->created_at }}--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<b>{{ $placereview->placereview_detail }}</b>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<hr>--}}
            {{--@else--}}
            {{--@if (Auth::guest())--}}
            {{----}}
            {{--@else--}}
            {{--@if(Auth::user()->isAn('facebook'))--}}
            {{--@if($placereview->placereview_by == Auth::user()->id)--}}

            {{--<div class="row">--}}
            {{--<div class="col-md-1">--}}
            {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}"><img src="http://graph.facebook.com/{{ $placereview->user->provider_id }}/picture" class="img-avatar" align="right"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-11">--}}
            {{--<a href="https://www.facebook.com/{{ $placereview->user->provider_id }}">{{ $placereview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $placereview->user->provider_id }}" alt="" style="width: 20px; height: 20px;">--}}
            {{--<div class="small text-muted">--}}
            {{--Registered: {{ $placereview->created_at }}--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<b>{{ $placereview->placereview_detail }}</b>--}}
            {{--<br>--}}
            {{--<button type="button" class="btn btn-outline-danger btn-sm">รอการตรวจสอบ</button>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<hr>--}}
            {{--@else--}}

            {{--@endif--}}
            {{--@else--}}

            {{--@endif--}}
            {{--@endif--}}
            {{--@endif--}}

            {{--@endforeach--}}


            {{--@if (Auth::guest())--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
            {{--<div class="alert alert-primary" role="alert" align="center">--}}
            {{--เข้าสู่ระบบด้วย Facebook เพื่อเขียนรีวิว--}}
            {{--<br>--}}
            {{--<a href="{{ url('/redirect') }}" class="btn btn-facebook" type="button">--}}
            {{--<span>Facebook</span>--}}
            {{--</a>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--@else--}}
            {{--@if(Auth::user()->isAn('facebook'))--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
            {{--{!! Form::open(['url' => 'placereviews']) !!}--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::textarea('placereview_detail',null,['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group pull-right">--}}
            {{--<img src="http://graph.facebook.com/{{ Auth::user()->provider_id }}/picture" class="img-avatar">--}}
            {{--<b>{{ Auth::user()->name }}</b>--}}
            {{--<img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ Auth::user()->provider_id }}" alt="" style="width: 20px; height: 20px;">--}}
            {{--{!! Form::submit('เขียนรีวิว',['class'=>'btn btn-primary']) !!}--}}
            {{--</div>--}}
            {{--{{ Form::hidden('placereview_star',5) }}--}}
            {{--{{ Form::hidden('placereview_status',0) }}--}}
            {{--{{ Form::hidden('place_id',$place->place_id) }}--}}
            {{--{{ Form::hidden('placereview_by',Auth::id()) }}--}}
            {{--{!! Form::close() !!}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@else--}}

            {{--@endif--}}
            {{--@endif--}}

            {{--</div>--}}
            {{--</div>--}}

        </div>
    </div>

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

        <script type="text/javascript">

            lightbox.option({
                'resizeDuration': 700,
                'wrapAround': true,
                'alwaysShowNavOnTouchDevices' : true
            });

            $( document ).ready(function() {
                $("#response").hide();
                $('[data-toggle="tooltip"]').tooltip();
            });



            var wisdom_lat = {{ $wisdom->wisdom_lat }};
            var wisdom_lng = {{ $wisdom->wisdom_lng }};

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
                    center: {lat: wisdom_lat, lng: wisdom_lng},
                    zoom: 13
                });
                directionsDisplay.setMap(map);


                var marker = new google.maps.Marker({
                    position: {lat: wisdom_lat, lng: wisdom_lng},
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
                var end = new google.maps.LatLng(wisdom_lat, wisdom_lng);

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

                    var namedestinations = "{{ $wisdom->wisdom_name_th }}";
                    var wisdom_id = "{!! $wisdom->wisdom_id !!}";

                    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    axios.post('/wisdomroutelogs',{
                        wisdom_origin: origins[0],
                        wisdom_destination: namedestinations,
                        wisdom_distance: distance,
                        wisdom_duration: duration,
                        wisdom_id: wisdom_id,
                    }).then(response => {
                        console.log(response)
                    }).catch(error => {
                        console.log(error.response)
                    });
                }
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZumAHjvBa3X7-ykCtR7-nQjj56thStc&callback=initMap"
                async defer></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125267750-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-125267750-1');
        </script>

    @endpush

@endsection


