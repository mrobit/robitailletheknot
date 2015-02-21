@if ($errors && $errors->all())
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 alert alert-danger">
                <p><strong>There's a problem with your log in.</strong></p>
                <hr/>
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
