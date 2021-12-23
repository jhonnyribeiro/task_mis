@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Novo usuário</h3>
        </div>
    </div>
    <hr class="mt-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input v-if="!auto_password" type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-check">
                            <input v-model="auto_password" type="checkbox" name="auto_generate" id="auto_generate"
                                   class="form-check-input">
                            <label for="auto_generate">Gerar senha automaticamente</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="roles">Papéis:</label>
                        <input type="hidden" name="roles" :value="rolesSelected">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    @foreach($roles as $role)
                                        <p>
                                            <label class="form-check-label">
                                                <input v-model="rolesSelected" type="checkbox" name="rolesSelected"
                                                       id="rolesSelected" value="{{ $role->id }}">
                                                <em>{{ $role->display_name }}</em>
                                            </label>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                auto_password: true,
                rolesSelected: []
            }
        });
    </script>
@endsection
