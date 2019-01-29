@extends('layout.master')
@section('content')
<script src="/js/shuffle.js"></script>
@php
$connected = false; if(session()->has('user')){
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg" alt="Parallax brackground">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Galerie</h2>
            </div>
        </div>
    </div>
</div>

<section>
    @if($connected)
        {{--// || $user->hasRole('admin')--}}
    @if($user->hasRole('tutor'))
      <div class="row">
          <div class="col l12 m12 s12 center-align">
              <h6>Télécharger toutes les images du site</h6>
          </div>
          <div class="col l12 m12 s12 center-align">
              <a class="waves-effect waves-light btn btn-social" href="/picture/download"><i class="fas fa-download"></i></a>
          </div>
      </div>
    @endif
  @endif

  <div id="azerty" class="row">
    <div id="grid" class="col s12 m10 offset-m1 my-shuffle-container">
        
        @foreach ($pictures as $p)
            
        
            <div class="col s12 m6 l4 picture-item">
                <div class="card picture-item__inner">
                    <div class="card-image aspect__inner">
                        <a class="aspect__inner" href="/picture/{{$p->id}}"><img style="display: inline-block; max-height:25vh; width: auto" src="/storage/{{$p->link}}" alt="Picture from the site"></a>
                    </div>
                    <div class="picture-item__details">
                        <div class="picture-item__title">
                            <p>Nombres de likes : {{$p->likeCount()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach


    </div>

</section>
@endsection

@section('scripts')

<script src="/js/mainshuffle.js"></script>
 

@endsection
