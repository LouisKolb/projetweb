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
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>BDE Exia Strasbourg</h2>
            </div>
        </div>
    </div>
</div>

{{-- Edit event --}}

<section class="container">
    <div class="row center-align">

        <h4 class="center-align">Modifier un évènement</h4>

        <div class="row">
            <div class="col s1">
            </div>
            <form class="col s10" method="POST" action="/event/{{$event->id}}" id="event_form" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put"> @csrf
                <div class="row">


                    <div class="input-field col s12 m12">
                        <input id="name" type="text" class="validate" name="name" data-length="50" value="{{$event->name}}">
                        <label class="active" for="name">Nom de l'évènement</label>
                    </div>


                    <div class="input-field col s12 m12">
                        <input value="{{$event->description}}" id="description" type="text" class="validate" name="description">
                        <label for="description">Description de l'événement</label>
                    </div>


                    <div class="input-field col s12 m12">
                        <input value="{{$event->date}}" id="date" type="text" class="validate datepicker" name="date">
                        <label for="date">Date de l'événement</label>
                    </div>

                    <label>Image de présentation</label>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Rechercher</span>
                            <input type="file" name="image" />
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="imagetext" placeholder="Importer un fichier" />
                        </div>
                    </div>

                    <div>
                        @php
                            $r = $event->recurency();
                        @endphp
                      <select name="recurency">
                          <option value="0" @if($r==0) selected @endif>Pas de récurence</option>
                          <option value="7"@if($r==7) selected @endif>Toutes les semaines</option>
                          <option value="28" @if($r==28) selected @endif>Tous les mois</option>
                          <option value="364" @if($r==364) selected @endif>Tous les ans</option>
                      </select>
                    <label>Récurence</label>
                    <div class="input-field">
                        <input id="price" type="number" class="validate " name="price" value="{{$event->price}}">
                        <label for="price">Prix</label>
                    </div>

                    </div>
            </form>

            {{-- Print all picture of event --}}
            <div class="row">
                @foreach (App\event::find($event->id)->pictures as $p)
                <div class="col s12 m6 l4">
                    <div class="card hoverable ">
                        <div class="card-image ">
                            <img class="img-product" src="/storage/{{$p->link}}" alt="/storage/{{$p->link}}">

                            <!-- Switch -->
                            <div class="switch">
                                <label>
                                    Supprimer
                                    <input type="checkbox" name="{{$p->id}}">
                                    <span class="lever" ></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



            <div class="input-field col s12">
                <button class="btn waves-effect waves-light margin-top-button" id="submit" type="submit" name="submit">Modifier l'événement</button>

                <form  action="/event/valide/{{$event->id}}" method="post">
                    @csrf
                    <input type="hidden" value="delete" name="validate">
                    <input type="hidden" name="_method" value="put">
                    <button class="btn waves-effect waves-light margin-top-button" id="submit" type="submit" name="submit">Supprimer l'évènement</button>
                </form>

                <form  action="/event/valide/{{$event->id}}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="validate">
                    <input type="hidden" name="_method" value="put">
                    <button class="btn waves-effect waves-light margin-top-button" id="submit" type="submit" name="validate">Publier l'évènement</button>
                </form>

            </div>
        </div>
    </div>
            @if (count($errors) > 0)
            <div class="card-panel red lighten-5 login_waper">
                <ul>
                    @foreach ($errors->all() as $error)
                    <h6><li class="red-text">{{ $error }}</li></h6>
                    @endforeach
                </ul>
            </div>
            @endif
           
</section>

    

@endsection

@section('scripts')


<script>
    $(document).ready(function(){
    $('select').formSelect();
  });




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

$(document).ready(function(){
    $('.datepicker').datepicker({
        i18n: {
        months: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
		monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
		weekdays: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ],
		weekdaysShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
        weekdaysAbbrev: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
		today: 'Aujourd\'hui',
		clear: 'Réinitialiser',
        close: 'Fermer'
        },
        format: 'yyyy-mm-dd'
    });
  });

</script>
@endsection
