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
              <form class="col s10" method="POST" action="/event" id="event_form">
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
                    <input id="picture" type="text" class="validate" name="picture">
                    <label for="picture">Lien de l'événement</label>
                  </div>
                  <div class="input-field col s12 m12">
                    <input id="date" type="date" class="validate"  name="date">
                    <label for="date">Date de l'événement</label>
                  </div>

                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Créer l'événement</button>
                  </div>

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




  $("#event_form").submit(function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $("#event_form");

  $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);
                window.location.replace("/event");

            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data)
                try{

                    errors=data.responseJSON
                    errors = errors.errors;
                    for(i=0;i<errors.length;i++){
                      M.toast({html: errors[i] , classes: 'red darken-2' ,displayLength:5000})
                      console.log(i);
                      if(i==errors.length-1)return
                    }
                }catch(e){
                    M.toast({html: "Une erreur s'est produite merci de votre compréhension" , classes: 'red darken-2' ,displayLength:5000})
                }
                console.log(errors);
            },
        });


});

</script>
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
