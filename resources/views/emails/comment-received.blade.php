<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>

    <body>
        <div>

            {{ $commentAuthor }} has commented
            <blockquote class="text-muted">
                <em>{{ $comment}}</em>
            </blockquote>
            on your team "{{ $teamName }}".

            <br>
            <a class="btn btn-danger" href="localhost:8000/teams/{{ $teamId }}">View full page</button>
        </div>
    </body>
</html>
