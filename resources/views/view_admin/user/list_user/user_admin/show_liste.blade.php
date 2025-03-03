@extends('view_admin.partials.app')
@section('content')
<div class="main-container">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if (!empty(session('message')))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <hr>
                        @if (session('user') && session('pwd') )
                        <p>Non d'utilisateur : {{ session('user') }}</p>
                        <p>Mot de passe : {{ session('pwd') }}</p>
                        @endif

                    </div>
                @endif
                @if (!empty(session('alert')))
                    <div class="alert alert-danger">
                        {{ session('alert') }}
                    </div>
                @endif
               {{-- {{Route::currentRouteName()}} --}}
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <strong class="card-title" style="float: right"><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addAdmin">
                        <i class="fa fa-plus"></i> Ajouter</button></strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>DATE INSCRIPTION</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $item )
                                <tr>
                                    <td> {{ $loop->iteration  }} </td>
                                    <td> {{ $item->pseudo }} </td>
                                    <td> {{ $item->created_at}} </td>
                                    <td class="text-center px-5" style="display: flex">
                                        <a href="" ><button class="btn btn-info mr-1" data-toggle="modal" data-target="#show{{ $item["id"]}}"><i class="fa fa-eye"></i></button><a>
                                        <button type="button" class="btn btn-danger mr-1" data-toggle="modal" data-target="#delete{{ $item["id"]}}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                            </td>
                                    </td>
                                </tr>
                                @include('view_admin.global-modal.delete-modal',["id"=>$item["id"],'url'=>route('admin.user.userList.delete-user-admin',$item["id"])])
                                {{--
                                @include('view_admin.cause.edit',["cause"=>$item])
                                @include('view_admin.cause.show',["cause"=>$item])
                                @include('view_admin.global-modal.active-modal',["item"=>$item,'url'=>route('admin.cause.active', $item->id)])--}}

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucun Administrateur...</td>
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
{{-- @include('view_admin.user.list_user.user_admin.createAdmin'); --}}
@endsection

