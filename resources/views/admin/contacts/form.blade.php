<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body mb--4">
                {!! Form::argonInput('name', 'text', $contact->name, [
                    'title' => trans('contacts.fields.name')
                ]) !!}

                {!! Form::argonInput('email', 'text', $contact->email, [
                    'title' => trans('contacts.fields.email')
                ]) !!}

                {!! Form::argonInput('phone', 'text', $contact->phone, [
                    'title' => trans('contacts.fields.phone')
                ]) !!}

                {!! Form::argonInput('subject', 'text', $contact->subject, [
                    'title' => trans('contacts.fields.subject')
                ]) !!}

                {!! Form::argonInput('message', 'text', $contact->message, [
                    'title' => trans('contacts.fields.message')
                ]) !!}
</div>
        </div>
    </div>
</div>
