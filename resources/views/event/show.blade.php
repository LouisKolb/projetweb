<div class="content">
    <div class="title m-b-md">
        <h1 style="text-align:center">Liste des évenements</h1>
        <a href="/event/create"><button>Ajouter un event</button></a>
    </div>
    <ul>
      @foreach ($events as $event)
        @if($event->statut==1)
        <h1>{{ $event->name }} </h1>
        <p>{{ $event->picture }}</p>
        <p>{{ $event->description }}</p>
        <p>{{ $event->date }}</p>
        <form class="" action="/event/annule/{{$event->id}}" method="post">
        @csrf
        <input type="hidden" value="0" name="validate">
        <input type="hidden" name="_method" value="put">
        <input type="submit" value="Annuler">
        </form>
        <form class="" action="/event/delete/{{$event->id}}" method="post">
        @csrf
        <input type="hidden" value="delete" name="validate">
        <input type="hidden" name="_method" value="put">
        <input type="submit" value="Supprimer">
        </form>
        <br><br><br>
        @endif

        {{--@if(session()->get('user')[0]->hasRole('Admin'))--}}
          @if($event->statut==0)
            <h1>{{ $event->name }}</h1>
            <p>{{ $event->description }}</p>
            <!-- <p>{{ $event->statut }}</p> -->
            <p>{{ $event->date }}</p>
            <form class="" action="/event/valide/{{$event->id}}" method="post">
            @csrf
            <input type="hidden" value="1" name="validate">
            <input type="hidden" name="_method" value="put">
            <input type="submit" value="Valider">
            </form>
            <form class="" action="/event/delete/{{$event->id}}" method="post">
            @csrf
            <input type="hidden" value="delete" name="validate">
            <input type="hidden" name="_method" value="put">
            <input type="submit" value="Supprimer">
            </form>
            <br><br><br>
          @endif
        {{--@endif--}}
      @endforeach
    </ul>
</div>
