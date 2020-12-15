<x-layout page-name="الرئيسية">
    <div class="container">
        <div class="flex flex-col-reverse md:flex-row">
            <main-form
                :customer-fields="{
                    'name': {'type': 'text', 'label': 'الاسم', 'placeholder': 'اكتب اسمك بالكامل', 'parent_class': 'col-span-1 lg:col-span-2'},
                    'phone': {'type': 'tel', 'label': 'رقم الاتصال', 'placeholder': '5xxxxxxxx'},
                    'city': {'type': 'text', 'label': 'العنوان', 'placeholder': 'اكتب الحي، والمدينة'},
                    'target_city': {'type': 'text', 'label': 'مدينة المنتج', 'placeholder': 'اكتب مدينة المنتج'},
                    'target_phone': {'type': 'tel', 'label': 'رقم البائع', 'placeholder': '5xxxxxxxx'},
                    'product_type': {'type': 'select', 'label': 'نوع المنتج', 'related_by': 'other', 'placeholder': 'اختر نوع المنتج', 'options': ['سيارات']},
                    'other': {'related_to': 'product_type'},
                    'product_price': {'type': 'number', 'label': 'سعر المنتج', 'placeholder': 'ادخل سعر المنتج'},
                    'target_references': {'type': 'text', 'label': 'اين وجدت المنتج', 'placeholder': 'اكتب مثلاً: عن طريق موقع، تطبيق...'},
                }"
                :client-fields="{
                    'name': {'type': 'text', 'label': 'الاسم', 'placeholder': 'اكتب اسمك بالكامل'},
                    'phone': {'type': 'tel', 'label': 'رقم الاتصال', 'placeholder': '5xxxxxxxx'},
                    'city': {'type': 'text', 'label': 'العنوان', 'placeholder': 'اكتب الحي، والمدينة'},
                    'target_name': {'type': 'text', 'label': 'اسم العميل', 'placeholder': 'اكتب اسم العميل'},
                    'target_phone': {'type': 'tel', 'label': 'رقم العميل', 'placeholder': '5xxxxxxxx'},
                    'target_city': {'type': 'text', 'label': 'مدينة العميل', 'placeholder': 'اكتب مدينة العميل'},
                    'product_type': {'type': 'select', 'label': 'نوع المنتج', 'related_by': 'other', 'placeholder': 'اختر نوع المنتج', 'options': ['سيارات']},
                    'other': {'related_to': 'product_type'},
                    'product_price': {'type': 'number', 'label': 'سعر المنتج', 'placeholder': 'ادخل سعر المنتج'},
                }"
                class="flex-1 mt-8 md:mt-0"></main-form>

            <news :news="{{ json_encode($settings->news()) }}"
                  class="w-full p-6 md:w-5/12 rounded rounded-br-none shadow-lg bg-white"
            ></news>
        </div>
    </div>
</x-layout>
