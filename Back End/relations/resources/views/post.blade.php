<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container my-5 text-center">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->image }}" alt="">

        <div class="mt-5">
            {{ $post->content }}
        </div>

        <hr>

        @foreach($post->images as $img)
        <img src="{{ asset($img->path) }}" alt="">
        @endforeach
        <hr>

        <div class="commentns">
            <h3>All Comments ({{ $post->comments_count }})</h3>

            <div class="w-75 mx-auto text-start">
                @foreach ($post->comments as $comment)
                    <div class="d-flex">
                        <img width="40" height="40" class="rounded-circle" src="https://ui-avatars.com/api/?background=random&name={{ $comment->user->name }}" alt="">
                        <div class="mx-3">
                            <h5 class="mb-0">{{ $comment->user->name }}
                            </h5>
                            <small class="text-secondary" style="font-size: 12px">{{ $comment->created_at->diffForHumans() }}</small>
                            <p class="mt-2">{{ $comment->content }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach


                <h4>Add New Comment</h4>
                <form action="{{ route('post.comment', $post->id) }}" method="POST">
                    @csrf
                    <textarea placeholder="Comment here.." class="form-control mb-3" rows="4" name="content"></textarea>
                    <button class="btn btn-dark">Comment</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
