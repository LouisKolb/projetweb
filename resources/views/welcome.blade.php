@extends('layout.master')
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
        <div class="parallax"><img src="/image/background.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h2>Bienvenue sur le site du BDE</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Next 2 events sections --}}
    <section>
              <div class="row center-align">
                  <div class="col s12 center-align ">
                      <h3>Prochains événements</h3>
                  </div>
                  <?php $today = date('Y-m-d'); $maxevent = 0; ?>
                  <div class="col l1">

                  </div>
                  {{-- Look for events in DB --}}
                  @foreach ($events as $event)
                    @if($event->statut == 1)
                    @if($event->date >= $today)
                    @if($maxevent < 2)
                      <div class="card-parnel hoverable col l5 m12 s12 ">
                          <h5>{{ $event->name }}</h5>
                          <p>{{ $event->description }}</p>
                          <hr class="divider">
                          <div class="col s4 center-align">
                              <a class="waves-effect btn" href="/event/{{$event->id}}">
                                Voir l'évènement
                              </a>
                          </div>
                    </div>
                    <?php $maxevent++; ?>
                    @endif
                    @endif
                  @endif
                @endforeach
                </div>

    </section>

    {{-- 5 most sold article in a carousel--}}
    <section>
        <div class="parallax-container center valign-wrapper blueborders">
            <div class="parallax"><img src="./image/background.jpg">
            </div>
            <div class="container white-text">
                <div class="row">
                    <div class="col s12">
                        <h3>Article les plus vendus</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col s12 carousel-welcome">
                <div class="carousel center-align" data-indicators="true">
                    <a href="#one!" class="carousel-item">
                        <img class="resize" src="./image/pull.jpg">
                        <div>
                            <p class="top-article">Nom top article 1</p>
                        </div>
                    </a>
                    <a href="#two!" class="carousel-item">
                        <img class="resize" src="./image/pull.png">
                        <div>
                            <p class="top-article">Nom top article 2</p>
                        </div>
                    </a>
                    <a href="#three!" class="carousel-item">
                        <img class="resize" src="./image/huete.png">
                        <div>
                            <p class="top-article">Nom top article 3</p>
                        </div>
                    </a>
                    <a href="#four!" class="carousel-item">
                        <img class="resize" src="./image/dorito.png">
                        <div>
                            <p class="top-article">Nom top article 4</p>
                        </div>
                    </a>
                    <a href="#five!" class="carousel-item">
                        <img class="resize" src="./image/article.png">
                        <div>
                            <p class="top-article">Nom top article 5</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m3 offset-m2 s6 center-align">
                <div class="btn-flat prev"><i class="material-icons">chevron_left</i></div>
            </div>
            <div class="col m2">

            </div>
            <div class="col m3 s6 center-align">
                <div class="btn-flat next"><i class="material-icons">chevron_right</i></div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('.carousel').carousel({
        shift: 500,
        numVisible: 3
    });

    // function for next slide
    $('.next').click(function () {
        $('.carousel').carousel('next');
    });

    // function for prev slide
    $('.prev').click(function () {
        $('.carousel').carousel('prev');
    });
});
</script>

@endsection
