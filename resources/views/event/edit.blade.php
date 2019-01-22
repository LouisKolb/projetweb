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
            <form class="col s10" method="POST" action="/event" id="event_form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12 m12">
                        <input value="{{$event->name}}" id="event-title" type="text" class="validate">
                        <label class="active" for="first_name2">Nom de l'évènement</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input value="{{$event->description}}" id="description" type="text" class="validate" name="description">
                        <label for="description">Description de l'événement</label>
                    </div>

                    <div class="input-field col s12 m12">
                        <input value="{{$event->date}}" id="date" type="date" class="validate" name="date">
                        <label for="date">Date de l'événement</label>
                    </div>


                    {{-- Print all picture of event --}}
                    <div class="row">
                        @foreach (App\event::find($event->id)->pictures as $p)
                        <div class="col s12 m6 l4">
                            <div class="card hoverable ">
                                <div class="card-image ">
                                    <img class="img-product" src="/storage/{{$p->link}}" alt="/storage/{{$p->link}}">
                                    <a class="btn-floating halfway-fab waves-effect orange accent-3 modal-trigger open" data-id="Album" href=""><i
                                        class="material-icons">delete</i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>



                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Modifier l'événement</button>
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