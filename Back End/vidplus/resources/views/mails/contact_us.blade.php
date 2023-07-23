<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #F6F8F9; padding:50px;font-family: Arial, Helvetica, sans-serif">

    <div style="background: #fff; border: 1px solid #eee;padding:20px;width:600px;margin: 0 auto">
        <h3>Dear Admin</h3>
        <p>There is a new messsage with the following data:</p>
        <p><b>Name:</b> {{ $data['name'] }}</p>
        <p><b>Email:</b> {{ $data['email'] }}</p>
        <p><b>Subject:</b> {{ $data['subject'] }}</p>
        <p><b>Message:</b> {{ $data['message'] }}</p>
        <p>Attach the cv file</p>
        <br>
        <p>Best Regard</p>
    </div>

</body>
</html>
