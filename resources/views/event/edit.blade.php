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
                        <input value="{{$event->date}}" id="date" type="date" class="validate" name="date">
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
                                        Garder
                                        <input type="checkbox" name="{{$p->id}}">
                                        <span class="lever" ></span>
                                        Supprimer
                                      </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Modifier l'événement</button>                
                <form class="waves-effect waves-dark btn btn-event " action="/event/valide/{{$event->id}}" method="post">
                    @csrf
                    <input type="hidden" value="delete" name="validate">
                    <input type="hidden" name="_method" value="put">
                    <input type="submit" value="Supprimer l'évènement">
                </form>
                <form class="waves-effect waves-dark btn btn-event" action="/event/valide/{{$event->id}}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="validate">
                    <input type="hidden" name="_method" value="put">
                    <input type="submit" value="Publier l'évènement">
                </form>
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