@extends('layouts.main')
@section('title')
    แก้ไขข้อมูล : {{ $wisdom->wisdom_name_th }} | {{ $wisdom->wisdom_name_eng }}
@endsection
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            <strong>แก้ไขข้อมูลภูมิปัญญาท้องถิ่น : {{ $wisdom->wisdom_name_th }} | {{ $wisdom->wisdom_name_eng }}</strong>
        </div>
        <div class="card-body">
            {!! Form::model($wisdom,['id' => 'wisdomEdit','method' => 'PATCH','files' => true,'action' => ['Admin\WisdomController@update',$wisdom->wisdom_id]]) !!}
            <div class="form-group">
                {!! Form::label('wisdom_name_th','ชื่อภูมิปัญญาท้องถิ่นภาษาไทย') !!}
                {!! Form::text('wisdom_name_th',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('wisdom_name_eng','ชื่อภูมิปัญญาท้องถิ่นภาษาอังกฤษ') !!}
                {!! Form::text('wisdom_name_eng',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('wisdom_address','แหล่งที่อยู่ของภูมิปัญญาท้องถิ่น') !!}
                {!! Form::text('wisdom_address',null,['class' => 'form-control']) !!}
            </div>

            <div id="staticParent">

                <div class="form-group">
                    {!! Form::label('wisdom_lat','พิกัด Latitude') !!}
                    {!! Form::text('wisdom_lat',null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('wisdom_lng','พิกัด Longitude') !!}
                    {!! Form::text('wisdom_lng',null,['class' => 'form-control']) !!}
                </div>

            </div>

            <div class="form-group">
                {!! Form::label('map','แผนที่') !!}
                <div id="map" style="width: 100%; height: 350px"></div>
            </div>

            <div class="form-group">
                {!! Form::label('wisdom_detail','รายละเอียดข้อมูลภูมิปัญญาท้องถิ่น') !!}
                {!! Form::textarea('wisdom_detail',null,['class' => 'form-control wisdom_detail']) !!}
            </div>

            <hr>

            <div class="form-group">
                <img src="/uploads/covers/{{ $wisdom->wisdom_cover }}" alt="..." class="img-thumbnail" style="height: 200px;width: 200px">
            </div>

            <div class="form-group">
                {!! Form::label('wisdom_cover','รูปภาพปก') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างรูปภาพปก" data-content="<img src='/img/Cover.png' alt='' class='img-fluid'>"></i>

                {!! Form::file('wisdom_cover',['class' => 'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('wisdom_tagline','คำโปรย') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างคำโปรย" data-content="<img src='/img/Tagline.png' alt='' class='img-fluid'>"></i>
                {!! Form::text('wisdom_tagline',null,['class' => 'form-control']) !!}
            </div>

            {{--<div class="form-group">--}}
                {{--{!! Form::label('wisdom_tag','Instagram Tag') !!} <i tabindex="0" class="fa fa-commenting" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-html="true" title="ตัวอย่างคำโปรย" data-content="<img src='/img/Tagline.png' alt='' class='img-fluid'>"></i>--}}
                {{--{!! Form::text('wisdom_tag',null,['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            <div class="form-group">
                {!! Form::submit('แก้ไขข้อมูลภูมิปัญญาท้องถิ่น',['class'=>'btn btn-primary']) !!}
            </div>

            @push('scripts')
                <script type="text/javascript">

                    $(function () {
                        $('[data-toggle="popover"]').popover({
                            trigger: 'focus'
                        });
                        $('#staticParent').on('keydown', '#wisdom_lat,#wisdom_lng', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
                    });

                    var wisdom_lat = {{ $wisdom->wisdom_lat }};
                    var wisdom_lng = {{ $wisdom->wisdom_lng }};

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: wisdom_lat, lng: wisdom_lng},
                            zoom: 13
                        });

                        var marker = new google.maps.Marker({
                            position: {lat: wisdom_lat, lng: wisdom_lng},
                            draggable: true,
                            map: map
                        });

                        $("#wisdom_lat,#wisdom_lng").keyup(function(){

                            var input_lat = $('#wisdom_lat').val();
                            var input_lng = $('#wisdom_lng').val();

                            var latlng = new google.maps.LatLng(input_lat,input_lng);

                            marker.setPosition(latlng);
                            map.panTo(latlng);
                        });

                        google.maps.event.addListener(marker, 'dragend', function (event) {
                            document.getElementById("wisdom_lat").value = event.latLng.lat();
                            document.getElementById("wisdom_lng").value = event.latLng.lng();
                        });
                    }

                    var editor_config = {
                        path_absolute : "/",
                        selector: "textarea.wisdom_detail",
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
                        $( '#wisdomEdit' ).validate( {
                            lang: 'th',
                            rules: {
                                wisdom_name_th: 'required',
                                wisdom_name_eng: 'required',
                                wisdom_address: 'required',
                                wisdom_lat: {
                                    required: true,
                                    number: true,
                                },

                                wisdom_lng: {
                                    required: true,
                                    number: true,
                                },
                                wisdom_detail: 'required',
                                wisdom_tagline: 'required',
                                // wisdom_tag: 'required',
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