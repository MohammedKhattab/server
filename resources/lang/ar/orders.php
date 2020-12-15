<?php

return [
    'resource' => 'الطلبات',

    'fields' => [
        'id' => 'الرقم المرجعي للطلب',
        'title' => 'عنوان الطلب',
        'user' => 'المستخدم',
		'status' => [
		    'title' => 'حالة الطلب',
            'pending' => 'قيد المراجعة',
            'rejected' => 'مرفوضة',
            'waiting-payment' => 'بإنتظار الدفع',
            'payment-was-made' => 'تم الدفع',
            'did-not-pay' => 'لم يتم الدفع',
            'shipped' => 'تم التوصيل'
        ],
        'payments' => [
            'on-delivery' => 'الدفع عند الاستلام',
            'paytabs' => 'الدفع بواسطة Visa/Credit card',
            'stc-pay' => 'الجفع بإستخدام STCPay'
        ],
		'city' => 'المدينة',
		'target_name' => 'اسم الهدف',
		'target_phone' => 'هاتف الهدف',
		'target_city' => 'مدينة الهدف',
		'target_references' => 'من اين حصل على المنتج',
		'product_type' => 'نوع المنتج',
		'product_price' => 'سعر المنتج',
        'is_for_client' => 'طلب من البائع',
        'payment_method' => 'الدفع بواسطة',
        'paid_at' => 'تم الدفع في',
        'amount' => 'تكلفة الشحن بعد الخصم',
        'total' => 'القيمة الإجمالية',
        'created_at' => 'إنشء في',
        'updated_at' => 'أخر تعديل في'
    ],

    'create' => [
        'title' => 'سجل جديد',
        'cancel' => 'إلفاء',
        'save' => 'إنشاء السجل'
    ],

    'view' => [
        'action-button' => 'عرض',
        'title' => 'مشاهدة'
    ],

    'edit' => [
        'action-button' => 'تعديل',
        'title' => 'تعديل',
        'cancel' => 'إلفاء',
        'save' => 'حفظ التغييرات'
    ],

    'delete' => [
        'action-button' => 'حذف نهائي',
        'title' => 'هل أنت متأكد من القيام بذلك؟',
        'text' => 'ستفقد معلومات السجل وعلاقاته أيضاً بشكل نهائي!',
        'confirm' => 'نعم، قم بالحذف',
        'cancel' => 'لا، إلغِ الأمر'
    ],

    'messages' => [
        'created' => 'تم إنشاء السجل بنجاح',
        'updated' => 'تم تعديل السجل بنجاح',
        'deleted' => 'تم حذف السجل'
    ]
];
