<x-page page-name="إتمام العملية" :centered="false">
    <div class="flex flex-col-reverse md:flex-row">
        <div class="flex-1 md:px-8 md:-mt-8">
            <h3 class="text-indigo-500 mb-12">
                @if ($order->status === 0)
                    @if(!$order->is_for_client)
                        تم ارسال الطلب الى البائع لتأكيد الطلب وشحن المنتج او رفض عرضكم من البائع<br>
                        الرجاء انتظر لحين وصول رسالة تفيدكم بحالة طلبكم.
                    @else
                        تم استقبال طلبك، سنقوم بالتحقق من العميل بشأن التوصيل والرد عليك في أقرب وقت ممكن.
                    @endif
                @endif

                @if ($order->status === 2)
                    مبروك! نحن الآن على استعداد أن نقوم بشحن منتجك، قم باختيار احد خيارات الدفع المتاحة لتنفيذ
                    المهمة
                @endif
                <small class="block mt-3 text-indigo-400">
                    شكرا لكم ونسعى لخدمتكم
                </small>
            </h3>

            @if($order->status === 2)
                <payment-methods action="{{ url('orders', $order) }}">
                    <template v-slot:default="{form}">
                        <ul>
                            @foreach(json_decode($settings->value('payments.methods', json_encode([]))) as $method)
                                <li>
                                    <label class="inline-flex items-center">
                                        <input type="radio"
                                               class="form-radio"
                                               v-model="form.method"
                                               value="{{ $method }}"
                                        >
                                        <span class="mr-3">{{ trans('orders.fields.payments.' . $method) }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </template>
                </payment-methods>
            @endif
        </div>

        <x-summary :order="$order"></x-summary>
    </div>
</x-page>
