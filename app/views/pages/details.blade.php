@extends('layouts.application')

@section('content')
    <section class="details container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="details__header section-header">
                    Where and when?
                </h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="details__column col-sm-6">
                    <h2 class="details__column__header section-header --small ">
                        <strong>
                            Ceremony &ndash;
                        </strong>

                        <span class="details__column__time">
                            2:00PM
                        </span>
                    </h2>

                    <p>
                        Sacred Heart Church <br/>
                        12 Summer St. <br/>
                        Hallowell, ME
                    </p>
                </div>
                <div class="details__column col-sm-6">
                    <h2 class="details__column__header section-header --small ">
                        <strong>
                            Reception &ndash;
                        </strong>

                        <span class="details__column__time">
                            4:00PM
                        </span>
                    </h2>

                    <p>
                        Trott Farm <br/>
                        98 Trott Rd.<br/>
                        Richmond, ME
                    </p>
                </div>
            </div>
        </div>
    </section>
@stop