@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg" alt="Parallax background">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Une photo</h2>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card">
                <div class="card-image">
                    <img src="/storage/{{$picture->link}}" alt="Event's picture">
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn btn-social"><i class="far fa-heart"></i></a>
                </div>
                {{-- Comment section --}}
                <div class="card-action"> 
                    @php
                        $connected = session()->has('user');
                        if($connected){
                            $user = App\user::find(session()->get('user')[0]);
                        }
                    @endphp
                    @if ($connected)
                    {{-- Write a comment --}}
                    <form action="/comment" method="POST">
                        @csrf
                        <input type="hidden" name="picture" value="{{$picture->id}}">
                        
                        <div class="row">
                            <div class="event-comment">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    {{-- User actually conected profile --}}
                                    <div class="row remove-marge-bot">
                                        <div class="col s4 m2 l1">
                                            <img src="/image/simon.jpg" class="circle responsive-img" alt="User's avatar">
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
                    
                    @endif
                    {{-- Others comments --}}
                    @foreach ($picture->comments as $comment)
                        @php
                            $writer =$comment->writer();
                        @endphp
                    
                        <div class="row">
                            <div class="event-comment">
                                <div class="card-panel grey lighten-5 z-depth-1">
                                    <div class="row">
                                        {{-- User's profile who comment in last --}}
                                        <div class="col s4 m2 l1">
                                            <img src="/image/simon.jpg" class="circle responsive-img" alt="User's avatar">
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
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('scripts')

@endsection