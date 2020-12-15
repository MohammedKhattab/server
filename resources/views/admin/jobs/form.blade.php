<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body mb--4">
                {!! Form::argonInput('name', 'text', $job->name, [
                    'title' => trans('jobs.fields.name')
                ]) !!}

                {!! Form::argonInput('phone', 'text', $job->phone, [
                    'title' => trans('jobs.fields.phone')
                ]) !!}

                {!! Form::argonInput('city', 'text', $job->city, [
                    'title' => trans('jobs.fields.city')
                ]) !!}

                {!! Form::argonInput('has_a_car', 'text', $job->has_a_car, [
                    'title' => trans('jobs.fields.has_a_car')
                ]) !!}
</div>
        </div>
    </div>
</div>
