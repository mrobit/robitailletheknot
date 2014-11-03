<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robitaille the Knot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>


@if($feed)
    @foreach($feed as $f)
        <img src="{{ $f->url }}" alt=""/>
    @endforeach
@endif

</body>
</html>