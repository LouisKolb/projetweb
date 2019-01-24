<h1>{{$event->id}}</h1>



<table>
    <tr>
        <th> ID</th>
        <th> Prenom</th>
        <th> Nom</th>
        <th> Mail</th>
    </tr>
    @foreach ($event->participants() as $p)
    <tr>
        <td>
            {{$p->id}}
        </td>
        <td>
            {{$p->first_name}}
        </td>
        <td>
            {{$p->last_name}}
        </td>
        <td>
            {{$p->email}}
        </td>

    </tr>





</table>



    
@endforeach