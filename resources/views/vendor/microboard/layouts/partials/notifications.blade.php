@php
    $unread = auth()->user()->unreadNotifications()->count()
@endphp

<li class="nav-item dropdown">
    <a class="nav-link read-notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <i class="ni ni-bell-55"></i>
        @if($unread)
            <span
                class="notifications-count-badge badge badge-md badge-circle badge-floating badge-danger border-white">
            {{ $unread }}
        </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
        <!-- Dropdown header -->
        <div class="px-3 py-3">
            <h6 class="text-sm text-muted m-0">
                @lang('microboard::pages.layout.notifications.count', ['count' => $unread])
            </h6>
        </div>
        <!-- List group -->
        <div class="list-group list-group-flush">
            @foreach(auth()->user()->notifications as $notification)
                @if ($notification->type === \App\Notifications\NewPaymentReceived::class)
                    <a href="{{ route('microboard.orders.show', $notification->data['order']) }}"
                       class="list-group-item list-group-item-action{{ $notification->unread() ? ' list-group-item-primary' : '' }}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0 text-sm">
                                    @if ($notification->type === \App\Notifications\NewOrderNotification::class)
                                        هناك طلب جديد #{{ $notification->data['order'] }}
                                    @elseif($notification->type === \App\Notifications\NewPaymentReceived::class)
                                        تم تسجيل تعليم الطلب #{{ $notification->data['order'] }} كمدفوع
                                    @endif
                                </h4>
                            </div>
                            <div class="text-right text-muted">
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</li>

@push('scripts')
    @if($unread)
        <script>
            $('.read-notifications').on('click', function () {
                $.ajax({
                    url: '{{ url('api/microboard/read_admin_notifications', auth()->id()) }}',
                    method: 'POST',
                    success: function () {
                        $('.notifications-count-badge').remove();
                    }
                });
            });

        </script>
    @endif
@endpush
