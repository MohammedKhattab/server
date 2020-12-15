<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th>@lang('jobs.fields.name')</th>
                        <td>{{ $job->name }}</td>
                    </tr>

                    <tr>
                        <th>@lang('jobs.fields.phone')</th>
                        <td>{{ $job->phone }}</td>
                    </tr>

                    <tr>
                        <th>@lang('jobs.fields.city')</th>
                        <td>{{ $job->city }}</td>
                    </tr>

                    <tr>
                        @php
                            $label = 'نعم';
                            $colors = 'badge-dark text-white';

                            if (!$job->has_a_car) {
                                $label = 'لا';
                                $colors = 'badge-primary';
                            }
                        @endphp
                        <th>@lang('jobs.fields.has_a_car')</th>
                        <td><span class='badge {{ $colors }}'>{{ $label }}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
