<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้เปิดอ่านมากสุด | {{ DB::table('settings')->select('setting_systemname_th')->first()->setting_systemname_th }}</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body{
            font-family: "THSarabunNew";
            font-size: 18px;
        }
        table{
            border-collapse: collapse;
        }
        td,th{
            border: 1px solid;
        }
    </style>
</head>
<body>
<p align="center"><b>รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้เปิดอ่านมากสุด</b></p>
<p align="center"><b>{{ DB::table('settings')->select('setting_systemname_th')->first()->setting_systemname_th }}</b></p>
<table class="table table-bordered" width="100%">
    <tr>
        <th align="center">
            ชื่อสถานที่ท่องเที่ยว
        </th>
        <th align="center">
            จำนวนผู้เข้าชม
        </th>
    </tr>
    @foreach($places as $place)
        <tr>
            <td>
                {{$place->place_name_th}}
            </td>
            <td align="center">
                {{$place->place_reader}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>