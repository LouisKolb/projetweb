@php 
    $connected = false; 
    if(session()->has('user')){ 
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
} 
@endphp

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
<div class="row center-align">
    <div class="col s12 left-align btncatefor">
        @if($connected && $user->hasRole('admin'))
            <a class="waves-effect btn margin-top-button" href="/forum/category-create">
                Créer une catégorie
            </a>
        @endif
            <a class="waves-effect btn margin-top-button" href="/forum/question-create">
                Ajouter un sujet
            </a>
    </div>
</div>

<section>

              <div class="row center-align">
               @foreach ($category_forums as $category_forum)
                    <div class="col s12 left-align ">
                      <h3>{{$category_forum->name}}</h3>
                    </div>
                    <?php $today = date('Y-m-d'); $maxevent = 0; ?>
                    @foreach ($events as $event)
                    @if($event->statut == 1)
                    @if($event->date >= $today)
                    @if($maxevent < 2)
                      <div class="card-parnel hoverable col l5 m12 s12 " >
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
                @endforeach
            </div>

                  
                



    </section>
        
@endsection
 
@section('scripts')
@endsection