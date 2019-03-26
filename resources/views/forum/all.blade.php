@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg" alt="background picture">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Forum</h2>
            </div>
        </div>
    </div>
</div>

<section>
              <div class="row center-align">
                  <div class="col s12 left-align ">
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

                <div class="row center-align">
                  <div class="col s12 left-align ">
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
        
@endsection
 
@section('scripts')
@endsection