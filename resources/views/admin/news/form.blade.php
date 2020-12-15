<div class="row">
    <div class="col">
        <div class="card">
            {!! Form::avatar($news->getMedia('image'), [
                'title' => trans('news.fields.image')
            ]) !!}yes
        </div>
    </div>
</div>
