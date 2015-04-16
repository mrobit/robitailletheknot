@extends('layouts.application')

@section('content')
    <section class="details container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="details__header text-center">
                    Where and when?
                </h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="details__column col-sm-6">
                <h2>
                    Ceremony
                </h2>

                <p>
                    2:00PM
                </p>

                <p>
                    <strong>Sacred Heart Church</strong> <br/>
                    12 Summer St. <br/>
                    Hallowell, ME
                </p>
            </div>
            <div class="details__column col-sm-6">
                <h2>
                    Reception
                </h2>

                <p>
                    4:00PM
                </p>

                <p>
                    <strong>Trott Farm</strong> <br/>
                    98 Trott Rd.<br/>
                    Richmond, ME
                </p>
            </div>
        </div>
    </section>
@stop