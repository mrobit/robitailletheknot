<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robitaille the Knot</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/main.min.css"/>
</head>
<body>


@if($feed)
    @foreach($feed as $f)
        <img src="{{ $f->url }}" alt=""/>
    @endforeach
@endif

</body>
</html>