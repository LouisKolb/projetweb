@extends('layout.master')
@section('content')
@php
$connected = false;
if(session()->has('user'))
{
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp
<!-- Social network bar -->
<!-- <div class="icon-bar">
        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
    </div> -->

<!-- Parralax image with border -->

<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Prochain événement</h2>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row center-align"> -->

@foreach ($events as $event)
<?php $today = date('Y-m-d'); ?> @if($event->date >= $today)
<section>
    <div class="col s12">
        <!-- User who created the event profile-->
        <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="row valign-wrapper">
                        <div class="col s3 m3 l1">
                            <a class="black-text" href="/user/{{$event->user_id}}">
                                            <img class="circle profile-pic" src="/image/simon.jpg">
                                        </a>
                        </div>
                        <div class="col s3 m3 l1 left-align">
                            <p>{{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name
                                }}
                            </p>
                        </div>
                        <div class="col s8 m8 l10 right-align">
                            <p>{{ $event->date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 center-align">
                            <a class="black-text">
                                <h5>{{ $event->name }}</h5>
                            </a>
                        </div>
                    </div>
                    <hr class="divider">
                    <!-- Event Description -->
                    <div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a class="black-text">
                                                {{ $event->description }}
                                            </a>
                            </div>


                            <div class="col s12 m12 l12 right-align ">
                                <a class="waves-effect waves-dark btn btn-event see" href="/event/{{$event->id}}"><i class="fas fa-eye right"></i>
                                        Voir l'évènement                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Event's pic in a carousel slider for beautyness -->
                <div class="col m12 s12 l6 carousel-all-event">
                    <div class="carousel carousel-slider">
                        @foreach (App\event::find($event->id)->pictures as $picture)
                        <div class="event-pic center-align">
                            <a class="carousel-item" style="background-color:" href="/picture/{{$picture->id}}"><img src="/storage/{{$picture->link}}"></a>                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@break @endif @endforeach

<!-- Parallax pic with border -->
<div class="parallax-container center valign-wrapper diviser blueborders">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Événements futurs</h2>
            </div>
        </div>
    </div>
</div>


<!-- Event futur -->
@foreach ($events as $event) @if($event->date >= $today)
<section>
    <div class="row">
        <div class="col s12">
            <!-- User who created the event profile-->
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="row valign-wrapper">
                            <div class="col s3 m3 l1">
                                <a class="black-text" href="/user/{{$event->user_id}}">
                                    <img class="circle profile-pic" src="/image/simon.jpg">
                                </a>
                            </div>
                            <div class="col s3 m3 l1 left-align">
                                <p>{{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name
                                    }}
                                </p>
                            </div>
                            <div class="col s8 m8 l10 right-align">
                                <p>{{ $event->date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 center-align">
                                <a class="black-text">
                                    <h5>{{ $event->name }}</h5>
                                </a>
                            </div>
                        </div>
                        <hr class="divider">
                        <!-- Event Description -->
                        <div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <a class="black-text">
                                        {{ $event->description }}
                                    </a>
                                </div>


                                <div class="col s12 m12 l12 right-align ">
                                    <a class="waves-effect waves-dark btn btn-event see" href="/event/{{$event->id}}"><i class="fas fa-eye right"></i>
                                Voir l'évènement                                </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Event's pic in a carousel slider for beautyness -->
                    <div class="col m12 s12 l6 carousel-all-event">
                        <div class="carousel carousel-slider ">
                            @foreach (App\event::find($event->id)->pictures as $picture)
                            <div class="event-pic center-align">
                                <a class="carousel-item" style="background-color:" href="/picture/{{$picture->id}}"><img src="/storage/{{$picture->link}}"></a>                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif @endforeach



<!-- Parallax pic with border -->
<div class="parallax-container center valign-wrapper diviser blueborders">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Événements passés</h2>
            </div>
        </div>
    </div>
</div>


<!-- Event finished -->
@foreach ($events as $event) @if($event->date
    < $today)
    <section>
     <div class="row">
        <div class="col s12">
            <!-- User who created the event profile-->
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="row valign-wrapper">
                            <div class="col s3 m3 l1">
                                <a class="black-text" href="/user/{{$event->user_id}}">
                                        <img class="circle profile-pic" src="/image/simon.jpg">
                                    </a>
                            </div>
                            <div class="col s3 m3 l1 left-align">
                                <p>{{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name
                                    }}
                                </p>
                            </div>
                            <div class="col s8 m8 l10 right-align">
                                <p>{{ $event->date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 center-align">
                                <a class="black-text">
                                    <h5>{{ $event->name }}</h5>
                                </a>
                            </div>
                        </div>
                        <hr class="divider">
                        <!-- Event Description -->
                        <div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <a class="black-text">
                                            {{ $event->description }}
                                        </a>
                                </div>


                                <div class="col s12 m12 l12 right-align ">
                                    <a class="waves-effect waves-dark btn btn-event see" href="/event/{{$event->id}}"><i class="fas fa-eye right"></i>
                                    Voir l'évènement                                </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Event's pic in a carousel slider for beautyness -->
                    <div class="col m12 s12 l6 carousel-all-event">
                        <div class="carousel carousel-slider">
                            @foreach (App\event::find($event->id)->pictures as $picture)
                            <div class="event-pic center-align">
                                <a class="carousel-item" style="background-color:" href="/picture/{{$picture->id}}"><img src="/storage/{{$picture->link}}"></a>                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
@endif @endforeach
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
        });

        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
        autoplay();
        function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 3000);
}

        $(document).ready(function () {
            $('.sidenav.right').sidenav({ edge: 'right', preventScrolling: false });

        });
        $(document).ready(function () {
            $('.sidenav.left').sidenav({ edge: 'left', preventScrolling: false });
        });

        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            coverTrigger: false
        });

</script>
@endsection
