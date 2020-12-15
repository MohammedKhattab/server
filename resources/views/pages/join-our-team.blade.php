<x-page :page-name="$page->title">
    {!! $page->body !!}
    <hr class="my-6">

    <pages-form
        url="{{ url('api/v1/jobs') }}"
        :fields="{
            'name': {'type': 'text', 'label': 'الاسم', 'placeholder': 'اكتب اسمك'},
            'phone': {'type': 'tel', 'label': 'رقم الاتصال'},
            'city': {'type': 'text', 'label': 'العنوان', 'placeholder': 'اكتب الحي، المدينة'},
            'has_a_car': {'type': 'radio', 'label': 'هل لديك سيارة', 'options': ['لا', 'نعم'], 'value': '1'},
        }"
    ></pages-form>
</x-page>
