<h1>Messages</h1>

<ul>
    @if(count($messages) > 0)
        @foreach($messages as $message)
            <li>{{ $message->name }}</li>
            <li>{{ $message->email }}</li>
            <li>{{ $message->message }}</li>
            <br>
        @endforeach
    @endif
</ul>