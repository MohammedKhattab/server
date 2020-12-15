<?php

use App\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Microboard\Factory;
use Microboard\Models\Role;
use Microboard\Models\Setting;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Artisan::call('microboard:install');

        $this->createPermissions()
            ->createPages()
            ->createSettings();
    }

    protected function createSettings()
    {
        $settings = [
            [
                'group' => 'site',
                'key' => 'name',
                'title' => 'اسم الموقع',
                'type' => 'argonInput|text',
                'options' => json_encode([]),
            ],
            [
                'group' => 'site',
                'key' => 'logo',
                'title' => 'شعار الموقع',
                'type' => 'avatar',
                'options' => json_encode([]),
            ],
            [
                'group' => 'site',
                'key' => 'copyright',
                'title' => 'حقوق الموقع',
                'type' => 'argonInput|text',
                'options' => json_encode([]),
            ],

            [
                'group' => 'news',
                'key' => 'images',
                'title' => 'الأخبار',
                'type' => 'files',
                'options' => json_encode([]),
            ],

            [
                'group' => 'social',
                'key' => 'facebook_url',
                'title' => 'رابط صفحة الفيس بوك',
                'type' => 'argonInput|url',
                'options' => json_encode([]),
            ],
            [
                'group' => 'social',
                'key' => 'twitter_url',
                'title' => 'رابط صفحة تويتر',
                'type' => 'argonInput|url',
                'options' => json_encode([]),
            ],
            [
                'group' => 'social',
                'key' => 'instagram_url',
                'title' => 'رابط صفحة انستجرام',
                'type' => 'argonInput|url',
                'options' => json_encode([]),
            ],
            [
                'group' => 'social',
                'key' => 'whatApp_url',
                'title' => 'رابط رقم الواتس أب',
                'type' => 'argonInput|url',
                'options' => json_encode([]),
            ],

            [
                'group' => 'seo',
                'key' => 'image',
                'title' => 'الصورة عند مشاركة الموقع في وسائل التواصل',
                'type' => 'avatar',
                'options' => json_encode([]),
            ],
            [
                'group' => 'seo',
                'key' => 'description',
                'title' => 'وصف الموقع',
                'type' => 'argonTextarea',
                'options' => json_encode([]),
            ],
            [
                'group' => 'seo',
                'key' => 'keywords',
                'title' => 'الكلمات الدلالية',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => 'افصل بين الكلمات بعلامة <code>,</code>'
                ]),
            ],

            [
                'group' => 'amount',
                'key' => 'customer',
                'title' => 'سعر الطلب للعملاء',
                'value' => 20,
                'type' => 'argonInput|number',
                'options' => json_encode([]),
            ],
            [
                'group' => 'amount',
                'key' => 'client',
                'title' => 'سعر الطلب للبائعين',
                'value' => 10,
                'type' => 'argonInput|number',
                'options' => json_encode([]),
            ],
            [
                'group' => 'amount',
                'key' => 'discount',
                'title' => 'الخصومات',
                'type' => 'argonInput|number',
                'value' => 5,
                'options' => json_encode([
                    'help' => 'في حال أردت عمل خصومات في الموقع على البائعين والعملاء'
                ]),
            ],

            [
                'group' => 'payments',
                'key' => 'methods',
                'title' => 'طرق الدفع',
                'type' => 'argonSelect',
                'value' => json_encode(['on-delivery']),
                'options' => json_encode([
                    'list' => [
                        'on-delivery' => 'الدفع عند الاستلام',
                        'paytabs' => 'Paytabs',
                        'stc-pay' => 'STCPay'
                    ],
                    'multiple' => true,
                ]),
            ],
            [
                'group' => 'payments',
                'key' => 'paytabs_email',
                'title' => 'البريد الإلكتروني المسجل لدى Paytabs',
                'type' => 'argonInput|email',
                'options' => json_encode([]),
            ],
            [
                'group' => 'payments',
                'key' => 'paytabs_secret',
                'title' => 'مفتاح السر الخاص بPaytabs',
                'type' => 'argonTextarea',
                'options' => json_encode([]),
            ],

            [
                'group' => 'sms',
                'key' => 'username',
                'title' => 'اسم مستخدم رسائل الهاتف',
                'type' => 'argonInput|text',
                'value' => 'Sultanalmalki33',
                'options' => json_encode([]),
            ],
            [
                'group' => 'sms',
                'key' => 'sender',
                'title' => 'اسم المرسل',
                'type' => 'argonInput|text',
                'value' => 'D.agent',
                'options' => json_encode([]),
            ],
            [
                'group' => 'sms',
                'key' => 'password',
                'title' => 'كلمة المرور',
                'type' => 'argonInput|text',
                'value' => 'Aqwe12123',
                'options' => json_encode([]),
            ],

            [
                'group' => 'notifications',
                'key' => 'welcome',
                'title' => 'الإشعارات: أهلاً بك في التطبيق',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message = ('يمكنك استخدام الأكواد التالية ' .
                        '<code>:order_id</code> ,'.
                        '<code>:user_name</code> ,'.
                        '<code>:from</code> ,'.
                        '<code>:to</code>.'.
                        'أو اترك الحقل فارغ لتجاهل الإشعار.'
                    )
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'confirm-for-customer',
                'title' => 'الإشعارات: تأكيد الطلب للبائعين',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'confirm-for-client',
                'title' => 'الإشعارات: تأكيد الطلب للعملاء',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'target-cancel-the-order',
                'title' => 'الإشعارات: الهدف قام بإلغاء الطلب من خلاله',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'order-confirmed',
                'title' => 'الإشعارات: الهدف قام بتأكيد الطلب',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'order-canceled-because-that-no-response',
                'title' => 'الإشعارات: تم إلغاء الطلب لعدم الدفع في الموعد',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
            [
                'group' => 'notifications',
                'key' => 'order-completed',
                'title' => 'الإشعارات: تم تسليم المنتج',
                'type' => 'argonTextarea',
                'options' => json_encode([
                    'help' => $message
                ]),
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }

    /**
     * @return $this
     */
    protected function createPages(): ProjectSeeder
    {
        Page::insert([
            ['title' => 'من نحن', 'slug' => 'about-us', 'body' => '<h1>عن ديجيتال إيجنت</h1>'],
            ['title' => 'إنضم لفريقنا', 'slug' => 'join-our-team', 'body' => "<h1>أهلاً بك في ديجيتال إيجنت.</h1><div>إن كنت تود الإنضمام لفريقنا، قم بملأ النموذج التالي، لنتمكن من مراجعة البيانات والأماكن الشاغرة والاتصال بكم فور توافرها.<br><br>شكراً لاستخدامكم <strong>ديجيتال إيجنت</strong></div>"],
            ['title' => 'سياسة الإستخدام', 'slug' => 'policy-and-terms', 'body' => '<h1>سياسة الإستخدام</h1>'],
            ['title' => 'اتصل بنا', 'slug' => 'contact-us', 'body' => "<div>يسعدنا تلقي رسائلكم واقتراحاتكم عبر البريد الإلكتروني، أو عبر ارسال النموذج التالي.<br><br>شكراً لإستخدامكم <strong>ديجيتال إيجنت</strong></div>"],
        ]);

        return $this;
    }

    /**
     * @return ProjectSeeder
     * @throws Exception
     */
    protected function createPermissions(): ProjectSeeder
    {
        app(Factory::class)->createResourcesPermissionsFor(
            Role::find(1),
            [
                'pages' => null,
                'advertisements' => null,
                'jobs' => [
                    'viewAny', 'view', 'update', 'delete'
                ],
                'contacts' => [
                    'viewAny', 'view', 'update', 'delete'
                ],
                'orders' => null,
            ]
        );

        return $this;
    }
}
