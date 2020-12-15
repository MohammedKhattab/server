<div class="row flex-row-reverse flex-md-row">
    <div class="col-md-8">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th style="width: 25%;">@lang('microboard::users.fields.name')</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('microboard::users.fields.email')</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">رقم الهاتف</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('microboard::users.fields.role_id')</th>
                        @can('view', $user->role)
                            <td>
                                <a href="{{ route('microboard.roles.show', $user->role) }}">
                                    {{ $user->role->display_name }}
                                </a>
                            </td>
                        @else
                            <td>{{ $user->role->display_name }}</td>
                        @endcan
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('microboard::users.fields.created_at')</th>
                        <td>
                            <time datetime="{{ $user->created_at }}">{{ $user->created_at->format('d/m/Y') }}</time>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('microboard::users.fields.updated_at')</th>
                        <td>
                            <time datetime="{{ $user->updated_at }}">{{ $user->updated_at->diffForHumans() }}</time>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="dropzone dropzone-single dz-clickable dz-max-files-reached">
                <div class="dz-preview dz-preview-single">
                    <div class="dz-preview-cover dz-complete dz-image-preview">
                        <img class="dz-preview-img" src="{{ $user->avatar }}">
                    </div>
                </div>
                <div style="padding: 7rem 1rem;"></div>
            </div>
        </div>
    </div>
</div>

@if ($user->role_id === 1)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">@lang('microboard::users.fields.role_id')</h3>
                </div>

                @include('microboard::roles.permissions_table', ['role' => $user->role])
            </div>
        </div>
    </div>
@else

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">@lang('orders.resource')</h3>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>@lang('orders.fields.id')</th>
                            <th>@lang('orders.fields.city')</th>
                            <th>@lang('orders.fields.target_city')</th>
                            <th>@lang('orders.fields.status.title')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->target_city }}</td>
                                <td>{!! $order->statusBadge !!}</td>
                                <td>
                                    <a href="{{ route('microboard.orders.show', $order) }}">
                                        @lang('orders.view.action-button')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
