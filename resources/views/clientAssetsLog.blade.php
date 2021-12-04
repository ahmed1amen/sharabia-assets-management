@extends(backpack_view('blank'))

@php
    $defaultBreadcrumbs = [
      trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
     // $crud->entity_name_plural => url($crud->route),
      trans('backpack::crud.preview') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="container-fluid d-print-none">

    </section>
@endsection

@section('content')
    <div id="app" class="container">

        <div class="row justify-content-center">
            <label>
                كود الجهاز
                <input  v-on:keyup.enter="submit" type="search" class="form-control" placeholder="بحث..." >
            </label>



            <div class="table-responsive">
                <table class="table table-striped  table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم الجهاز</th>
                        <th scope="col">اسم الحركة</th>
                        <th scope="col">الموظف المسؤول</th>
                        <th scope="col">تاريخ الحركة</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    <tr class='text-center' role='row' v-for="(histroy, k) in assetHistory" :key="k">--}}
{{--                        <td><span   v-text="histroy.product_no" id='td_barcode' class="text-lg-center badge badge-danger"> </span> </td>--}}

{{--                    </tr>--}}

                    <tr>
                        <th>1</th>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td > <span class="badge badge-info"> خروج</span> </td>
                        <td>@mdo</td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection


@section('after_styles')

    <link rel="stylesheet"
          href="{{ asset('packages/backpack/crud/css/crud.css').'?v='.config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet"
          href="{{ asset('packages/backpack/crud/css/show.css').'?v='.config('backpack.base.cachebusting_string') }}">

    <style>
        td,th
        {
            text-align: center;
        }
    </style>

@endsection

@section('after_scripts')

    <script src="{{ asset('packages/vuejs/vue.min.js')  }}"></script>
    <script src="{{ asset('packages/axios/axios.min.js')  }}"></script>
    <script src="{{ asset('packages/backpack/crud/js/crud.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script   src="{{ asset('packages/backpack/crud/js/show.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>


    <script>


        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                assetHistory: []

            },
            methods: {
                submit: function (event) {


                    axios.post("{{route('client-asset.fetchClient')}}" ,{'asset_id':event.target.value})
                        .then(response =>
                            {
                                console.log(response)
                            }

                        )
                        .catch(err => {
                            alert('حدث خطأ')

                        })

                }
            }
        })


    </script>






@endsection
