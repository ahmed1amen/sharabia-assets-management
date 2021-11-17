<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Assets Sticker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
        @page {
            size: auto;   /* auto is the initial value */
            /* this affects the margin in the printer settings */
            margin: 0mm 0 0mm 0;
        }

        @media print {
            .invoice-card {
                page-break-after: always;
            }
        }

        body {
            font-family: 'Cairo', sans-serif;

            direction: rtl;
            /* this affects the margin on the content before sending to printer */
            margin: 0px;
        }

        @media screen {
            .header, .footer {
                display: none;
            }
        }

        .table > :not(caption) > * > * {
            padding: 0;
            border-bottom-width: 0;
        }

        table {
            font-size: 9px;
            font-weight: bold;
        }

        .invoice-card {
            display: flex;
            flex-direction: column;
            width: 190px;

            height: 150px;
            max-height: 150px;
            background-color: #5fffb0;
            border-radius: 5px;
            /* box-shadow: 0px 10px 30px 15px rgba(0, 0, 0, 0.05);*/
            margin: 1px auto;
        }

        .invoice-head,
        .invoice-card .invoice-title {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice-head {
            flex-direction: row;

        }

        .invoice-card .invoice-title {
            margin: 0;
        }

        .invoice-title span {
            color: rgba(0, 0, 0, 0.4);
        }

        .invoice-details {
            border-top: 0.5px dashed #747272;
            border-bottom: 0.5px dashed #747272;
        }

        .invoice-list {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 1px dashed #858080;
        }

        .invoice-list .row-data {
            border-bottom: 1px dashed #858080;

        }

        .invoice-list .row-data:last-child {
            border-bottom: 0;
            margin-bottom: 0;
        }

        .invoice-list .heading {
            font-size: 1px;
            font-weight: 600;
            margin: 0;
        }

        .invoice-list thead tr td {
            font-size: 1px;
            font-weight: 600;

        }


        .row-data {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            width: 100%;
        }

        .middle-data {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-info {
            max-width: 200px;
        }

        .item-title {
            font-size: 14px;
            margin: 0;
            line-height: 19px;
            font-weight: 500;
        }

        .food_item .img_wrapper {
            padding: 15px 5px;
            background-color: #ececec;
            border-radius: 6px;
            position: relative;
            transition-duration: 0.4s;
        }

        .td-issue {
            word-break: break-all;
            max-width: 140px;
            max-height: 54px;
            font-size: 8px;
        }

        .td-cost {
            direction: ltr;
            text-align: right;
        }

        .food_item .table_info {
            font-size: 11px;
            background: #1db20b;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 4px 8px;
            color: #fff;
            border-radius: 15px;
            text-align: center;
        }


        .food_item:focus .bhojon_title,
        .food_item:hover .bhojon_title {
            color: #fff;
        }

        .food_item:hover .img_wrapper,
        .food_item:focus .img_wrapper {
            background-color: #383838;
        }

        .td-description {
            text-align: center;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="page-wrapper">
    <div class="invoice-card">
        <div class="invoice-head">

            {!!  DNS2D::getBarcodeSVG(strval($maintenanceRequest->assets[0]->id), 'QRCODE' ,2 ,2)!!}
            <img style="width: 60%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">


            <div class="row-data">

                <div class="item-info">
                    <p class="m-0 p-0 mt-1 mx-1 font-weight-bold"
                       style=" direction: ltr; text-align: left; font-weight: 800; font-size: 6px; line-height: 0">
                        {{ '#' .$maintenanceRequest->id . ' in '.$maintenanceRequest->assets[0]->id }}</p>


                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> اسم
                            العميل:{{$maintenanceRequest->client->name}} </strong></p>
                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> تاريخ
                            الإستلام:{{$maintenanceRequest->created_at}} </strong></p>

                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">

                    <table>
                        <tbody>
                        <tr>
                            <td>اسم الجهاز:</td>
                            <td class="td-description">{{$maintenanceRequest->assets[0]->name}} </td>

                        </tr>
                        <tr>
                            <td>الـــعــطــل:</td>

                            <td class="td-issue td-description">
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                            </td>
                        </tr>
                        <tr>
                            <td>الـتــكـلـفة:</td>
                            <td class="td-cost td-description">{{$maintenanceRequest->assets[0]->cost.' EGP'  }} </td>
                        </tr>
                        </tbody>
                    </table>


                    {{-- <p style="font-size: 6px">--}}
                    {{--      </p>--}}

                    {{--                    {{$maintenanceRequest->assets[0]->cost}}--}}
                    {{--                    {{$maintenanceRequest->assets[0]->delivery_date}}--}}
                    {{--                  --}}


                </div>


            </div>

        </div>


    </div>
    <div class="invoice-card">
        <div class="invoice-head">

            {!!  DNS2D::getBarcodeSVG(strval($maintenanceRequest->assets[0]->id), 'QRCODE' ,2 ,2)!!}
            <img style="width: 60%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">


            <div class="row-data">

                <div class="item-info">
                    <p class="m-0 p-0 mt-1 mx-1 font-weight-bold"
                       style=" direction: ltr; text-align: left; font-weight: 800; font-size: 6px; line-height: 0">
                        {{ '#' .$maintenanceRequest->id . ' in '.$maintenanceRequest->assets[0]->id }}</p>


                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> اسم
                            العميل:{{$maintenanceRequest->client->name}} </strong></p>
                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> تاريخ
                            الإستلام:{{$maintenanceRequest->created_at}} </strong></p>

                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">

                    <table>
                        <tbody>
                        <tr>
                            <td>اسم الجهاز:</td>
                            <td class="td-description">{{$maintenanceRequest->assets[0]->name}} </td>

                        </tr>
                        <tr>
                            <td>الـــعــطــل:</td>

                            <td class="td-issue td-description">
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                            </td>
                        </tr>
                        <tr>
                            <td>الـتــكـلـفة:</td>
                            <td class="td-cost td-description">{{$maintenanceRequest->assets[0]->cost.' EGP'  }} </td>
                        </tr>
                        </tbody>
                    </table>


                    {{-- <p style="font-size: 6px">--}}
                    {{--      </p>--}}

                    {{--                    {{$maintenanceRequest->assets[0]->cost}}--}}
                    {{--                    {{$maintenanceRequest->assets[0]->delivery_date}}--}}
                    {{--                  --}}


                </div>


            </div>

        </div>


    </div>
    <div class="invoice-card">
        <div class="invoice-head">

            {!!  DNS2D::getBarcodeSVG(strval($maintenanceRequest->assets[0]->id), 'QRCODE' ,2 ,2)!!}
            <img style="width: 60%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">


            <div class="row-data">

                <div class="item-info">
                    <p class="m-0 p-0 mt-1 mx-1 font-weight-bold"
                       style=" direction: ltr; text-align: left; font-weight: 800; font-size: 6px; line-height: 0">
                        {{ '#' .$maintenanceRequest->id . ' in '.$maintenanceRequest->assets[0]->id }}</p>


                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> اسم
                            العميل:{{$maintenanceRequest->client->name}} </strong></p>
                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> تاريخ
                            الإستلام:{{$maintenanceRequest->created_at}} </strong></p>

                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">

                    <table>
                        <tbody>
                        <tr>
                            <td>اسم الجهاز:</td>
                            <td class="td-description">{{$maintenanceRequest->assets[0]->name}} </td>

                        </tr>
                        <tr>
                            <td>الـــعــطــل:</td>

                            <td class="td-issue td-description">
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                            </td>
                        </tr>
                        <tr>
                            <td>الـتــكـلـفة:</td>
                            <td class="td-cost td-description">{{$maintenanceRequest->assets[0]->cost.' EGP'  }} </td>
                        </tr>
                        </tbody>
                    </table>


                    {{-- <p style="font-size: 6px">--}}
                    {{--      </p>--}}

                    {{--                    {{$maintenanceRequest->assets[0]->cost}}--}}
                    {{--                    {{$maintenanceRequest->assets[0]->delivery_date}}--}}
                    {{--                  --}}


                </div>


            </div>

        </div>


    </div>
    <div class="invoice-card">
        <div class="invoice-head">

            {!!  DNS2D::getBarcodeSVG(strval($maintenanceRequest->assets[0]->id), 'QRCODE' ,2 ,2)!!}
            <img style="width: 60%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">


            <div class="row-data">

                <div class="item-info">
                    <p class="m-0 p-0 mt-1 mx-1 font-weight-bold"
                       style=" direction: ltr; text-align: left; font-weight: 800; font-size: 6px; line-height: 0">
                        {{ '#' .$maintenanceRequest->id . ' in '.$maintenanceRequest->assets[0]->id }}</p>


                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> اسم
                            العميل:{{$maintenanceRequest->client->name}} </strong></p>
                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 7px"><strong> تاريخ
                            الإستلام:{{$maintenanceRequest->created_at}} </strong></p>

                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">

                    <table>
                        <tbody>
                        <tr>
                            <td>اسم الجهاز:</td>
                            <td class="td-description">{{$maintenanceRequest->assets[0]->name}} </td>

                        </tr>
                        <tr>
                            <td>الـــعــطــل:</td>

                            <td class="td-issue td-description">
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                                {{ $maintenanceRequest->assets[0]->issue }}
                            </td>
                        </tr>
                        <tr>
                            <td>الـتــكـلـفة:</td>
                            <td class="td-cost td-description">{{$maintenanceRequest->assets[0]->cost.' EGP'  }} </td>
                        </tr>
                        </tbody>
                    </table>


                    {{-- <p style="font-size: 6px">--}}
                    {{--      </p>--}}

                    {{--                    {{$maintenanceRequest->assets[0]->cost}}--}}
                    {{--                    {{$maintenanceRequest->assets[0]->delivery_date}}--}}
                    {{--                  --}}


                </div>


            </div>

        </div>


    </div>

</div>


</body>
</html>


