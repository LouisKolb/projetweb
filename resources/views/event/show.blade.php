@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Évenement</h2>
            </div>
        </div>
    </div>
</div>

<br> {{-- Single event header with user profile and name of the event --}}
<section>
    <div class="row valign-wrapper">
        <div class="col s1 offset-s1">
            <img class="circle responsive-img profile-pic" src="/image/simon.jpg">
        </div>
        <div class="col s2">
            <p>Nom prénom</p>
        </div>

        <div class="col s7">
            <h4>Nom Évenement</h4>
        </div>
    </div>
    <hr class="divider"> {{-- Description of the event --}}
    <div class="row">
        <div class="col s10 offset-s1">
            <p>This is a description of an event : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse
                lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.</p>
        </div>
    </div>
    <div class="row">
        <div class="col s4 offset-s4 center-align">
            <div class="carousel carousel-slider">
                <a class="carousel-item event-pic"><img src="/image/event.jpg"></a>
                <a class="carousel-item event-pic"><img src="https://lorempixel.com/800/400/food/2"></a>
                <a class="carousel-item event-pic"><img src="https://lorempixel.com/800/400/food/3"></a>
                <a class="carousel-item event-pic"><img src="https://lorempixel.com/800/400/food/4"></a>
            </div>
        </div>
    </div>
</section>


{{-- Comment section --}}
<section>
    {{-- One comment --}}
    <div class="row">
        <div class="event-comment">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s1">
                        <img src="/image/simon.jpg" class="circle responsive-img">
                    </div>
                    <div class="col s11">
                        <div class="s12 left">
                            <div class="col s11">
                                <div class="s12 left">
                                    <p>Prénom Nom</p>
                                </div>
                                <div class="s12 left">
                                    This is a comment : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
 
@section('scripts')
<script>
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

</script>
@endsection