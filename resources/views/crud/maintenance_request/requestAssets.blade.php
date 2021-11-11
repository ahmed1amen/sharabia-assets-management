<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Asset</title>

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
    <img style="width: 60%;" src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
    {!!  DNS2D::getBarcodeSVG('444564565665655656565656', 'QRCODE' ,3 ,3)!!}


        <p class="centered" style="font-size: 10px;font-weight: 800;   ">
            Ayman Hashem : اسم العميل
        </p>


    </div>




</body>
</html>

