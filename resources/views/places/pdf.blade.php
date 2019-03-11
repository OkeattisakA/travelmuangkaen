<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
{{--<body>--}}
<body onload="window.print()">
    {{ $place->place_name_th }} | {{ $place->place_name_eng }}
    <p>&nbsp;{!! $place->place_detail !!}</p>
</div>

<script type="text/javascript">
</script>

</body>
</html>