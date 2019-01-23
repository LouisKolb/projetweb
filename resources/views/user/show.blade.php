@extends('layout.master')
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Mon profil</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="card-panel">
    <div class="row">
        <div class="col s12 center-align">
            <h4>{{App\user::find(session()->get('user')[0])->first_name}} {{App\user::find(session()->get('user')[0])->last_name}}</h4>
        </div>
        <div class="row">
            <div class="col l6 m12 center-align">
                <img class="circle responsive-img profile-pic-on-userpage" src="{{App\user::find(session()->get('user')[0])->avatar}}">
            </div>
            <div class="col l5 m12 margetop center-align">
                <p>Modifier mon avatar</p>
                <div class="row">
                    <div class=" file-field input-field">
                        <div class="btn">
                            <span>Browse</span>
                            <input type="file" />
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload file" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row center-align">
            <div class="col m12 l6 margetop">
                <h5>{{App\user::find(session()->get('user')[0])->email}}</h5>
            </div>
            <div class="col m12 l5">
                <p>Modifier mon adresse mail</p>
                <div class="row valign-wrapper">
                    <div class="input-field col s10">
                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="col s2 hide-on-small-only">
                        <a class="waves-effect waves-light btn"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                    <div class="col s2 hide-on-med-and-up">
                        <a class="waves-effect waves-light btn"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m10 offset-m1 right-align">
                <a class="waves-effect waves-light btn"><i class="fas fa-key"></i> Modifier mon mot de passe</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
