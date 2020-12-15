<div class="row">
    <div class="col">
        <div class="card">
            <div class="dropzone dropzone-single dz-clickable dz-max-files-reached">
                <div class="dz-preview dz-preview-single">
                    <div class="dz-preview-cover dz-complete dz-image-preview">
                        <img class="dz-preview-img" src="{{ $advertisement->getFirstMediaUrl('image') }}">
                    </div>
                </div>
                <div style="padding: 7rem 1rem;"></div>
            </div>

            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th style="width: 25%;">@lang('advertisements.fields.url')</th>
                        <td>{{ $advertisement->url }}</td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('advertisements.fields.started_at')</th>
                        <td><time datetime="{{ $advertisement->started_at }}">{{ $advertisement->started_at->format('Y/m/d') }}</time></td>
                    </tr>
                    <tr>
                        <th style="width: 25%;">@lang('advertisements.fields.expired_at')</th>
                        <td><time datetime="{{ $advertisement->expired_at }}">{{ $advertisement->expired_at->format('Y/m/d') }}</time></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
