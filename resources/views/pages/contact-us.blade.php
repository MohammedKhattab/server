<x-page :page-name="$page->title">
    {!! $page->body !!}
    <hr class="my-6">

    <pages-form
        url="{{ url('api/v1/contacts') }}"
        :fields="{
            'name': {'type': 'text', 'label': 'الاسم', 'placeholder': 'اكتب اسمك'},
            'email': {'type': 'email', 'label': 'البريد الإلكتروني', 'placeholder': 'اكتب بريدك الإلكتروني'},
            'phone': {'type': 'tel', 'label': 'رقم الاتصال'},
            'subject': {'type': 'text', 'label': 'العنوان', 'placeholder': 'اكتب عنوان لرسالتك'},
            'message': {'type': 'textarea', 'label': 'الرسالة', 'placeholder': 'اكتب نص الرسالة', 'parent_class': 'col-span-1 lg:col-span-2'},
        }"
    ></pages-form>
</x-page>
