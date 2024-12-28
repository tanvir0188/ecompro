<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
</head>
<body>
    Hello from admin
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <input type="submit" value="Logut">
    </form>
</body>
</html>