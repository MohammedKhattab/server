<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body mb--4">
                {!! Form::argonSelect('status', array_map(function($status) {
                        return trans('orders.fields.status.' . $status);
                    }, \App\Order::$statuses), $order->status, [
                    'title' => trans('orders.fields.status.title')
                ]) !!}
            </div>
        </div>
    </div>
</div>
