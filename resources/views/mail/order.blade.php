


<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>

<h1>Commande n°{{$order->id}}</h1>

<p>Ce mail a été envoyé automatiquement par le systeme d'information</p>
<p>Il est distribué à l'utilisateur passant la commande ({{$order->user()->first_name}} {{$order->user()->last_name}} {{$order->user()->email}})</p>
<p>Ainsi qu'au membres du BDE</p>


<h2>Contenu de la commande :</h2>


<table>
    <tr>
        <th>N° produit</th><th>Nom</th><th>Prix unitaire</th><th>Quantite</th><th>Total</th>
    </tr>
    @php
        $total=0;
    @endphp
    @foreach ($order->products as $p)
    @php
        $total+=$p->pivot->quantity*$p->price;
    @endphp
    <tr>

        <td>{{$p->id}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->price}}€</td>
        <td>{{$p->pivot->quantity}}</td>
        <td>{{$p->pivot->quantity*$p->price}}€</td>
    </tr>
    @endforeach


</table>

<h2>Total : {{$total}} €</h2>



