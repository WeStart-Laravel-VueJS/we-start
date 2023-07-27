<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-body .card-title,
        .card-body .card-text {
            height: 48px;
            overflow: hidden;
        }
    </style>
  </head>
  <body>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $post->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ Str::words($post->content, 10, '...') }}</p>
                      <a href="{{ route('post', $post) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            @endforeach

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
