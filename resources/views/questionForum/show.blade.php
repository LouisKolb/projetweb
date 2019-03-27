@extends('layout.master') 
@section('content') @php 
$connected = false; 
if(session()->has('user')) { 
    $connected = true; 
    $user= App\user::find(session()->get('user')[0]); 
} 
    $creator = App\user::find($question->user_id);

@endphp

<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax">
        <img src="/image/background.jpg" alt="parallax background">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Sujet</h2>
            </div>
        </div>
    </div>
</div>

<section>
    {{-- Event header for tablet and desktop --}}
    <div class="row hide-on-small-only center-align">
        <div class="col m2 l2">
            <p>par <i>{{$creator->username}}</i></p>
        </div>
        <div class="col m7 l7 offset-l1">
            <h4>{{$question->name}}</h4>
        </div>
    </div>
    <hr class="divider"> {{-- Description of the event --}}
    <div class="row">
        <div class="col s12 l10 offset-l1">
            <p>{{$question->description}}</p>
        </div>

    
</section>

<section>
    <div class="row hide-on-small-only center-align">
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
</section>


@endsection