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

        .table-invoice td,
        .table-invoice th,
        .table-invoice tr,
        .table-invoice {
            border: 1px solid black;
            border-collapse: inherit;
            font-size: 10px;
            font-weight: 600
        }

        .table-invoice td.description,
        .table-invoice th.description {
            width: 75px;
            max-width: 75px;
        }

        .table-invoice td.quantity,
        .table-invoice th.quantity {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .table-invoice td.price,
        .table-invoice th.price {
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


    </style>
</head>
<body>

<div class="ticket">
    <table>
        <thead>
        <tr>


            <th>   {!!  DNS2D::getBarcodeSVG('koooooot', 'QRCODE' , 3 ,3)!!}</th>
            <th>
                <img style="width: 100%;"
                     src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
            </th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td class="centered" colspan="2">
                <p style="font-size: 10px; font-weight: lighter">
                    #54545 - Monday, October 17, 2021 4:30 PM
                    <br>
                    طلب صيانة
                </p>

            </td>

        </tr>

        </tbody>
    </table>

{{--    <h1 class="centered" style="font-size: 22px;border: 5px solid;border-collapse: inherit; ">Shrabia Store</h1>--}}
{{--    <h5 class="centered" style="font-size: 10px;    border-bottom: 2px solid; "> موبيل : 01066104107</h5>--}}

    <hr>
    <p class="righted" style="font-size: 10px;font-weight: 800; margin: 10px 0 ">
        Ayman Hesham : اسم العميل
    </p>


    <table class="table-invoice" style="direction: rtl;">
        <thead>
        <tr>
            <th style="max-width: 200px; width: 200px; text-align: center;">النوع</th>
            <th style="max-width: 300px; width: 300px; text-align: center;" >العطل</th>
            <th style="max-width: 200px; width: 200px; text-align: center;">تاريخ الإستلام</th>

        </tr>
        </thead>
        <tbody>

        <tr>
            <td style="max-width: 200px; width: 200px; text-align: center">test</td>
            <td style="max-width: 200px; width: 200px; text-align: center" class="centered"> </td>
            <td style="max-width: 200px; width: 200px; text-align: center" class="centered">test</td>

        </tr>
        <tr>
            <td style="max-width: 200px; width: 200px; text-align: center">test</td>
            <td style="max-width: 200px; width: 200px; text-align: center" class="centered">test</td>
            <td style="max-width: 200px; width: 200px; text-align: center" class="centered">test</td>

        </tr>


        </tbody>
    </table>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">

    </p>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">
        الاجمالي: 100 -- المدفوع: 100
        <br>
        المتبقي: 100
        <br>
    </p>
    <p class="centered">
        شكراً علي زيارتك لنا
        <br>
    </p>
    <p class="centered" style="border-top: 0.4px solid; font-size: 8px; font-weight: 600">
        Powered By Refilex Software Company . all rights reserved ©
    </p>
</div>


</body>
</html>

