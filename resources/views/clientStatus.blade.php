<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shrabiastore Store - Maintenance Request</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #ffffff;
            background-repeat: no-repeat;
            font-family: 'Cairo', Sans-Serif, serif !important;

        }
p{
    font-family: 'Cairo', Sans-Serif, serif !important;
}
        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-right: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 50%;
            float: right;
            position: relative;
            font-weight: 400
        }


        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #202a2c;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #202a2c;
            position: absolute;
            right: 0;
            top: 16px;
            z-index: -1
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            right: -50%
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            right: -50%
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            right: 50%
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background:  #ed1d46;
            color: #FFFFFF;
        }


        .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px
        }

        .icon-content {
            padding-bottom: 20px
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%
            }
        }
        ul{
            display: flex;
            justify-content: center;
        }
    .font-weight-bolder{
        font-weight: 900 !important;
    }

    </style>

</head>
<body>


<div class="container text-center px-1 px-md-4 py-5 mx-auto">
    <img class="img-fluid w-50" src="https://shrabiastore.com/storage/media/4GDClcyjtTFP0nDYSa584KjMQRxwo8YNmLnCtK9W.png" alt="">



    <div id="accordion">

        <h5 class="my-5">ORDER <span class="text-danger font-weight-bolder">#{{$maintenanceRequest->id}}</span></h5>
        <h5 class="">اسم العميل : <span class="text-danger font-weight-bolder"> {{$maintenanceRequest->client->name}}</span></h5>
        <h5 class="">اجمالي التكلفة : <span class="text-danger font-weight-bolder"> {{$maintenanceRequest->total}} EGP</span></h5>
    @foreach($maintenanceRequest->assets as $asset)

       <div class="card">
           <div class="card-header bg-dark text-right text-white">
               <strong>#- {{$asset->name}}</strong>
           </div>
           <div class="card-body">
               <div class="row d-flex justify-content-center px-3 top text-center">

                   <p class="mb-0 font-weight-bolder">تاريخ التسليم المتوقع
                       <span>{{  $asset->delivery_date}}</span></p>
               </div>
               <div class="row d-flex justify-content-center">
                   <div class="col-12">
                       <ul id="progressbar" class="text-center">
                           <li class="{{($asset->status >= 0) ? 'active' : ''}} fa fa-archive">
                               <p class="font-weight-bold">تم<br>الإستلام</p>
                           </li>

                           <li class="{{($asset->status >= 1) ? 'active' : ''}} fa fa-wrench">
                               <p class="font-weight-bold">قيد<br>الصيانة</p>
                           </li>


                           <li class="{{($asset->status >= 2) ? 'active' : ''}} fa fa-check-circle">
                               <p class="font-weight-bold">جاهز<br>للإستلام</p>
                           </li>
                       </ul>
                   </div>
               </div>

           </div>       @if ($asset->status >=2)
           <div class="card-footer">

               <h5 class=""> التكلفة : <span class="text-danger font-weight-bolder"> {{$asset->cost}} EGP</span></h5>


           </div>
           @endif
       </div>

        @endforeach



</div>


{{--<div class="row justify-content-between top">--}}
{{--    <div class="row d-flex icon-content">--}}
{{--        <img class="icon" src="https://i.imgur.com/9nnc9Et.png">--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <p class="font-weight-bold">Order<br>Processed</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row d-flex icon-content"><img class="icon" src="https://i.imgur.com/u1AzR7w.png">--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <p class="font-weight-bold">Order<br>Shipped</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row d-flex icon-content"><img class="icon" src="https://i.imgur.com/TkPm63y.png">--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <p class="font-weight-bold">Order<br>En Route</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row d-flex icon-content"><img class="icon" src="https://i.imgur.com/HdsziHP.png">--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <p class="font-weight-bold">Order<br>Arrived</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
