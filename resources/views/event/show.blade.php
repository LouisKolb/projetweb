@extends('layout.master') 
@section('content') @php $creator = App\user::find($event->user_id); 
@endphp




<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Évenement {{$event->name}}</h2>
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
            <p>{{$creator->first_name}} {{$creator->last_name}}</p>
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
            <p>Description de l'eventment : {{$event->description}}</p>
        </div>
        <div class="col s12 center-align">
            {{-- Open a modal to add image if you were present on the event --}} @if($event->date
            <now()) <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
                <i class="material-icons left">add_a_photo</i>Publier une ou plusieurs photos de l'événement
                </a>
                @else @if (session()->has('user'))
                <form action="/event/{{$event->id}}/subscribe" method="POST">
                    @csrf
                    <button class="waves-effect waves-dark btn" type="submit">
                            @if (App\user::find(session()->get('user')[0])->hasSubscribedToEvent($event->id))
                                Se désinscrire
                            @else
                                S'inscrire 
                            @endif
                            
                            <i class="fas fa-sign-in-alt right"></i></button>
                </form>

                @else
                <a href="/login" class="waves-effect waves-dark btn">Vous devez être connecté pour vous inscrire</a> @endif
                @endif
                @if (count($errors) > 0)
                    <div class="card-panel red lighten-5 login_waper">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <h6>
                                    <li class="red-text">{{ $error }}</li>
                                </h6>
                            @endforeach
                        </ul>
                    </div>
                @endif



        </div>
    </div>
    {{-- Modal Structure to add an photo--}}
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Ajouter une ou plusieurs photo</h4>
            <br>
            <form action="/event/upload" method="POST"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="event" value="{{$event->id}}">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple  name ="images[]"  accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Sélectionner une ou plusieurs photos">
                    </div>
                </div>
                <button class="modal-close waves-effect waves-green btn" >Ajouter</button>
                <a href="#!" class="modal-close waves-effect waves-green btn">Annuler</a>
            </form>
        </div>
    </div>

    @foreach ($event->pictures as $picture)


    <div class="row">
        <div class="col s12 l6 center-align">




            <ul class="collapsible">
                <li>
                    {{-- Collapside with comment --}}
                    <div class="collapsible-header">
                        <div class="row remove-marge-bot">
                            <div class="col s12 ">
                                <img class="circle responsive-img profile-pic" src="https://www.numerama.com/content/uploads/2018/05/slider-facebook-new-profile.jpg">
                            </div>
                        </div>
                        <div class="col s1n2 left-alig">
                            @php $pictureuser = App\user::find($picture->user_id) 
@endphp
                            <p>{{$pictureuser->first_name}} {{$pictureuser->last_name}}</p>
                        </div>
                    </div>
                    <div class="collapsible-header test">

                        <img class="materialboxed event-pic-show" src="/storage/{{$picture->link}}"> {{--
                        <div class="col l12 m12 s12 event-pic-show">
                            --}} {{-- </div> --}}
                        <div class="show-event">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="collapsible-body">
                        {{-- Input to write a comment --}} @php $connected = session()->has('user'); if($connected){ $user = App\user::find(session()->get('user')[0]);
                        } 
@endphp @if ($connected) {{-- Write a comment --}}
                        <form action="/comment" method="POST">
                            @csrf
                            <input type="hidden" name="picture" value="{{$picture->id}}">

                            <div class="row">
                                <div class="event-comment">
                                    <div class="card-panel grey lighten-5 z-depth-1">
                                        {{-- User actually conected profile --}}
                                        <div class="row remove-marge-bot">
                                            <div class="col s4 m2 l1">
                                                <img src="/image/simon.jpg" class="circle responsive-img">
                                            </div>
                                            <div class="col s8 m10 l11">
                                                <div class="row">
                                                    <div class="s12 left">
                                                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 left">
                                                <div class="input-field">
                                                    <i class="fas fa-pen prefix"></i>
                                                    <textarea id="textarea1" class="materialize-textarea" data-length="120" name="comment"></textarea>
                                                    <label for="textarea1">Commentaire</label>
                                                </div>
                                                <div class="input-field">
                                                    <button class="btn">Commenter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @endif @foreach ($picture->comments as $comment) @php $writer =$comment->writer(); 
@endphp

                        <div class="row">
                            <div class="event-comment">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row">
                                        {{-- User's profile who comment in last --}}
                                        <div class="col s4 m2 l1">
                                            <img src="/image/simon.jpg" class="circle responsive-img">
                                        </div>
                                        <div class="col s8 m10 l11">
                                            <div class="s12 left">
                                                <div class="s12 left">
                                                    <p>{{$writer->first_name}} {{$writer->last_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Comment text --}}
                                        <div class="s12 left">
                                            <p class="comment left"> {{$comment->content}}</p>
                                        </div>
                                    </div>
                                    <div class="row remove-marge-bot">
                                        <div class="col s6 left-align">
                                            {{-- Date --}} {{$comment->created_at}}
                                        </div>
                                        <div class="col s6 right-align">
                                            <a class="waves-effect waves-light btn"><i class="fas fa-exclamation-triangle"></i></a>
                                            <a class="waves-effect waves-light btn"><i class="fas fa-ban"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach






                        </div>
                </li>
            </ul>
            </div>

            @endforeach
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