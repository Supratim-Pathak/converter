
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('jpgAction') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="file" name="main_file" id="main_file">
        <button type="submit">UPLOAD</button>
    </form>
</body>
</html>