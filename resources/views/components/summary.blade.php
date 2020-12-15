<div class="md:-ml-6 md:-my-8 bg-gray-100 flex flex-col justify-between px-6 py-2 shadow-lg text-gray-600 md:w-2/5 w-full">
    <table>
        <tr>
            <th class="text-left pl-3 w-1/4">رقم الطلب</th>
            <td class="text-right">{{ $order->id }}</td>
        </tr>
        <tr>
            <th class="text-left pl-3 w-1/4">الطلب</th>
            <td class="text-right">
                {!! str_replace(
                    'px-2 bg-gradient-success text-white py-1 rounded',
                    'px-2 text-white bg-indigo-500 rounded-md shadow-md',
                    $order->title
                ) !!}
            </td>
        </tr>
        <tr>
            <th class="text-left pl-3 w-1/4">نوع المنتج</th>
            <td class="text-right">{{ $order->product_type }}</td>
        </tr>
        <tr>
            <th class="text-left pl-3 w-1/4">سعر المنتج</th>
            <td class="text-right">{{ $order->readableProductPrice() }}</td>
        </tr>
        @unless($withoutSensitiveDetails)
            <tr>
                <th class="text-left pl-3 w-1/4">قيمة الشحن</th>
                <td class="text-right">
                    {{ $order->formatToCurrency($settings->value('amount.' . $order->type, 0)) }}
                </td>
            </tr>
        @endunless
    </table>

    @unless($withoutSensitiveDetails)
        <table class="border-t text-black">
            @if($settings->value('amount.discount', 0))
                <tr>
                    <th class="text-left pl-3 w-1/4">الخصم</th>
                    <td class="text-right">
                        ({{ $order->formatToCurrency($settings->value('amount.discount')) }})
                    </td>
                </tr>
            @endif
            <tr>
                <th class="text-left pl-3 w-1/4">الإجمالي</th>
                <td class="text-right">{{ $order->readableTotal() }}</td>
            </tr>
        </table>
    @endunless
</div>
