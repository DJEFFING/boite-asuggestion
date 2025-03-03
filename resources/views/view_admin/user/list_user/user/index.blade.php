@extends('view_admin.partials.app')
@section('content')
<div class="main-container">
    <div class="animated fadeIn">
        @if (!empty(session('message')))
            <div class="alert alert-primary" id="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        {{-- <strong class="card-title" style="float: right"><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addPost">
                            <i class="fa fa-plus"></i> Ajouter</button></strong> --}}

                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>DATE INSCRIPTION</th>
                                    <th>Nombre Suggestion</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user )
                                <tr>
                                    <td> {{ $loop->iteration  }} </td>

                                    <td> {{$user->pseudo }}
                                        @if ($user->roles()->where('titre','admin')->exists())
                                            <span class="badge badge-warning mr-1">admin</span>
                                        @endif
                                    </td>
                                    <td> {{ $user->created_at->format('Y-m-d') }} </td>
                                    <td> {{ $user->suggestions->count() }}</td>
                                    <td class="text-center" style="display: center">
                                        <a href=" {{ route('admin.user.userList.user_detaill',$user->id ) }} " ><button class="btn btn-info mr-1" data-toggle="modal" data-target="#show{{ $user->id}}"><i class="fa fa-eye"></i></button><a>
                                        <button class="btn btn-danger mr-1" title="Supprimer" data-toggle="modal" data-target="#delete{{ $user->id }}"><i class="fa fa-trash-o"></i></button>
                                        <button class="btn btn-primary mr-1" title="envoyer une notificaion" data-toggle="modal" data-target="#notify{{ $user->id }}"><i class="fa fa-pencil-square-o"></i></button>
                                        @if (!($user->roles()->where('titre','admin')->exists()))
                                        <button class="btn btn-success mr-1" title="role Admin" data-toggle="modal" data-target="#addAdmin{{ $user->id }}"><samp>role Admin</samp></button></td>
                                        @endif
                                    </td>
                                </tr>
                                @include('view_admin.global-modal.delete-modal',["id"=>$user->id ,'url'=>route('admin.user.userList.delete-user', $user->id )])
                                @include('view_admin.global-modal.add-admin-modal',["id"=>$user->id ,'url'=>route('admin.user.userList.createAdmin', $user->id )])
                                @include('view_admin.global-modal.notify-modal',["username"=>$user->pseudo, "id"=>$user->id ,'url'=>route('admin.user.userList.notify-user', $user->id )])

                                {{--
                                @include('view_admin.cause.edit',["cause"=>$item])
                                @include('view_admin.cause.show',["cause"=>$item])
                                @include('view_admin.global-modal.active-modal',["item"=>$item,'url'=>route('admin.cause.active', $item->id)])--}}

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucun utilisateur...</td>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $("#alert").fadeOut('slow');
        }, 5000); // 5 secondes
    });
</script>
@endsection

