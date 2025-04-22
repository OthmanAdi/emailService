<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nachrichtverlauf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Nachrichtverlauf</h2>
    <a href="/" class="btn btn-primary mb-4">Zuruck zum Formular</a>

    @if(count($messages) > 0)
        @foreach($messages as $index => $msg)
            <div class="card">
                <div class="card-header">
                    <strong> {{$msg['subject']}}</strong> ({{$msg['time']}})
                    <form action="{{route('message.delete', $index)}}" method="POST"> <!--style it as you like-->
                        @csrf
                        <button type="submit" class="btn"> Delete Email Copy</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <p><strong>VON:</strong> {{$msg['name']}} ({{$msg['email']}}) </p>
                <p><strong>Nachricht: </strong> {{$msg['message']}}</p>
            </div>
        @endforeach
    @else
    <div class="alert alert-info"> noch keine Nachrichten in der Session</div>
    @endif
</div>
</body>
</html>
