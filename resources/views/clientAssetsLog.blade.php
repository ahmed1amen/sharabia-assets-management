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

@section('content')
    <div id="app" class="container">

        <div class="row justify-content-center">
            <label>
                كود الجهاز
                <input v-on:keyup.enter="submit" type="search" id="searchbox" class="form-control form-control-lg"
                       placeholder="بحث...">
            </label>


            <div v-if="asset" class="my-5 col-12  col-md-12 col-xl-12 col-sm-12 justify-content-center text-center">
                <div class="card bg-secondary">
                    <div class="card-header text-right">
                        <h4 class=" ">تحديث حالة الجهاز</h4>
                    </div>
                    <div class="card-body">
                        <label>اختر المهندس
                            <select class="form-control" v-model="selected_emp" name="name">
                                <option disabled :selected="true">اختر المهندس</option>
                                <option v-for="employee in employees" v-bind:value="employee.id">@{{ employee.name }}
                                </option>
                            </select>
                        </label>
                        <button v-on:click="changeStatus" v-bind:data-id="1" name="status_1" class="mx-5 btn btn-primary">
                            قيد الصيانة
                            <i class="active fa fa-wrench"></i></button>

                        <button v-on:click="changeStatus" v-bind:data-id="2" name="status_2" class="mx-5 btn btn-danger">غير قابل للصيانة
                            <i class="active fa fa-times-circle"></i></button>

                        <button v-on:click="changeStatus"  v-bind:data-id="3" name="status_3" class="mx-5 btn btn-success">تسليم
                            <i class="active fa fa-check-circle"></i></button>

                    </div>

                </div>

            </div>

            <div class="card col-12">

                <div class="card-header text-center">
                    <h1>كشف الحركة</h1>
                    <div class="row col-6">
                        <table class="table table-striped border table-sm table-hover">


                            <tbody>
                            <tr class='text-center' role='row'>
                                <td> اسم الجهاز:</td>
                                <td>@{{ asset.name }}</td>
                            </tr>
                            <tr class='text-center' role='row'>
                                <td>كود الجهاز:</td>
                                <td>@{{ asset.id }}</td>
                            </tr>
                            <tr class='text-center' role='row'>
                                <td>حالة الجهاز:</td>

                                <td class="bg-dark">  @{{ getAssetStatus }} </td>
                            </tr>


                            </tbody>

                        </table>


                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نوع الحركة</th>
                                <th scope="col">المهندس المسؤول</th>
                                <th scope="col">تاريخ الحركة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class='text-center' v-for="(history, index) in assetHistory" role='row'>

                                <td> @{{ history.id }}</td>
                                <td><span class="badge badge-danger">  @{{ history.description }}</span></td>
                                <td> @{{ history.causer.name }}</td>
                                <td> @{{ history.created_at}}</td>

                            </tr>


                            </tbody>
                        </table>
                    </div>

                </div>

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
        td, th {
            text-align: center;
        }
    </style>

@endsection

@section('after_scripts')

    <script src="{{ asset('packages/vuejs/vue.min.js')  }}"></script>
    <script src="{{ asset('packages/axios/axios.min.js')  }}"></script>
    <script
        src="{{ asset('packages/backpack/crud/js/crud.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script
        src="{{ asset('packages/backpack/crud/js/show.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>


    <script>


        var app = new Vue({
            el: '#app',
            data: {
                asset: false,
                assetHistory: [],
                employees: @json(\App\Models\Employee::query()->select(['id','name'])->where('type',1)->get()->toArray()),
                selected_emp: "اختر المهندس"

            },
            computed: {

                getAssetStatus: function () {
                    switch (this.asset.status) {
                        case 0:
                            return 'تم الإستلام'

                            break;
                        case 1:
                            return 'قيدالصيانة'

                            break;
                        case 2:
                            return 'غير قابل للصيانة'
                            break;
                        case 3:
                            return 'تم التسليم'
                            break;


                    }

                }
            },
            methods: {
                changeStatus: function (event) {
                    if (this.selected_emp==='اختر المهندس')
                    {
                        new Noty({
                            type: "error",
                            text: 'برجاء تحديد المهندس',
                        }).show();
                        return;
                    }

                    let self = this
                    axios.post("{{route('update.client.status')}}",
                        {
                            'status': event.target.dataset.id,
                            'asset_id': this.asset.id,
                            'employee_id': this.selected_emp
                        }

                    ).then(response => {
                        new Noty({
                            type: "success",
                            text: 'تم تحديث البيانات',
                        }).show();

                        axios.post("{{route('client-asset.fetchClient')}}", {'asset_id':  this.asset.id})
                            .then(response => {
                                self.assetHistory = response.data.history
                                self.asset = response.data.asset
                            })
                            .catch(err => {
                                console.log(err)
                                self.assetHistory = [];
                                self.asset = false;
                                new Noty({
                                    type: "error",
                                    text: 'لا توجد بيانات',
                                }).show();
                            })

                    })
                        .catch(err => {
                            console.log(err)
                            new Noty({
                                type: "error",
                                text: 'لا توجد بيانات',
                            }).show();
                        })







                }
                ,

                submit: function (event) {
                    let self = this

                    axios.post("{{route('client-asset.fetchClient')}}", {'asset_id': event.target.value})
                        .then(response => {
                            self.assetHistory = response.data.history
                            self.asset = response.data.asset
                        })
                        .catch(err => {
                            console.log(err)
                            self.assetHistory = [];
                            self.asset = false;
                            new Noty({
                                type: "error",
                                text: 'لا توجد بيانات',
                            }).show();
                        })

                }
            }
        })


    </script>






@endsection
