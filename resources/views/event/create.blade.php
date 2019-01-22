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
                <input id="date" type="date" class="validate" name="date">
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
            <div class="input-field center-align">
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Créer l'événement</button>
            </div>
        </div>
    </form>

    @if (count($errors) > 0)
    <div class="red darken-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
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

    $(document).ready(function() {
    $('input#name, textarea#description').characterCounter();
  });

</script>
@endsection