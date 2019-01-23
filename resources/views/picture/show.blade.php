@extends('layout.master') 
@section('content')
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/background.jpg">
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
                    <img src="/image/event.jpg">
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn btn-social"><i class="far fa-heart"></i></a>
                    <a class="waves-effect waves-light btn btn-social"><i class="fas fa-download"></i></a>
                </div>
                {{-- Comment section --}}
                <div class="card-action">
                    {{-- Write a comment --}}
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
                    {{-- Others comments --}}
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
                                                <p>Prénom Nom</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Comment text --}}
                                    <div class="s12 left">
                                        <p class="comment left"> This is a comment : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                            non risus. Suspendisse lectus.Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Sed non risus. Suspendisse lectus.Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Sed non risus. Suspendisse lectus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('scripts')
<script>

</script>
@endsection