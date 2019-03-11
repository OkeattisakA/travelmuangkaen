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

<div class="form-group">
    {!! Form::label('place_lat','พิกัด Latitude') !!}
    {!! Form::text('place_lat',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('place_lng','พิกัด Longitude') !!}
    {!! Form::text('place_lng',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('map','แผนที่') !!}
    <div id="map" style="width: 100%; height: 350px"></div>
</div>

<div class="form-group">
    {!! Form::label('place_detail','รายละเอียดสถานที่ท่องเที่ยว') !!}
    {!! Form::textarea('place_detail',null,['class' => 'form-control place_detail']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary']) !!}
</div>


@push('scripts')
    <script type="text/javascript">

        var start_lat = {{ $setting[0]->setting_start_lat }};
        var start_lng = {{ $setting[0]->setting_start_lng }};

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: start_lat, lng: start_lng},
                zoom: 13
            });

            var marker = new google.maps.Marker({
                position: {lat: start_lat, lng: start_lng},
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
@endpush