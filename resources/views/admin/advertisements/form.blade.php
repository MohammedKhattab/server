<div class="row">
    <div class="col">
        <div class="card">
            {!! Form::avatar($advertisement->getMedia('image'), [
                'title' => trans('advertisements.fields.image')
            ]) !!}
            <div class="card-body mb--4">
                {!! Form::argonInput('url', 'text', $advertisement->url, [
                    'title' => trans('advertisements.fields.url')
                ]) !!}

                {!! Form::argonInput('started_at', 'date', optional($advertisement->started_at)->format('Y-m-d'), [
                    'title' => trans('advertisements.fields.started_at')
                ]) !!}

                {!! Form::argonInput('expired_at', 'date', optional($advertisement->expired_at)->format('Y-m-d'), [
                    'title' => trans('advertisements.fields.expired_at')
                ]) !!}
            </div>
        </div>
    </div>
</div>
