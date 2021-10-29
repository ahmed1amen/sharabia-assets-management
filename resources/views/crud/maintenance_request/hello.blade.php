<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        html {
            background-color: #FFFFFF;
            margin: 0px; /* this affects the margin on the html before sending to printer */
        }

        * {

            font-family: 'Cairo';
            font-weight: 900;
            margin: 0mm;
        }

        td,
        th,
        tr,
        table {
            border: 1px solid black;
            border-collapse: inherit;
            font-size: 10px;
            font-weight: 800
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
            margin: 0px;
        }

        .lefted {
            text-align: left;

        }

        .righted {
            text-align: right;

        }

        .ticket {
            width: 72mm;
            max-width: 72mm;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

        .qrcode {

            display: flex;
            justify-content: center;
            padding: 10px;
        }

    </style>
</head>
<body>

<div class="ticket">

    <h1 class="centered" style="font-size: 22px;border: 5px solid;border-collapse: inherit; ">شرابية ستور</h1>
    <h5 class="centered" style="font-size: 10px;    border-bottom: 2px solid; "> موبيل : 01066104107</h5>
    <div class="qrcode" style="font-size: 10px;font-weight: 800; ">

        {!!   DNS2D::getBarcodeHTML('4445645656', 'QRCODE',3,3)!!}

    </div>
    <p class="centered" style="font-size: 10px;font-weight: 800; ">
        #11111111111
        <br>
        15-20-2020
        <br>
        اسم العميل : ayman hesham
    </p>


    <table style="direction: rtl;">
        <thead>
        <tr>
            <th style="max-width: 200px; width: 200px; text-align: center;">الصنف</th>
            <th>السعر</th>
            <th>الكميه</th>
            <th>القيمه</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td style="max-width: 200px; width: 200px; text-align: center">test</td>
            <td class="centered">test</td>
            <td class="centered">test</td>
            <td class="centered">test</td>
        </tr>


        </tbody>
    </table>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">
        موعد الإستلام
        <br style="border-bottom: 1px solid">
    </p>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">


        الاجمالي: 100
        <br>
        المدفوع: 100
        <br>
        المتبقي: 100
        <br>


    </p>
    <p class="centered">
        شكراً علي زيارتك لنا
        <br>
    </p>
    <p class="centered" style="border-top: 0.4px solid; font-size: 11px; font-weight: 600">
        Powered By Refilex . all rights reserved ©

    </p>
</div>


</body>
</html>

