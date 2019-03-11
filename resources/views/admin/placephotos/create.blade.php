@extends('layouts.main')
@section('title')
    จัดการรูปภาพ : {{ $place->place_name_th }} | {{ $place->place_name_eng }}
@endsection

@push('css')

@endpush

@section('content')
    <br>

    <div class="card">
        <div class="card-header">
            อัพโหลดรูปภาพ : {{ $place->place_name_th }}
        </div>

        <div class="card-body">
            <form action="{{ url('admin/placephotos') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="placephotos[]" multiple>

                {{ Form::hidden('place_id', $place->place_id) }}
                <input type="submit" class="btn btn-success" value="อัพโหลด">
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            รูปภาพ
        </div>

        <div class="card-body">
            @if (count($placephotos) > 0)
                <div class="row">
                @foreach ($placephotos as $placephoto)

                    <div class="col-md-3">

                        <div align="center">

                        <img src="{{ asset("uploads/images/$placephoto->placephoto_path") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">

                        <p align="center">

                            {!! Form::open(['method' => 'DELETE','action' => ['Admin\PlacephotoController@destroy',$placephoto->placephoto_id]]) !!}
                            {{ Form::hidden('place_id', $place->place_id) }}
                            {!! Form::submit('ลบรูปภาพ',['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}

                        </p>
                        </div>
                    </div>

                @endforeach
                </div>
            @else

            @endif
        </div>

    </div>

    <div class="text-right">
        <a href="{{ url("admin/places/{$place->place_id}") }}" class="btn btn-success">เสร็จสิ้น</a>
    </div>
    <br>

    @push('scripts')
        <script type="text/javascript">

        </script>
    @endpush

@endsection