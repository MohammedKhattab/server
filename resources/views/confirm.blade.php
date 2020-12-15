<x-page page-name="إتمام العملية" :centered="false">
    <div class="flex flex-col-reverse md:flex-row">
        <div class="flex-1 md:px-8 md:-mt-8">
            <h3 class="text-indigo-500 mb-12">
                @if(!$order->is_for_client)
                    قام أحد عملائنا باضافة طلب بأن منتج من نوع {{ $order->product_type }} لديكم،
                    ويود شحنه من خلالنا.
                    لذلك وجب تنبيهكم والاستعلام عن حالة المنتج لديكم
                @else
                    بنكلم العميل
                @endif

                <small class="block mt-3 text-indigo-400">
                    شكرا لكم ونسعى لخدمتكم
                </small>
            </h3>

            <form action="{{ url("orders/{$order->id}") }}" method="post">
                @csrf
                @method('PUT')
                <ul>
                    <li>
                        <label class="inline-flex items-center @error('confirm') text-red-500 @enderror">
                            <input type="radio"
                                   class="form-radio"
                                   name="confirm"
                                   value="1"
                            >
                            <span class="mr-3">نعم، سأقوم بتوفير الطلب وقت وصولكم.</span>
                        </label>
                    </li>
                    <li>
                        <label class="inline-flex items-center @error('confirm') text-red-500 @enderror">
                            <input type="radio"
                                   class="form-radio"
                                   name="confirm"
                                   value="0"
                            >
                            <span class="mr-3">لا، لا استطيع توفير الطلب في الوقت الحالي.</span>
                        </label>
                    </li>
                    @error('confirm')
                    <li class="text-red-700 text-sm pr-8">
                        {{ $message }}
                    </li>
                    @enderror
                </ul>

                <div class="mt-12 w-6/12 md:w-4/12 mr-auto text-center">
                    <button
                        type="submit"
                        class="bg-indigo-500 block focus:outline-none focus:shadow-outline hover:bg-indigo-400 rounded w-full font-bold py-2 shadow text-center text-white"
                    >
                        ارســال
                    </button>
                </div>
            </form>
        </div>

        <x-summary :order="$order" :without-sensitive-details="true"></x-summary>
    </div>
</x-page>
