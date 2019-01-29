@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background parallax">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Connexion</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col s10 offset-s1">
        <h3 class="center-align">Veuillez entrez vos identifiants</h3>
        <form class="col s12" method="POST" action="/login" id="login_form">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="username" type="text" class="validate" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Mot de passe</label>
                </div>
                <div class="input-field col s12 m12 l2">
                    <button class="btn waves-effect waves-dark" id="submit" type="submit" name="submit">Se connecter</button>
                </div>
                <div class="input-field col s12 m12 l2 offset-l8 right-align">
                    <a class="btn waves-effect waves-dark" href="/register">S'enregister</a>
                </div>
            </div>
        </form>
    </div>
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
                location.replace(document.referrer);
                //window.history.go(-1);
            },
            error: function (data) {
                console.log('An error occurred.');
                error = JSON.parse(data.responseText)

                try{
                    errors = ["Les identifiants ne corespondent pas"]
                    for(i=0;i<errors.length;i++){
                    M.toast({html: errors[i] , classes: 'red darken-2' ,displayLength:5000})
                    return
                    }
                }catch(e){
                    M.toast({html: "Une erreur s'est produite merci de votre compréhension" , classes: 'red darken-2' ,displayLength:5000})
                }



            },
        });


});

</script>
@endsection