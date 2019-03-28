@extends('layout.master')
@section('content')
@php
$connected = false;
if(session()->has('user'))
{
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>BDE Exia Strasbourg</h2>
            </div>
        </div>
    </div>
</div>

{{-- Edit event --}}

<section class="container">
   <div class="row center-align">

        <h4 class="center-align">Modifier une catégorie</h4>

        <div class="row">
            <div class="col s1">
            </div>
            {{-- Form to edit event with display old information --}}
            <form class="col s10" method="POST" action="/forum/{{$CategoryForum->id}}" id="categoryForum_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="row">

                    <div class="input-field col s12 m12">
                        <input id="name" type="text" class="validate" name="name" data-length="50" value="{{$CategoryForum->name}}">
                        <label class="active" for="name">Nom du produit</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Modifier la catégorie</button>
            </form>

            <form  action="/forum/{{$CategoryForum->id}}/delete" method="post">
                    @csrf
                    <button class="btn waves-effect waves-light suppsuj" id="submit" type="submit" name="submit">Supprimer la catégorie</button>
            </form>
        
    </div> 
</section>

    

@endsection

@section('scripts')


<script>
    $(document).ready(function(){
    $('select').formSelect();
  });




    $(document).ready(function () {
    $('.carousel').carousel({
        shift: 500,
        numVisible: 3
    });

    // function for next slide
    $('.next').click(function () {
        $('.carousel').carousel('next');
    });

    // function for prev slide
    $('.prev').click(function () {
        $('.carousel').carousel('prev');
    });

});



</script>
@endsection
