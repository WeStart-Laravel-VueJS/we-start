<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Countries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
        <h3>All Countries</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Flag</th>
                <th>Meaning</th>
            </tr>

            @forelse ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td><img width="30" src="{{ $country->flag->path??'' }}" alt=""></td>
                    <td>{{ $country->flag->meaning??'' }}</td>
                </tr>
            @empty
                <tr>
                    <td>No Data Found</td>
                </tr>
            @endforelse
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
