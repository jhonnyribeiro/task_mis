@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Editar usuário</h3>
        </div>
    </div>
    <hr class="mt-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input v-if="password_options == 'manual'" type="text" name="password" id="password"
                                   class="form-control">
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input v-model="password_options" type="radio" name="password_option"
                                       id="password_option" value="keep" checked>
                                Não mudar a senha
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input v-model="password_options" type="radio" name="password_option"
                                       id="password_option" value="auto"> Gerar nova
                                senha
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input v-model="password_options" type="radio" name="password_option"
                                       id="password_option" value="manual"> Alterar
                                manualmente
                            </label>
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
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!},

            }
        });
    </script>
@endsection
