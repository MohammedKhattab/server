@extends('microboard::layouts.app')

@section('title', trans('microboard::pages.index.title'))

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="surtitle">الطلبات</h6>
                    <h5 class="h3 mb-0">الطلبات لكل شهر</h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="orders" class="chart-canvas" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="surtitle">المستخدمين</h6>
                    <h5 class="h3 mb-0">عدد المستخدمين لكل شهر</h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="registered-users" class="chart-canvas" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <script>
        const orders = new Chartisan({
            el: '#orders',
            url: "@chart('order_per_month')",
            hooks: new ChartisanHooks()
                .colors(['#2dce89', '#fb6340'])
                .responsive()
                .datasets('line')
        });
        const users = new Chartisan({
            el: '#registered-users',
            url: "@chart('users_per_month')",
            hooks: new ChartisanHooks()
                .colors(['#5e72e4'])
                .responsive()
                .datasets('bar')
        });
    </script>
@endpush
