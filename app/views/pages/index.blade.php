<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robitaille the Knot</title>
    <link rel="stylesheet" href="/css/main.css" />
</head>
<body>


@if($feed)
    @foreach($feed as $f)
        <img src="<?php echo $f['images']['standard_resolution']['url']; ?>" alt="" />
    @endforeach
@endif

</body>
</html>