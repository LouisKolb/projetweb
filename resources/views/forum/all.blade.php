@php 
    $connected = false;
    if(session()->has('user')) {
        $connected = true;
        $user = App\user::find(session()->get('user')[0]);
    }


@endphp

@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg" alt="background picture">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Forum</h2>
            </div>
        </div>
    </div>
</div>
<div class="row center-align">
    <div class="col s12 left-align btncatefor">
        @if($connected && $user->hasRole('admin'))
            <a class="waves-effect btn margin-top-button" href="/forum/category-create">
                Créer une catégorie
            </a>
        @endif
        @if($connected)
            <a class="waves-effect btn margin-top-button" href="/forum/question-create">
                Ajouter un sujet
            </a>
        @endif
    </div>
</div>

<section>

              <div class="row left-align">
               @foreach ($category_forums as $category_forum)
                    <div class="col s12 left-align ">
                      <h3>{{$category_forum->name}} 
                        @if($connected && $user->hasRole('admin'))
                        <a class="waves-effect waves-light btn" href="/forum/{{$category_forum->id}}/delete" style="float:center;"><i class="fas fa-ban"></i></a>
                        <a class="waves-effect waves-light btn" href="/forum/{{$category_forum->id}}/edit" style="float:center;"><i class="fas fa-edit"></i></a></h3>
                        @endif
                </div>
        <div class="col s12">
            <div class="mentions-container hide-on-small-only">
                <table class="striped">
                    
                    <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>Réponses</th>
                            <th>Dernier message</th>
                            @if($connected && $user->hasRole('admin'))
                            <th>Modifier</td>
                            @endif
                        </tr>
                    </thead>
                    @foreach ($questions as $question)
                    @if($question->categorie == $category_forum->id)
                    <tbody>
                        <tr>
                            <td width=33%><a href="/sujet/{{$question->id}}"><b>{{$question->name}}</b></a><br>par <i>{{App\user::find($question->user_id)->username}}</i>
                            </td>
                            <td width=33%>123</td>
                            <td width=33%>par ta mère</td>
                            @if($connected && $user->hasRole('admin'))
                            <td widht=33%><a class="waves-effect waves-light btn" href="/forum/{{$category_forum->id}}/edit" style="float:center;"><i class="fas fa-edit"></i></a></td>
                            @endif
                        </tr>
                    </tbody>

                    @endif
                    @endforeach 
                </table>
            </div>    
        </div>
@endforeach
 </section>
        
@endsection
 
@section('scripts')
@endsection