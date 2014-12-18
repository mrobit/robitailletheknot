@include('layouts.partials.head')
@include('layouts.partials.nav')

<div id="wrap">

@include('layouts.partials.header')

<div class="container">
    <p class="hiw-section text-center">
        Add pictures to Instagram and tag them with <strong>#robitailletheknot,</strong> and they'll show up here!
    </p>
</div>

@if($feed)
    @foreach($feed as $f)

        <div id="item-{{ $f->id }}" class="item item-{{ $f->type }}">
            <a class="item__anchor" href="#item-{{ $f->id }}"></a>
            <div class="item__img-wrapper">

                {{ $f->tag }}

                <div class="caption">
                    <p>{{ $f->caption }}</p>
                    <div class="caption__date">
                        {{ $f->date }}
                    </div>
                </div>
            </div>

            @unless ($f->comments === false)
                <div class="item__comments">
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

@include('layouts.partials.registry')
@include('layouts.partials.footer')

</div>

@include('layouts.partials.scripts')

</body>
</html>