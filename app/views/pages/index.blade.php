@include('layouts.partials.head')
@include('layouts.partials.nav')

<div id="wrap">

@include('layouts.partials.header')

@if($feed)
    @foreach($feed as $f)
        <div class="item item-{{ $f->type }}">
            <div class="item-instagram__img-wrapper">
                <img src="{{ $f->url }}" alt=""/>
                <div class="caption">
                <div class="caption__inner">
                    {{ $f->caption }}
                </div>
                </div>
            </div>

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

@include('layouts.partials.footer')
@include('layouts.partials.scripts')
</div>
</body>
</html>