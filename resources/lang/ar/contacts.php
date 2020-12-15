<?php

return [
    'resource' => 'رسائل الموقع',

    'fields' => [
        'id' => '#',
		'name' => 'الاسم',
		'email' => 'البريد الإلكتروني',
		'phone' => 'الهاتف',
		'subject' => 'العنوان',
		'message' => 'نص الرسالة',
        'created_at' => 'إنشء في',
        'updated_at' => 'أخر تعديل في'
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
