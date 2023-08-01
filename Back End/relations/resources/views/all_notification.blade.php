<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <div class="list-group">
            @foreach ($user->notifications as $notify)
            <a onclick="read_notify(event)" data-link="{{ route('read_notification', $notify->id) }}" class="list-group-item list-group-item-action {{ $notify->read_at ? '' : 'bg-light' }}" aria-current="true">
                {{ $notify->data['msg']??'dd' }}
              </a>
            @endforeach
          </div>
    </div>

    <script>
        function read_notify(e) {
            e.preventDefault();

            // let link = e.target.getAttribute('data-link');
            let link = e.target.dataset.link

            // console.log(link);

            fetch(link)
            .then((res) => {
                return res.json()
            })
            .then((res) => {
                if(res.msg == 'Done') {
                    e.target.classList.remove('bg-light')
                }
            }).catch((err) => {

            });
        }
    </script>
    <script>
        var userId = '1'
    </script>
    @vite('resources/js/app.js')
</body>
</html>
