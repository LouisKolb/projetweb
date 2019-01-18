@extends('layout.master')
@section('content')



  <div class="grey lighten-5 login_waper ">

    <h3 class="center-align">Ajouter un produit</h3>

    <div class="row">
      <form class="col s12" method="POST" action="/event" id="event_form">
        @csrf
        <div class="row">
          <div class="input-field col s12 m6">
            <input id="name" type="text" class="validate" name="name">
            <label for="name">Nom du produit</label>
          </div>
          <div class="input-field col s12 m6">
            <input id="description" type="text" class="validate" name="description">
            <label for="description">Description du produit</label>
          </div>
          <div class="input-field col s12 m6">
            <input id="picture" type="text" class="validate" name="picture">
            <label for="picture">Prix du produit</label>
          </div>
          <div class="input-field col s12 m6">
            <input id="picture" type="text" class="validate" name="picture">
            <label for="picture">Catégorie du produit</label>
          </div>


          <div class="input-field col s12">
            <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Créer l'évenement</button>
          </div>

        </div>
      </form>

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
                window.location.replace("/product");

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
@endsection
