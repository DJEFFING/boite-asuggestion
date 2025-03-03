@extends('view_admin.partials.app')
@section('content')
@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="main-container">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <strong class="card-title" style="float: right"><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addCategeorie">
                            <i class="fa fa-plus"></i> Ajouter</button></strong>

                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TITRE</th>
                                    <th>DATE CREATION</th>
                                    <th>DATE MODIFICATION</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $categorie )
                                @include('view_admin.view_categeorie.confirm_destroy_categorie')
                                @include('view_admin.view_categeorie.edit_categeorie')
                                <tr>
                                    <td> {{ $categorie->id  }} </td>
                                    <td> {{ ucfirst($categorie->titre) }} </td>
                                    <td> {{ $categorie->created_at }} </td>
                                    <td> {{ $categorie->updated_at }} </td>
                                    <td class="text-center" style="display: flex">
                                        <a href="#" ><button class="btn btn-info mr-1" data-toggle="modal" data-target="#editCategeorie{{ $categorie->id }}"><i class="fa fa-edit"></i> Modifier</button><a>
                                        <button class="btn btn-danger mr-1" title="Supprimer" data-toggle="modal" data-target="#desCategeorie{{ $categorie->id }}"><i class="fa fa-trash-o"></i></button></td>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucun Catégeorie...</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@include('view_admin.view_categeorie.create_categeorie')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Ajoutez une animation de fondu pour le message de succès
        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").fadeOut("slow");
            }, 3000); // Le message de succès restera visible pendant 3000 millisecondes (3 secondes)
        });
    </script>
@endsection