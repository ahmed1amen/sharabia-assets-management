<?php


return [

    'singular' => [
        'maintenance_request' => 'طلب صيانة',
        'employee' => 'موظف',
        'client' => 'عميل',
        'client_asset' => 'جهاز',
        'setting' => 'اعداد',
        'asset' => 'نوع جهاز',
    ],
    'plural' => [
        'maintenance_request' => 'طلبات الصيانة',
        'employee' => 'الموظفين',
        'client' => 'العملاء',
        'client_asset' => 'الأجهزه',
        'setting' => 'الأعدادات',
        'asset' => 'انواع الأجهزه',
    ],


    'models' => [
        'created_at' => 'تاريخ الأضافة',
        'ClientAsset' => [
            'id' => 'كود',
            'name' => 'اسم الجهاز',
            'issue' => 'العطل',
            'amount_due' => 'المتبقي',
            'delivery_date' => 'تاريخ التسليم',
            'cost' => 'التكلفة',
            'employee_id' => 'الموظف المسؤول',
        ],
        'Client' => [

            'id' => 'كود العميل',
            'name' => 'اسم العميل',
            'email' => 'الإميل',
            'phone' => 'رقم التليفون',
            'address' => 'العنوان',
            'notes' => 'ملاحظات',

        ],
        'Employee' => [
            'id' => 'كود الموظف',
            'name' => 'اسم الموظف',
            'position' => 'المسمي الوظيفي',
            'description' => 'الوصف',


        ],
        'MaintenanceRequest' => [
            'total' => 'الاجمالي',
            'total_paid' => 'المدفوع',
            'amount_due' => 'المتبقي',


        ]

    ]


];
