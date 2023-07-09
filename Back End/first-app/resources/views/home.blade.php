<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
    </tr>

    @foreach($posts as $post)
        <tr {{ $loop->odd ? "style=background:#f00" : '' }} >
            <td>
                @dump($loop)
                {{ $post['id'] }}</td>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['content'] }}</td>
        </tr>
    @endforeach

    </table>
</body>
</html>
