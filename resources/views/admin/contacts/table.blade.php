<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush">
                    <tbody>
                    <tr>
                        <th>@lang('contacts.fields.name')</th>
                        <td>{{ $contact->name }}</td>
                    </tr>

                    <tr>
                        <th>@lang('contacts.fields.email')</th>
                        <td>{{ $contact->email }}</td>
                    </tr>

                    <tr>
                        <th>@lang('contacts.fields.phone')</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>

                    <tr>
                        <th>@lang('contacts.fields.subject')</th>
                        <td>{{ $contact->subject }}</td>
                    </tr>

                    <tr>
                        <th>@lang('contacts.fields.message')</th>
                        <td>{!! nl2br($contact->message) !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
