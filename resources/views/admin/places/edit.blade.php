@extends('layouts.main')
@section('title')
    แก้ไขข้อมูล : {{ $place->place_name_th }} | {{ $place->place_name_eng }}
@endsection
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            <strong>แก้ไขข้อมูลสถานที่ท่องเที่ยว : {{ $place->place_name_th }} | {{ $place->place_name_eng }} </strong>
        </div>
        <div class="card-body">
            {!! Form::model($place,['id' => 'placeEdit','method' => 'PATCH','files' => true,'action' => ['Admin\PlaceController@update',$place->place_id]]) !!}
            <div class="form-group">
                {!! Form::label('place_name_th','ชื่อสถานที่ท่องเที่ยวภาษาไทย') !!}
                {!! Form::text('place_name_th',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('place_name_eng','ชื่อสถานที่ท่องเที่ยวภาษาอังกฤษ') !!}
                {!! Form::text('place_name_eng',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('place_address','ที่อยู่สถานที่ท่องเที่ยว') !!}
                {!! Form::text('place_address',null,['class' => 'form-control']) !!}
            </div>

            <div id="staticParent">

            <div class="form-group">
                {!! Form::label('place_lat','พิกัด Latitude') !!}
                {!! Form::text('place_lat',null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('place_lng','พิกัด Longitude') !!}
                {!! Form::text('place_lng',null,['class' => 'form-control']) !!}
            </div>

            </div>

            <div class="form-group">
                {!! Form::label('map','แผนที่') !!}
                <div id="map" style="width: 100%; height: 350px"></div>
            </div>

            <div class="form-group">
                {!! Form::label('place_detail','รายละเอียดสถานที่ท่องเที่ยว') !!}
                {!! Form::textarea('place_detail',null,['class' => 'form-control place_detail']) !!}
            </div>
            <hr>
            <div class="form-group">
                <img src="/uploads/covers/{{ $place->place_cover }}" alt="..." class="img-thumbnail" style="height: 200px;width: 200px">
            </div>

            <div class="form-group">
                {!! Form::label('place_cover','รูปภาพปก') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างรูปภาพปก" data-content="<img src='/img/Cover.png' alt='' class='img-fluid'>"></i>

                {!! Form::file('place_cover',['class' => 'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('place_tagline','คำโปรย') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างคำโปรย" data-content="<img src='/img/Tagline.png' alt='' class='img-fluid'>"></i>
                {!! Form::text('place_tagline',null,['class' => 'form-control']) !!}
            </div>

            {{--<div class="form-group">--}}
                {{--{!! Form::label('place_tag','Instagram Tag') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างคำโปรย" data-content="<img src='/img/Tagline.png' alt='' class='img-fluid'>"></i>--}}
                {{--{!! Form::text('place_tag',null,['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            <div class="form-group">
                {!! Form::submit('แก้ไขข้อมูลสถานที่ท่องเที่ยว',['class'=>'btn btn-primary']) !!}
            </div>

            @push('scripts')
                <script type="text/javascript">

                    $(function () {
                        $('[data-toggle="popover"]').popover({
                            trigger: 'focus'
                        });
                        $('#staticParent').on('keydown', '#place_lat,#place_lng', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
                    });

                    var place_lat = {{ $place->place_lat }};
                    var place_lng = {{ $place->place_lng }};

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: place_lat, lng: place_lng},
                            zoom: 13
                        });

                        var marker = new google.maps.Marker({
                            position: {lat: place_lat, lng: place_lng},
                            draggable: true,
                            map: map
                        });

                        $("#place_lat,#place_lng").keyup(function(){

                            var input_lat = $('#place_lat').val();
                            var input_lng = $('#place_lng').val();

                            var latlng = new google.maps.LatLng(input_lat,input_lng);

                            marker.setPosition(latlng);
                            map.panTo(latlng);
                        });

                        google.maps.event.addListener(marker, 'dragend', function (event) {
                            document.getElementById("place_lat").value = event.latLng.lat();
                            document.getElementById("place_lng").value = event.latLng.lng();
                        });
                    }

                    var editor_config = {
                        path_absolute : "/",
                        selector: "textarea.place_detail",
                        language: 'th_TH',
                        image_dimensions: false,
                        image_class_list: [
                            {title: 'Responsive', value: 'img-fluid'}
                        ],
                        plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table contextmenu directionality",
                            "emoticons template paste textcolor colorpicker textpattern"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                        relative_urls: false,
                        file_browser_callback : function(field_name, url, type, win) {
                            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                            if (type == 'image') {
                                cmsURL = cmsURL + "&type=Images";
                            } else {
                                cmsURL = cmsURL + "&type=Files";
                            }

                            tinyMCE.activeEditor.windowManager.open({
                                file : cmsURL,
                                title : 'Filemanager',
                                width : x * 0.8,
                                height : y * 0.8,
                                resizable : "yes",
                                close_previous : "no"
                            });
                        }
                    };
                    tinymce.init(editor_config);
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZumAHjvBa3X7-ykCtR7-nQjj56thStc&callback=initMap"
                        async defer></script>

                <script type="text/javascript">
                    $(function (){
                        $( '#placeEdit' ).validate( {
                            lang: 'th',
                            rules: {
                                place_name_th: 'required',
                                place_name_eng: 'required',
                                place_address: 'required',
                                place_lat: {
                                    required: true,
                                    number: true,
                                },

                                place_lng: {
                                    required: true,
                                    number: true,
                                },
                                place_detail: 'required',
                                place_tagline: 'required',
                                // place_tag: 'required',
                            },
                            errorElement: 'em',
                            errorPlacement: function ( error, element ) {
                                // Add the `invalid-feedback` class to the error element
                                error.addClass( 'invalid-feedback' );
                                if ( element.prop( 'type' ) === 'checkbox' ) {
                                    error.insertAfter( element.parent( 'label' ) );
                                } else {
                                    error.insertAfter( element );
                                }
                            },
                            highlight: function ( element, errorClass, validClass ) {
                                $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' );
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' );
                            }
                        });
                    });
                </script>
            @endpush

            {!! Form::close() !!}
        </div>
    </div>
@endsection