
<!-- Printable area start -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Print Invoice</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="http://bhojon.test/application/modules/ordermanage/assets/css/pos_token.css">
    <link rel="stylesheet" type="text/css" href="http://bhojon.test/application/modules/ordermanage/assets/css/pos_print.css">

    <style type="text/css">
        @page
        {
            size: auto;   /* auto is the initial value */

            /* this affects the margin in the printer settings */
            margin: 0mm 0 0mm 0;
        }

        body
        {
            /* this affects the margin on the content before sending to printer */
            margin: 0px;
        }
        @media screen {
            .header, .footer {
                display: none;
            }
        }
        .mb-0 {
            margin-bottom: 0;
        }

        .my-50 {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .my-0 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .my-5 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .mr-18 {
            margin-right: 18px;
        }

        .mr-25 {
            margin-right: 25px;
        }

        .mb-25 {
            margin-bottom: 25px;
        }
        .h4, .h5, .h6, h4, h5, h6 {
            margin-top: 10px;
            margin-bottom: 10px;
        }


        /*  List*/

        .invoice-card {
            display: flex;
            flex-direction: column;
            padding: 25px;
            width:300px;
            background-color: #fff;
            border-radius: 5px;
            /* box-shadow: 0px 10px 30px 15px rgba(0, 0, 0, 0.05);*/
            margin: 35px auto;
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
            flex-direction: column;
            margin-bottom: 25px;
        }

        .invoice-card .invoice-title {
            margin: 15px 0;
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
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .invoice-list .row-data:last-child {
            border-bottom: 0;
            margin-bottom: 0;
        }

        .invoice-list .heading {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .invoice-list thead tr td {
            font-size: 15px;
            font-weight: 600;
            padding: 5px 0;
        }

        .invoice-list tbody tr td {
            line-height: 25px;
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

        .item-size {
            line-height: 19px;
        }

        .item-size,
        .item-number {
            margin: 5px 0;
        }

        .invoice-footer {
            margin-top: 20px;
        }

        .gap_right {
            border-right: 1px solid #ddd;
            padding-right: 15px;
            margin-right: 15px;
        }

        .b_top {
            border-top: 1px solid #ddd;
            padding-top: 12px;
        }



        .food_item .img_wrapper {
            padding: 15px 5px;
            background-color: #ececec;
            border-radius: 6px;
            position: relative;
            transition-duration: 0.4s;
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


        .text-center {
            text-align: center;
        }
        .border-top{border-top: 2px dashed #858080;
            background: #ececec;}
        .text-bold{font-weight:bold !important;}
    </style>
</head>

<body>

<div class="page-wrapper">
    <div class="invoice-card">
        <div class="invoice-head">
            <img style="width: 100%;"
                 src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">
        </div>
        <div class="invoice_address">
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Date: Nov 08, 2021</h5>
                </div>
                <h5 class="item-title">TIN OR VAT NUM.: 23457586</h5>                </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-list">
                <div class="invoice-title">
                    <h4 class="heading">Item</h4>
                    <h4 class="heading heading-child">Total</h4>
                </div>

                <div class="invoice-data">

                    <div class="row-data">
                        <div class="item-info">
                            <h5 class="item-title">Margherita</h5>
                            <p class="item-size">Extra Sauce</p>
                            <p class="item-number">50.000 x 3</p>
                        </div>
                        <h5>$ 150 </h5>
                    </div>


                </div>
            </div>

        </div>
        <div class="invoice-footer mb-15">
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Subtotal</h5>
                </div>
                <h5 class="my-5">$ 150 </h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Vat(14.00%)</h5>
                </div>
                <h5 class="my-5">
                    $          11.25                  </h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Service Charge</h5>
                </div>
                <h5 class="my-5">$30</h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Discount</h5>
                </div>
                <h5 class="my-5">$  63.772 </h5>
            </div>
            <div class="row-data border-top">
                <div class="item-info">
                    <h5 class="item-title text-bold">Grand Total</h5>
                </div>
                <h5 class="my-5">$ 127.48 </h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Customer Paid Amount</h5>
                </div>
                <h5 class="my-5">$  493.29 </h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Change Due</h5>
                </div>
                <h5 class="my-5">$  365.81 </h5>
            </div>
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Total payment</h5>
                </div>
                <h5 class="my-5"> $493.29</h5>
            </div>
        </div>

        <div class="invoice_address">
            <div class="row-data">
                <div class="item-info">
                    <h5 class="item-title">Billing To: Walkin</h5>
                </div>
                <h5 class="my-5">Bill By:  </h5>
            </div>
            <div class="middle-data">
                <div class="item-info gap_right">
                    <h5 class="item-title">Table: 3</h5>
                </div>
                <div class="item-info">
                    <h5 class="item-title">Order No.: 1</h5>
                </div>
            </div>
            <div class="text-center">
                <h3 class="mt-10">Thank you very much</h3>
                <p class="b_top">Powered  By: BDTASK, www.bdtask.com</p>
            </div>
        </div>
    </div>
</div>


</body>
</html>
