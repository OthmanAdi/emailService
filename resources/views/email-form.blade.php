<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktformular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <a href="{{route('message.history')}}" class="btn btn-secondary mt-3 mb-3">Nachrichtverluaf anzeigen</a>
        
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Kontaktformular</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('message_sent'))
                        <div class="alert alert-success">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('send.email') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Betreff</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Nachricht</label>
                            <textarea name="message" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Senden</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
