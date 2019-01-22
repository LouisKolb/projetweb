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
<section>
    <div class="row center-align">

        <h3 class="center-align">Idée d'événement</h3>

        <div class="row">
            <div class="col s1">
            </div>
            <form class="col s10" method="POST" action="/event" id="event_form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12 m12">
                        <input id="name" type="text" class="validate" name="name">
                        <label for="name">Nom de l'événement</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input id="description" type="text" class="validate" name="description">
                        <label for="description">Description de l'événement</label>
                    </div>

                    <div class="input-field col s12 m12">
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




                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Créer l'événement</button>
                    </div>

                    @if (count($errors) > 0)
                    <div class="red darken-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
            </form>

        </div>

        <!-- <div class="col m2">

            </div> -->

    </div>
</section>
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/info.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')


<script>
    $(document).ready(function(){
    $('select').formSelect();
  });





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