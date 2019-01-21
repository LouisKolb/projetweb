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
            <h4>Nom Prénom</h4>
        </div>
        <div class="col l5 offset-l1 m12 center-align">
            <img class="circle responsive-img profile-pic-on-userpage" src="/image/profile.jpg">
        </div>
        <div class="col l5 m12 center-align">
            <p>Modifier mon avatar</p>
            <div class="row">
                <div class="file-field input-field">
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
</div>
@endsection
 
@section('scripts')
@endsection