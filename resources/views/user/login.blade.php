@extends('layout.master') 
@section('content')




    <div class="grey lighten-5 login_waper ">




        <h3 class="center-align">Login</h3>
        <form class="col s12" method="POST" action="/login" id="login_form">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="username" type="text" class="validate" name="username">
                    <label for="username">Email or useranme</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Mot de passe</label>
                </div>


                <div class="input-field col s12 ">
                    <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Se connecter</button>
                </div>

            </div>


        </form>


        <a href="/register">Pas encore de compte ? (Inscription)</a>
    </div>



@endsection
 
@section('scripts')
<script>
    $("#login_form").submit(function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.
  var form = $("#login_form");
  
  $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);
                window.location.replace("/"); 

            },
            error: function (data) {
                console.log('An error occurred.');
                error = JSON.parse(data.responseText)
                
                try{
                    errors = error.errors
                    for(i=0;i<errors.length;i++){
                    M.toast({html: errors[i] , classes: 'red darken-2' ,displayLength:5000})
                    return
                    }
                }catch(e){
                    M.toast({html: "Une erreur s'est produite merci de votre compréhension" , classes: 'red darken-2' ,displayLength:5000})
                }
                
                
                //console.log(errors);
            },
        });


});

</script>
@endsection