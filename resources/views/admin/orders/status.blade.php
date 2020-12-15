{!! Form::open([
    'route' => ['microboard.orders.change-status', $id]
]) !!}
<div class="btn-group">
    <button type="button"
            class="btn btn-sm btn-{{ \App\Order::$statusesColor[$status] }} dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        @lang('orders.fields.status.' . \App\Order::$statuses[$status])
    </button>

    <div class="dropdown-menu">
        @foreach(array_map(function($status) {
                        return trans('orders.fields.status.' . $status);
                    }, \App\Order::$statuses) as $code => $_status)
            <button class="dropdown-item change-order-status"
                    data-value="{{ $code }}"
                    style="font-size: 12px;"
            >{{ $_status }}</button>
        @endforeach
    </div>
</div>
{!! Form::close() !!}
