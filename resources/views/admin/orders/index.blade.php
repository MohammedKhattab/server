@extends('microboard::layouts.app', [
    'breadcrumbs' => [
        ['name' => trans("orders.resource")]
    ]
])

@section('title', trans("orders.resource"))

@section('actions')
    @can('create', new \App\Order())
        <a href="{{ route('microboard.orders.create') }}" class="btn btn-neutral">
            @lang("orders.create.title")
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class="col">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/microboard/vendor/datatables.net/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/microboard/vendor/datatables.net/buttons.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/microboard/vendor/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/microboard/vendor/datatables.net/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/microboard/vendor/datatables.net/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/microboard/vendor/datatables.net/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {!! $dataTable->scripts() !!}
    <script>
        $(document).on('click', '.change-order-status', function (e) {
            e.preventDefault();
            var target = $(e.target);
            var form = target.parents('form');
            var status = target.data('value');

            $.ajax({
                url: form.attr('action'),
                method: 'PATCH',
                data: {
                    "_token": "{{ csrf_token() }}",
                    status: status
                },
                success() {
                    window.LaravelDataTables['Order-table'].ajax.reload();
                }
            })
        });
    </script>
@endpush
