<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>รายงานข้อมูลภูมิปัญญาท้องถิ่นที่มีการรีวิวมากสุด | {{ DB::table('settings')->select('setting_systemname_th')->first()->setting_systemname_th }}</title>
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
<p align="center"><b>รายงานข้อมูลภูมิปัญญาท้องถิ่นที่มีการรีวิวมากสุด</b></p>
<p align="center"><b>{{ DB::table('settings')->select('setting_systemname_th')->first()->setting_systemname_th }}</b></p>
<table class="table table-bordered" width="100%">
    <tr>
        <th align="center">
            ชื่อภูมิปัญญาท้องถิ่น
        </th>
        <th align="center">
            จำนวนรีวิว
        </th>
    </tr>
    @foreach($wisdomreviews as $wisdomreview)
        <tr>

            <td>
                {{ $wisdomreview->wisdom->wisdom_name_th }}
            </td>

            </td>
            <td align="center">
                {{$wisdomreview->reviewcount}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>