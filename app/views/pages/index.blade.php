<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robitaille the Knot</title>
    <style>
        body {
            font-family: 'helvetica neue', helvetica, arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>


@if($feed)
    @foreach($feed as $f)
        <img src="<?php echo $f['images']['standard_resolution']['url']; ?>" alt="" />
    @endforeach
@endif

</body>
</html>