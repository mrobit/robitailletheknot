<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robitaille the Knot</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/main.min.css"/>

    @include('layouts.partials.analytics')
</head>
<body>

@include('layouts.partials.nav')

<div id="wrap">

@if($feed)
    @foreach($feed as $f)
        <div class="item item-{{ $f->type }}">
            <img src="{{ $f->url }}" alt=""/>

            @unless ($f->comments === false)
                <div class="item-instagram__comments">
                    @foreach( $f->comments  as $comment)
                        <div class="comment">
                            <div class="comment__date">
                                {{ $comment['date'] }}
                            </div>
                            <div class="comment__name">
                                <strong>{{ $comment['name'] }}</strong>
                                ({{ $comment['username'] }})
                            </div>
                            <div class="comment__content">
                                {{ $comment['text'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endunless
        </div>
    @endforeach
@endif

</div>
</body>
</html>