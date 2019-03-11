@extends('layouts.main')
@section('title')
    จัดการรูปภาพ : {{ $wisdom->wisdom_name_th }} | {{ $wisdom->wisdom_name_eng }}
@endsection

@push('css')

@endpush

@section('content')
    <br>

    <div class="card">
        <div class="card-header">
            อัพโหลดรูปภาพ : {{ $wisdom->wisdom_name_th }}
        </div>

        <div class="card-body">
            <form action="{{ url('member/wisdomphotos') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="wisdomphotos[]" multiple>

                {{ Form::hidden('wisdom_id', $wisdom->wisdom_id) }}
                <input type="submit" class="btn btn-success" value="อัพโหลด">
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            รูปภาพ
        </div>

        <div class="card-body">
            @if (count($wisdomphotos) > 0)
                <div class="row">
                    @foreach ($wisdomphotos as $wisdomphoto)

                        <div class="col-md-3">

                            <div align="center">

                                <img src="{{ asset("uploads/images/$wisdomphoto->wisdomphoto_path") }}" style="width: 200px; height: 200px;" class="img-fluid img-thumbnail">

                                <p align="center">

                                    {!! Form::open(['method' => 'DELETE','action' => ['Member\WisdomphotoController@destroy',$wisdomphoto->wisdomphoto_id]]) !!}
                                    {{ Form::hidden('wisdom_id', $wisdom->wisdom_id) }}
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
        <a href="{{ url("member/wisdoms/{$wisdom->wisdom_id}") }}" class="btn btn-success">เสร็จสิ้น</a>
    </div>
    <br>

    @push('scripts')
        <script type="text/javascript">

        </script>
    @endpush

@endsection