@extends('layout.master')
@section('content')
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

          <p>
            @foreach ($events as $event)
            <?php $today = date('Y-m-d'); ?>
            @if($event->date >= $today)
              <section>
                  <div class="row">
                      <div class="col s12">
                          <!-- User who created the event profile-->
                          <div class="card-panel grey lighten-5 z-depth-1">
                              <div class="row">
                                  <div class="col s12 m6">
                                      <div class="row valign-wrapper">
                                          <div class="col s2 m2 l1">
                                              <a class="black-text" >
                                                  <img class="circle responsive-img profile-pic" src="{{App\user::find($event->user_id)->avatar}}">
                                              </a>
                                          </div>
                                          <div class="col s3 m3 l3">
                                              <a class="black-text">
                                                  {{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name }}
                                              </a>
                                          </div>
                                          <div class="col s7 m7 l6">
                                              <a class="black-text" >
                                                  <h5>{{ $event->name }}</h5>
                                              </a>
                                          </div>
                                          <div class="col l2 right">
                                            {{ $event->date }}
                                          </div>
                                      </div>
                                      <hr class="divider">
                                      <!-- Event Description -->
                                      <div class="col m12">
                                          <a class="black-text" >
                                              {{ $event->description }}
                                          </a>
                                      </div>

                                      <!-- Last comment on event display only on pc-->
                                      <div class="col m12">
                                          <div class=" card-panel grey lighten-5 z-depth-1 hide-on-med-and-down">
                                              <div class="row">
                                                  <div class="col s1">
                                                      <a class="black-text" >
                                                          <img src="{{App\user::find($event->user_id)->avatar}}" alt="" class="circle responsive-img">
                                                      </a>
                                                  </div>
                                                  <div class="col s11">
                                                      <div class="s12 left comment">
                                                        <div class="col s11">
                                                            <div class="s12 left">
                                                                <a class="black-text" >
                                                                    <p>Prénom Nom</p>
                                                                </a>
                                                            </div>
                                                            <div class="s12 left comment">
                                                                This is a comment : Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                                dolor sit amet, consectetur
                                                                adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                                dolor sit amet, consectetur
                                                                adipiscing elit. Sed non risus. Suspendisse lectus.
                                                            </div>
                                                        </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col s12 right-align">
                                          <a class="waves-effect waves-dark btn btn-event" href="/event/{{$event}}"><i class="fas fa-align-right right"></i>
                                            Voir la publication
                                          </a>

                                      </div>
                                  </div>
                                  <!-- Event's pic in a carousel slider for beautyness -->
                                  <div class="col m6 s12">
                                      <div class="carousel carousel-slider">
                                         {{--@foreach ($pictures as $picture)
                                           <a class="carousel-item event-pic"><img src="{{$picture->url}}"></a>
                                         @endforeach--}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            @break
            @endif
            @endforeach
        </p>

        <!-- Parallax pic with border -->
        <div class="parallax-container center valign-wrapper blueborders">
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


        <!-- Event finished -->
        <section>
            @foreach ($events as $event)
            @if($event->date >= $today)
            <div class="row">
                <div class="col s12">
                    <!-- User who created the event profile-->
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="row valign-wrapper">
                                    <div class="col s2 m2 l1">
                                        <a class="black-text" >
                                            <img class="circle responsive-img profile-pic" src="{{App\user::find($event->user_id)->avatar}}">
                                        </a>
                                    </div>
                                    <div class="col s3 m3 l3">
                                        <a class="black-text" >
                                            {{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name }}
                                        </a>
                                    </div>
                                    <div class="col s7 m7 l6">
                                        <a class="black-text" >
                                            <h5>{{ $event->name }}</h5>
                                        </a>
                                    </div>
                                    <div class="col l2 right">
                                      {{ $event->date }}
                                    </div>
                                </div>
                                <hr class="divider">
                                <!-- Event Description -->
                                <div class="col m12">
                                    <a class="black-text" >
                                        {{ $event->description }}
                                    </a>
                                </div>

                                <!-- Last comment on event display only on pc-->
                                <div class="col m12">
                                    <div class=" card-panel grey lighten-5 z-depth-1 hide-on-med-and-down">
                                        <div class="row">
                                            <div class="col s1">
                                                <a class="black-text" >
                                                    <img src="{{App\user::find($event->user_id)->avatar}}" alt="" class="circle responsive-img">
                                                </a>
                                            </div>
                                            <div class="col s11">
                                                <div class="s12 left comment">
                                                  <div class="col s11">
                                                      <div class="s12 left">
                                                          <a class="black-text" >
                                                              <p>Prénom Nom</p>
                                                          </a>
                                                      </div>
                                                      <div class="s12 left comment">
                                                          This is a comment : Lorem ipsum dolor sit amet, consectetur
                                                          adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                          dolor sit amet, consectetur
                                                          adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                          dolor sit amet, consectetur
                                                          adipiscing elit. Sed non risus. Suspendisse lectus.
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 right-align">
                                    <a class="waves-effect waves-dark btn btn-event" href="/event/{{$event}}"><i class="fas fa-align-right right"></i>
                                      Voir la publication
                                    </a>

                                </div>
                            </div>
                            <!-- Event's pic in a carousel slider for beautyness -->
                            <div class="col m6 s12">
                                <div class="carousel carousel-slider">
                                   {{--@foreach ($pictures as $picture)
                                     <a class="carousel-item event-pic"><img src="{{$picture->url}}"></a>
                                   @endforeach--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </section>


    <!-- Parallax pic with border -->
    <div class="parallax-container center valign-wrapper blueborders">
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
    <section>
        @foreach ($events as $event)
        @if($event->date < $today)
        <div class="row">
            <div class="col s12">
                <!-- User who created the event profile-->
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="row valign-wrapper">
                                <div class="col s2 m2 l1">
                                    <a class="black-text" >
                                        <img class="circle responsive-img profile-pic" src="{{App\user::find($event->user_id)->avatar}}">
                                    </a>
                                </div>
                                <div class="col s3 m3 l3">
                                    <a class="black-text" >
                                        {{App\user::find($event->user_id)->first_name}} {{App\user::find($event->user_id)->last_name }}
                                    </a>
                                </div>
                                <div class="col s7 m7 l6">
                                    <a class="black-text" >
                                        <h5>{{ $event->name }}</h5>
                                    </a>
                                </div>
                                <div class="col l2 right">
                                  {{ $event->date }}
                                </div>
                            </div>
                            <hr class="divider">
                            <!-- Event Description -->
                            <div class="col m12">
                                <a class="black-text" >
                                    {{ $event->description }}
                                </a>
                            </div>

                            <!-- Last comment on event display only on pc-->
                            <div class="col m12">
                                <div class=" card-panel grey lighten-5 z-depth-1 hide-on-med-and-down">
                                    <div class="row">
                                        <div class="col s1">
                                            <a class="black-text" >
                                                <img src="{{App\user::find($event->user_id)->avatar}}" alt="" class="circle responsive-img">
                                            </a>
                                        </div>
                                        <div class="col s11">
                                            <div class="s12 left comment">
                                              <div class="col s11">
                                                  <div class="s12 left">
                                                      <a class="black-text" >
                                                          <p>Prénom Nom</p>
                                                      </a>
                                                  </div>
                                                  <div class="s12 left comment">
                                                      This is a comment : Lorem ipsum dolor sit amet, consectetur
                                                      adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                      dolor sit amet, consectetur
                                                      adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                                                      dolor sit amet, consectetur
                                                      adipiscing elit. Sed non risus. Suspendisse lectus.
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 right-align">
                                <a class="waves-effect waves-dark btn btn-event" href="/event/{{$event}}"><i class="fas fa-align-right right"></i>
                                  Voir la publication
                                </a>

                            </div>
                        </div>
                        <!-- Event's pic in a carousel slider for beautyness -->
                        <div class="col m6 s12">
                            <div class="carousel carousel-slider">
                               {{--@foreach ($pictures as $picture)
                                 <a class="carousel-item event-pic"><img src="{{$picture->url}}"></a>
                               @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
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
