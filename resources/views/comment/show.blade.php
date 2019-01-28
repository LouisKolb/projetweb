@extends('layout.master') 
@section('content')

<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Commentaire</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section>

    
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
                                    <p>{{$comment->writer()->first_name}} {{$comment->writer()->last_name}}</p>
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

</section>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
    });

</script>
@endsection