<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            direction: rtl;
            margin: auto;
            padding: 0;
            width: 270px;
            font-family: "Cairo", sans-serif;
        }

        @page {
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
        }

        table {
            width: 100%;
        }

        h1 {
            text-align: center;
            vertical-align: middle;
        }

        #logo {
            width: 60%;
            text-align: center;
            -webkit-align-content: center;
            align-content: center;
            padding: 5px;
            margin: 2px;
            display: block;
            margin: 0 auto;
        }

        header {
            width: 100%;
            text-align: center;
            -webkit-align-content: center;
            align-content: center;
            vertical-align: middle;
        }

        .items thead {
            text-align: center;
        }

        .center-align {
            text-align: center;
        }

        .bill-details td {
            font-size: 12px;
        }

        .receipt {
            font-size: medium;
        }

        .items .heading {
            font-size: 13px;
            text-transform: uppercase;
            border-top: 1px solid black;
            margin-bottom: 4px;
            border-bottom: 1px solid black;
            vertical-align: middle;
        }

        .items thead tr th:first-child,
        .items tbody tr td:first-child {

            word-break: break-all;
            text-align: center;
        }

        .items td {

            text-align: center;
            vertical-align: bottom;
        }


        .sum-up {
            text-align: right !important;
        }

        .total {
            font-size: 13px;
            border-top: 1px dashed black !important;
            border-bottom: 1px dashed black !important;
        }

        .total.text, .total.price {
            text-align: right;
            direction: ltr;

        }

        .total.price::after {
            content: " EGP";
        }

        .line {
            border-top: 1px solid black !important;
        }


        p {
            padding: 1px;
            margin: 0;
        }

        section, footer {
            font-size: 12px;
        }

        .pos-header {
            margin: auto;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border-top: 2px solid #000000;

        }


        .items > th, td {
            padding: 5px 8px;
            font-weight: 700;
            font-size: 10px;
            text-align: center;
            border: 2px solid #000000;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        .td-id {
            width: 20px;
        }

        td:first-child, th:first-child {
            max-width: 10px;
            overflow: hidden;
        }
    </style>
    <title></title>
</head>

<body onload="window.print()">
<header>
    <div id="logo" class="media" data-src="logo.png" src="./logo.png"></div>

</header>
@if  (isset($_GET['withsticker']))
    <iframe style="visibility: hidden;display: none" src="{{route('client.assets.stickers',$crud->entry->id)}}"
            id="printpos" name="printpos"></iframe>
@endif

<div class="pos-header">
    <img class="logo" width="600" height="400"
         src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
    {!!  DNS2D::getBarcodeSVG(route('client.status',\Vinkla\Hashids\Facades\Hashids::encode($crud->entry->id)), 'QRCODE'  ,5,5)!!}
    <br>

    <strong>Scan الكود علشان تعرف حالة جهازك</strong>

</div>

<p class="m-0 p-0 mt-1 mx-1 font-weight-bold"
   style=" direction: ltr; text-align: left; font-weight: 800; font-size: 14px; line-height: 0">
    {{ '#' .$crud->entry->id }}
</p>


<p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 15px"><strong> اسم
        العميل:{{$crud->entry->client->name}} </strong></p>
<p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 15px"><strong>
        {{$crud->entry->created_at}} </strong></p>


<table class="items">
    <thead>
    <tr>
        <th class="heading  ">#</th>
        <th class="heading  ">اسم الجهاز</th>
        <th class="heading  ">العطل</th>

    </tr>
    </thead>

    <tbody>
    @foreach($crud->entry->assets as $asset)

        <tr>
            <td class="td-id">{{$asset->id}}</td>
            <td>{{$asset->name}}</td>
            <td>{{$asset->issue}}</td>
        </tr>
    @endforeach

    <tr>
        {{--        <th colspan="2" class="total text">الأجمالي</th>--}}
        {{--        <th class="total price">12132.00</th>--}}
    </tr>
    </tbody>
</table>
<section>
    <p style="text-align:center; direction: ltr; font-weight: 800;font-size: 15px">
        Thank you for your visit !
    </p>
</section>
<footer style="text-align:center">
    <p>
        <strong> ممر 3، غيط العدة، عابدين، محافظة القاهرة</strong>
        <br>
        <strong> 023964445 - 01148366669 - 01224819244</strong>
        <br>


        <span class="center-align">
               {!!  DNS2D::getBarcodeSVG('99999999999999999999999', 'QRCODE'  ,3,3)!!}
        </span>
        <br>
        <span style="border-top: 1px solid; ">

Technology Partner Refilex - www.Refilex.com
       </span>
    </p>

</footer>
</body>

</html>








