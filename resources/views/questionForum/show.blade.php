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
@if($connected)
<section>
    <form action="/commentForum" method="POST">
                            @csrf
                            <input type="hidden" name="IDquestion" value="{{$question->id}}">
                            <div class="row">
                                <div class="event-comment">
                                    <div class="card-panel grey lighten-5 z-depth-1">
                                        {{-- User actually conected profile --}}
                                        <div class="row remove-marge-bot">
                                            <div class="col s8 m10 l11">
                                            </div>
                                            <div class="col s12 left">
                                                <div class="input-field">
                                                    <i class="fas fa-pen prefix"></i>
                                                    <textarea id="textarea1" class="materialize-textarea" data-length="120" name="commentForum"></textarea>
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
</section>
@endif
@foreach ($commentForum as $comment)
@php
$writer = App\user::find($comment->user_id);
@endphp 
@if($question->id == $comment->question_id)
    <div class="row">
        <div class="event-comment">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s8 m10 l11">
                        <div class="s12 left">
                            <div class="s12 left">
                                <p>{{$writer->username}}</p><hr>
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="row">
                            <div class="col s8 m10 l11">
                                <div class="s12 left">
                                    <div class="s12 left">
                                        {{$comment->content}}  
                                    </div>
                                </div>
                            </div>    
                            <div class="col s8 m10 l11">
                                <hr>{{$comment->created_at}}
                            </div>
                                 <div class="col s6 left-align"> 
                                    @if($connected)
                                            <a class="waves-effect waves-light btn" href="/forum/{{$comment->id}}/signal"><i class="fas fa-exclamation-triangle"></i></a>
                                        @if($user->hasRole('admin'))
                                            <a class="waves-effect waves-light btn" href="/forum/{{$comment->id}}/delete"><i class="fas fa-ban"></i></a>
                                        @endif 
                                    @endif        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
@endforeach

@endsection