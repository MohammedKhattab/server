<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body mb--4">
                {!! Form::argonInput('title', 'text', $page->title, [
                    'title' => trans('pages.fields.title')
                ]) !!}

                {!! Form::argonInput('slug', 'text', $page->slug, [
                    'title' => trans('pages.fields.slug')
                ]) !!}

                {!! Form::trix('body', $page->body, [
                    'title' => trans('pages.fields.body')
                ]) !!}
            </div>
        </div>
    </div>
</div>
