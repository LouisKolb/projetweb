@extends('layout.master') 
@section('content')
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

<!-- Top actualité -->
<section class="container">
    <h4 class="center-align">Idée d'événement</h4>
    <form method="POST" action="/event" id="event_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field">
                <input id="name" type="text" class="validate" name="name" data-length="50">
                <label for="name">Nom de l'événement</label>
            </div>
            <div class="input-field">
                <textarea id="description" class="validate materialize-textarea" name="description" data-length="500"></textarea>
                <label for="description">Description de l'événement</label>
            </div>

            <div class="input-field">
                <input id="date" type="text" class="validate datepicker" name="date">
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
    </form>

    <div class="switch">
        <label>
            Récurence :                              
            </label>
        <label>
            Quotidienne 
            <input type="checkbox" name="">
            <span class="lever" ></span>       
            </label>
        <label>
            Mensuel 
            <input type="checkbox">
            <span class="lever" ></span>
            </label>
    </div>
    <div class="switch">
            <label>
              Off
              <input id="price_switch" type="checkbox">
              <span class="lever"></span>
              On
            </label>
          </div>
    <div id= "price_case" class="row hide">
        <div class="col l2 m2 s2 input-field">
            <input id="p" type="number" step="any" class="validate" name="price">
            <label for="p">Prix</label>
        </div>
    </div>



    <div class="input-field center-align">
        <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Proposer son idée</button>
        <form class="waves-effect waves-dark btn btn-event" action="/event/valide/" method="post">
            @csrf
            <input type="hidden" value="1" name="validate">
            <input type="hidden" name="_method" value="put">
            <input type="submit" value="Publier l'évènement">
        </form>
    </div>


    @if (count($errors) > 0)
    <div class="card-panel red lighten-5 login_waper">
        <ul>
            @foreach ($errors->all() as $error)
            <h6>
                <li class="red-text">{{ $error }}</li>
            </h6>
            @endforeach
        </ul>
    </div>
    @endif
</section>
@endsection
 
@section('scripts')


<script>

    $("#price_switch").click(function() {
    if($(this).is(":checked")) {
        $( "#price_case" ).removeClass( "hide" );    }
    else {
        $( "#price_case" ).addClass( "hide" );
    }
  });

    
    $(document).ready(function(){
    $('select').formSelect();
  });

    $(document).ready(function() {
    $('input#name, textarea#description').characterCounter();
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