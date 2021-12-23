@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="col-md-6">
            <h3>Detalhes de usuário</h3>
        </div>
        <div class="col-md-6">
            <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
        </div>
    </div>
    <hr class="mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nome</label>
                    <pre>{{$user->name}}</pre>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <pre>{{$user->email}}</pre>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="roles">Papéis</label>
                    @foreach($user->roles as $role)
                        <pre>{{$role->display_name}}</pre>
                    @endforeach
                    <p>
                        @if($user->roles->count() == 0)
                            <small class="alert-danger">Esse usuário não tem nenhum papel definido ainda.</small>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
