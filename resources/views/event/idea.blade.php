@extends('layout.master') 
@section('content')

<!-- Parallax pic with border -->
<div class="parallax-container center valign-wrapper border-down">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Boite a idée</h2>
            </div>
        </div>
    </div>
</div>


<section>
    <div class="row">
        @foreach ($events as $event)
        <div class="row card">
            <div class="col l7 m12 s12 card-content">
                <div class="row">
                    <p>Le : {{ $event->date }}
                    </p>
                    <h5 class="center-align">{{ $event->name }}</h5>
                </div>
                <hr class="divider hide-on-large-only">
                <div class="row hide-on-large-only carousel-all-event">
                    <div class="carousel carousel-slider">
                        @foreach (App\event::find($event->id)->pictures as $picture)
                        <div class="event-pic center-align">
                            <a class="carousel-item" style="background-color:" href="/picture/{{$picture->id}}"><img src="/storage/{{$picture->link}}"></a>
                        </div> @endforeach
                    </div>
                </div>
                <hr class="divider">
                <div class="row">
                    <p> {{ $event->description }} </p>
                </div>
                <div id="event-idea-footer" class="row">
                    <div id="user-card" class="col l3 m2 s12">
                        <div class="col l12 m12 s12 user-info">
                            <p class="user-info"> Proposer par : {{App\user::find($event->user_id)->first_name}}
                            </p>
                            <p class="user-info">{{App\user::find($event->user_id)->last_name }}
                            </p>


                        </div>

                    </div>
                    <div class="col l9 m10 s12">

                        <a class="waves-effect waves-dark btn btn-event" href="/event/{{$event->id}}">👁️</a> @if(session()->has('user'))
                        <form class="waves-effect waves-dark btn btn-event" action="/event/{{$event->id}}/vote" method="post">
                            @csrf @if (App\user::find(session()->get('user')[0])->hasVotedForevent($event->id))
                            <input type="submit" class="black-text" value="👎🏻{{$event->voteCount()}}"> @else
                            <input type="submit" class="black-text" value="👍🏻{{$event->voteCount()}}"> @endif


                        </form>
                        @if(App\user::find($event->user_id)->hasRole('Admin'))
                        <a class="waves-effect waves-dark btn btn-event" href="/event/{{$event->id}}/edit"> ✏️</a> @endif
                        @endif

                    </div>
                </div>
            </div>
            <div class="col l5 hide-on-med-and-down carousel-all-event">
                <div id ="carousel-pc" class="carousel carousel-slider">
                    @foreach (App\event::find($event->id)->pictures as $picture)
                    <div class="event-pic-idea center-align">
                        <a class="carousel-item" style="background-color:" href="/picture/{{$picture->id}}"><img src="/storage/{{$picture->link}}"></a>
                    </div> @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>

</section>
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