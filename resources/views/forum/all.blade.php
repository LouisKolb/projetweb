@extends('layout.master') 
@section('content')
@php 
    $connected = false;
    if(session()->has('user')) {
        $connected = true;
        $user = App\user::find(session()->get('user')[0]);
    }

@endphp


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
        @if($connected)
            @if ($user->hasRole('admin'))
            <a class="waves-effect btn margin-top-button" href="/forum/category-create">
                Créer une catégorie
            </a>
            @endif
            <a class="waves-effect btn margin-top-button" href="/forum/question-create">
                Ajouter un sujet
            </a>
        @endif
    </div>
</div>
@if($user->hasRole('admin'))
<section>

              <div class="row left-align">

                    <div class="col s12 left-align ">
                        <h3>Sujets Signalés 
                    </div>

        <div class="col s12">
            <div class="mentions-container hide-on-small-only">
                <table class="striped">
                    
                    <thead>
                        <tr>
                            <th width=33%>Sujet</th>
                            <th width=33%>Réponses</th>
                            <th width=33%>Dernier message</th>
                            @if($connected)
                            @foreach ($questions as $question)
                            @if($user->username == App\user::find($question->user_id)->username || $user->hasRole('admin'))
                            <th width=33%></td>
                            @endif
                             @endforeach
                            @endif
                        </tr>
                    </thead>
                   
                
                    @php 
                        $total = DB::table('Comment_Forums')->where('question_id',$question->id)->count();
                        
                    @endphp

                
                @foreach ($questions as $question)
                @if($question->statut == 1)
                    <tbody>
                        <tr>
                            <td width=33%><a href="/sujet/{{$question->id}}"><b>{{$question->name}}</b></a><br>par <i>{{App\user::find($question->user_id)->username}}<br>  {{$question->created_at}}</i>
                            </td>
                            <td width=33%>{{$total}}</td>
                            <td width=33%>Yolo</td>
                    @if($connected)
                        @if($user->username == App\user::find($question->user_id)->username || $user->hasRole('admin'))
                            <td widht=33%><a class="waves-effect waves-light btn" href="{{$question->id}}/edit" style="float:center;"><i class="fas fa-edit"></i></a></td>
                        @endif
                            
                    @endif
                        </tr>
                    </tbody>
                    @endif 
@endforeach
                    
                
                </table>
            </div>    
        </div>

 </section>
@endif
<section>

              <div class="row left-align">
               @foreach ($category_forums as $category_forum)
                    <div class="col s12 left-align ">
                      <h3>{{$category_forum->name}} 
                        @if($connected)
                            @if($user->hasRole('admin'))
                        <a class="waves-effect waves-light btn" href="/forum/{{$category_forum->id}}/edit" style="float:center;"><i class="fas fa-edit"></i></a></h3>
                         @endif
                        @endif
                </div>
        <div class="col s12">
            <div class="mentions-container hide-on-small-only">
                <table class="striped">
                    
                    <thead>
                        <tr>
                            <th width=33%>Sujet</th>
                            <th width=33%>Réponses</th>
                            <th width=33%>Dernier message</th>
                            @if($connected)
                            @foreach ($questions as $question)
                            @if($user->username == App\user::find($question->user_id)->username || $user->hasRole('admin'))
                            <th width=33%></td>
                            @endif
                             @endforeach
                            @endif
                        </tr>
                    </thead>
                    
            @foreach ($questions as $question)
                @if($question->categorie == $category_forum->id)
                    @php 
                        $total = DB::table('Comment_Forums')->where('question_id',$question->id)->count();
                        
                    @endphp
                @if($question->prive == 0 || $connected)
                    <tbody>
                        <tr>
                            <td width=33%><a href="/sujet/{{$question->id}}"><b>{{$question->name}}</b></a><br>par <i>{{App\user::find($question->user_id)->username}}<br>  {{$question->created_at}}</i>
                            </td>
                            <td width=33%>{{$total}}</td>
                            <td width=33%>Yolo</td>
                    @if($connected)
                        @if($user->username == App\user::find($question->user_id)->username || $user->hasRole('admin'))
                            <td widht=33%><a class="waves-effect waves-light btn" href="{{$question->id}}/edit" style="float:center;"><i class="fas fa-edit"></i></a> <a class="waves-effect waves-light btn suppsuj" href="/forum/{{$question->id}}/signal" style="float:left;"><i class="fas fa-exclamation-triangle"></i></a></td>
                        @endif
                            
                    @endif
                        </tr>
                    </tbody>
                    @endif
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