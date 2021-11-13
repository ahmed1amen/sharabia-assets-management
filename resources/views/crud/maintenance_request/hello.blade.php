
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

        body {
            font-family: 'Cairo', sans-serif;
            font-weight: 900;
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
            font-size: 12px;
            font-weight: bold;
        }

        .invoice-card {
            display: flex;
            flex-direction: column;
            width: 80mm;
            background-color: #ffffff;
            border-radius: 5px;
            /* box-shadow: 0px 10px 30px 15px rgba(0, 0, 0, 0.05);*/
            margin: 0px auto;
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
            align-items: flex-start;
            width: 100%;
            text-align: center;
        }

        .middle-data {
            display: flex;
            align-items: center;
            justify-content: center;
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

        .td-issue  {
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
        .td-description{
            text-align: center;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

<div class="page-wrapper">
    <div class="invoice-card">
        <div class="invoice-head">


            {!!  DNS2D::getBarcodeSVG(strval($crud->entry->id), 'QRCODE' ,4 ,4)!!}
            <img style="width: 70%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">


            <div class="row-data">

                <div class="item-info">
                    <p class="m-0 p-0 mt-1 mx-1 font-weight-bold" style=" direction: ltr; text-align: left; font-weight: 800; font-size: 14px; line-height: 0">
                        {{ '#' .$crud->entry->id }}</p>


                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 15px"><strong> اسم
                            العميل:{{$crud->entry->client->name}} </strong></p>
                    <p class="m-0 p-0 mt-0 mx-1 font-weight-bold" style="font-size: 15px"><strong>
                            {{$crud->entry->created_at}} </strong></p>

                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">

                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الجهاز</th>
                            <th scope="col">العطل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>     <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>




                </div>


            </div>

        </div>

        <div class="invoice_address">

            <div class="text-center">
                <h3 style="font-size: 18px; font-weight: 900" class="mt-10">شكراً علي زيارتك لنا</h3>
                <p style="font-size: 14px">المركز غير مسؤل عن الجهاز بعد 15 يوم من تاريخ استلامه</p>
                <p style="font-size: 14px">ممر 3، غيط العدة، عابدين، محافظة القاهرة </p>
                <p style="font-size: 10px"  >Powered  By: Refilex - www.Refilex.com</p>
            </div>
        </div>
    </div>
</div>


</body>
</html>













