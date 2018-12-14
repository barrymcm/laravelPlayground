{!! Form::open(['url' => '/message/create']) !!}

    <div>
        {{ Form::label('name') }}
        {{ Form::text('name', '', ['class' => 'form']) }}
    </div>

    <div>
        {{ Form::label('email') }}
        {{ Form::text('email', '', ['class' => 'form']) }}
    </div>

    <div>
        {{ Form::label('message') }}
        {{ Form::textArea('message', '', ['class' => 'form']) }}
    </div>
    <div>
        {{ Form::submit('submit') }}
    </div>

{!! Form::close() !!}
