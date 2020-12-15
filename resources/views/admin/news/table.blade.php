<div class="row">
    <div class="col">
        <div class="card">
            <div class="dropzone dropzone-single dz-clickable dz-max-files-reached">
                <div class="dz-preview dz-preview-single">
                    <div class="dz-preview-cover dz-complete dz-image-preview">
                        <img class="dz-preview-img" src="{{ $news->getFirstMediaUrl('image') }}">
                    </div>
                </div>
                <div style="padding: 7rem 1rem;"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th>@lang('news.fields.title')</th>
                        <td>{{ $news->title }}</td>
                    </tr>

                    <tr>
                        <th>@lang('news.fields.author')</th>
                        <td>{{ $news->author }}</td>
                    </tr>

                    <tr>
                        <th>@lang('news.fields.body')</th>
                        <td>{!! nl2br($news->body) !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
