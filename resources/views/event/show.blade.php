@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Évenement</h2>
            </div>
        </div>
    </div>
</div>

<br> {{-- Single event header with user profile and name of the event --}}
<section>
    {{-- Event header for tablet and desktop --}}
    <div class="row hide-on-small-only">
        <div class="col m2 l1 offset-l1 right-align">
            <img class="circle responsive-img profile-pic" src="/image/simon.jpg">
        </div>
        <div class="col m2 l2">
            <p>Nom prénom</p>
        </div>
        <div class="col m7 l7 offset-l1">
            <h4>Nom Évenement</h4>
        </div>
    </div>
    {{-- Event eader for mobile --}}
    <div class="row hide-on-med-and-up">
        <div class="col s2">
            <img class="circle responsive-img profile-pic" src="/image/simon.jpg">
        </div>
        <div class="col s10">
            <p>Nom Prénom</p>
        </div>
        <div class="col s12 center-align">
            <h4>Nom Évenement</h4>
        </div>
    </div>
    <hr class="divider"> {{-- Description of the event --}}
    <div class="row">
        <div class="col s12 l10 offset-l1">
            <p>This is a description of an event : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse
                lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.</p>
        </div>
        <div class="col s12 center-align">
            {{-- Open a modal to add image if you were present on the event --}}
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
                <i class="material-icons left">add_a_photo</i>Publier une ou plusieurs photos de l'événement
            </a>

            <a class="waves-effect waves-dark btn">S'inscrire <i class="fas fa-sign-in-alt right"></i></a>
        </div>
    </div>
    {{-- Modal Structure to add an photo--}}
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Ajouter une ou plusieurs photo</h4>
            <br>
            <form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Sélectionner une ou plusieurs photos">
                    </div>
                </div>
                <a href="#!" class="modal-close waves-effect waves-green btn">Ajouter</a>
                <a href="#!" class="modal-close waves-effect waves-green btn">Annuler</a>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l6 center-align">
            <ul class="collapsible">
                <li>
                    {{-- Collapside with comment --}}
                    <div class="collapsible-header">
                        <div class="row remove-marge-bot">
                            <div class="col s12 ">
                                <img class="circle responsive-img profile-pic" src="/image/simon.jpg">
                            </div>
                        </div>
                        <div class="col s1n2 left-alig">
                            <p>Nom Prénom</p>
                        </div>
                    </div>
                    <div class="collapsible-header">
                        <div class="row">
                            <div class="col s12">
                                <img class="materialboxed event-pic" src="/image/event.jpg">
                            </div>
                            <div class="show-event">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        {{-- Input to write a comment --}}
                        <div class="row">
                            <div class="event-comment">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    {{-- User actually conected profile --}}
                                    <div class="row remove-marge-bot">
                                        <div class="col s3 m2 l1">
                                            <img src="/image/simon.jpg" class="circle responsive-img">
                                        </div>
                                        <div class="col s9 m10 l11">
                                            <div class="row remove-marge-bot">
                                                <div class="s12 left">
                                                    <p>Prénom Nom</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 left">
                                            <div class="input-field">
                                                <i class="fas fa-pen prefix"></i>
                                                <textarea id="textarea1" class="materialize-textarea" data-length="120"></textarea>
                                                <label for="textarea1">Commentaire</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="event-comment">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row">
                                        {{-- User's profile who comment in last --}}
                                        <div class="col s3 m2 l1">
                                            <img src="/image/simon.jpg" class="circle responsive-img">
                                        </div>
                                        <div class="col s9 m10 l11">
                                            <div class="row remove-marge-bot">
                                                <div class="s12 left">
                                                    <p>Prénom Nom</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Comment text --}}
                                        <div class="s12 left">
                                            <p class="comment left"> This is a comment : Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Sed non risus. Suspendisse lectus.Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Sed non risus. Suspendisse lectus.Lorem ipsum dolor sit
                                                amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</section>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });

    $(document).ready(function() {
        $('input#input_text, textarea#textarea1').characterCounter();
    });

</script>
@endsection