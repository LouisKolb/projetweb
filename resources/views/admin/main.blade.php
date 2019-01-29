@extends('layout.master') 

@section('additionalheader')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script   src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
@endsection



@section('content')

{{-- Parallax header --}}
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
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

{{-- DataTable with some info --}}
<div class="row datatable">
    <div class="col m12 l10 offset-l1">        
        <table id='products' class='display'>
            <caption>Articles dans la boutique</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix €</th>
                    <th>Caché</th>
                </tr>
            </thead>
            <tbody id="producttable">
                {{-- AJAX --}}
                {{-- filled with ajax --}}
                {{-- End of AJAX --}}
            </tbody>
        </table>
    </div>
</div>
        <section id="section">
                <div class="parallax-container center valign-wrapper blueborders">
                    <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
                    </div>
                    <div class="container white-text">
                        <div class="row">
                            <div class="col s12">
                                <h3>Événements</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<div class="row datatable">
    <div class="col m12 l10 offset-l1"> 
        <table id='events' class='display'>
            <caption>Événements</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix €</th>
                    <th>Validé</th>
                    <th>Recurence en J</th>
                </tr>
            </thead>
            <tbody id="eventstable">
                {{-- AJAX --}}
                {{-- filled with ajax --}}
                {{-- End of AJAX --}}
            </tbody>
        </table>
    </div>
</div>
<section id="section">
        <div class="parallax-container center valign-wrapper blueborders">
            <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
            </div>
            <div class="container white-text">
                <div class="row">
                    <div class="col s12">
                        <h3>Utilisateurs</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="row datatable">
<div class="col m12 l10 offset-l1"> 
<table id='users' class='display'>
    <caption>Utilisateurs</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Roles</th>
            
        </tr>
    </thead>
    <tbody id="userstable">
        {{-- AJAX --}}
        {{-- filled with ajax --}}
        {{-- End of AJAX --}}
    </tbody>
</table>
</div>
</div>
@endsection












 
@section('scripts')
{{-- Script for filling the table in ajax --}}
<script>
    $(document).ready(function() {
    
        $('#products').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            
            "ajax": "/api/product",
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "price" },
                    { "data": "hide" },   
                ],
                "dom": 'Bfrtip',
                "buttons": [
                    'print'
                ]
            
        });

        $('#events').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            
            "ajax": "/api/events",
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "price" },
                    { "data": "statut" },   
                    { "data": "recurency"},   
                ],
                "dom": 'Bfrtip',
                "buttons": [
                    'print'
                ]
            
        });
        $('#users').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            
            "ajax": "/api/users",
                "columns": [
                    { "data": "id" },
                    { "data": "username" },
                    { "data": "first_name" },
                    { "data": "last_name" },
                    { "data": "email" },
                    { "data": "rolesstring" },   
                      
                ],
                "dom": 'Bfrtip',
                "buttons": [
                    'print'
                ]
            
        });
       

    });

</script>
@endsection