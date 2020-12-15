<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th>@lang('orders.fields.id')</th>
                        <td>{!! $order->id !!}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%">@lang('orders.fields.title')</th>
                        <td>{!! $order->title !!}</td>
                    </tr>
                    <tr>
                        <th>@lang('orders.fields.is_for_client')</th>
                        <td>{{ $order->is_for_client ? 'نعم' : 'لا' }}</td>
                    </tr>

                    <tr>
                        <th>@lang('orders.fields.city')</th>
                        <td>{{ $order->city }}</td>
                    </tr>

                    <tr>
                        <th>@lang('orders.fields.target_city')</th>
                        <td>{{ $order->target_city }}</td>
                    </tr>

                    @if ($order->is_for_client)
                        <tr>
                            <th>@lang('orders.fields.target_name')</th>
                            <td>{{ $order->target_name }}</td>
                        </tr>
                    @endif

                    <tr>
                        <th>@lang('orders.fields.target_phone')</th>
                        <td>{{ $order->target_phone }}</td>
                    </tr>

                    @unless ($order->is_for_client)
                        <tr>
                            <th>@lang('orders.fields.target_references')</th>
                            <td>{{ $order->target_references }}</td>
                        </tr>
                    @endunless

                    <tr>
                        <th>@lang('orders.fields.product_type')</th>
                        <td>{{ $order->product_type }}</td>
                    </tr>

                    <tr>
                        <th>@lang('orders.fields.product_price')</th>
                        <td>{{ $order->readableProductPrice() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th style="width: 20%">@lang('orders.fields.status.title')</th>
                        <td>{!! $order->statusBadge !!}</td>
                    </tr>

                    @unless($order->paid_at === null)
                        <tr>
                            <th>@lang('orders.fields.paid_at')</th>
                            <td>{{ $order->paid_at->format('d/m/Y h:i') }}</td>
                        </tr>
                        <tr>
                            <th>@lang('orders.fields.payment_method')</th>
                            <td>{{ trans('orders.fields.payments.' . $order->payment_method) }}</td>
                        </tr>
                    @endunless

                    <tr>
                        <th>@lang('orders.fields.amount')</th>
                        <td>
                            {{ $order->readableAmount() }}
                        </td>
                    </tr>
                    <tr>
                        <th>@lang('orders.fields.total')</th>
                        <td>
                            {{ $order->readableTotal() }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
