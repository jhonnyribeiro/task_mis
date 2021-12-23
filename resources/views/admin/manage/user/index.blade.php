@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Gestão de Usuários</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Novo</a>
    </div>
</div>
<hr class="mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Criação</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                 <tr>
                     <td>{{ $count++ }}</td>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->created_at }}</td>
                     <td>
                         <a href="" class="btn btn-sm btn-secondary"><i class="fa fa-info"></i></a>
                         <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                         <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                     </td>
                 </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
