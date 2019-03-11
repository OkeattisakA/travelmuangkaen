@extends('layouts.guest')
@section('title','Travel Muangkaen')
@section('content')
    <br>
    <input type="text" name="Search" class="form-control" id="Search">

    @push('scripts')

        <script type="text/javascript">

            data = [
                'Cambodia',
                'Thai',
                'China'
            ];

            $('#Search').autocomplete({
                source: "{{ url('autocomplete-search') }}",
                select:function (key,value)
                {
                    console.log(value);
                }
            });

        </script>
    @endpush

@endsection