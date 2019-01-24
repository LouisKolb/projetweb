@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Page d'administration</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row datatable">
    <div class="col m12 l10 offset-l1">
        
        
        
        
        
        <table id='tab' class='display'>
            <caption>Articles dans la boutique</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Caché</th>
                </tr>
            </thead>
            <tbody id="producttable">
                

                {{-- AJAAAAAAAAX --}}

               {{-- C'est rempli avec de l'ajax --}}


                {{-- Fin de l'AJAAAX --}}
                
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
$(document).ready(function() {
    
//fonction pour remplir

 

    
    
    $('#tab').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            "ajax": "/api/product",
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "price" },
                    { "data": "hide" },
                    
                ]


        });
       


        
            



    });

</script>
@endsection