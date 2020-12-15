<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th>@lang('pages.fields.title')</th>
                        <td>{{ $page->title }}</td>
                    </tr>

                    <tr>
                        <th>@lang('pages.fields.slug')</th>
                        <td>{{ $page->slug }}</td>
                    </tr>

                    <tr>
                        <th>@lang('pages.fields.body')</th>
                        <td>{!! nl2br($page->body) !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
