@extends('layouts.app')


@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'category'])
        <div class="row">



            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Статус</th>
                    <th>Количество постов</th>
                </tr>
                <tr>
                    <form class="form-inline" action="?">
                        <th>
                            <div class="form-group mb-2">
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}" placeholder="Имя">
                            </div>
                        </th>
                        <th>
                            <div class="form-group mb-2">
                                <input type="text" name="email" value="{{ request('email') }}" class="form-control" placeholder="email">
                            </div>
                        </th>
                        <th>
                            <div class="form-group mb-2">
                                <select name="status" class="form-control">
                                    <option value="">Выберите статус</option>
                                    @foreach($statuses as $key => $status)
                                        <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                        <th>
                            <div class="form-group mb-2">
                                <select name="role" class="form-control">
                                    <option value="">Выберите роль</option>
                                    @foreach($roles as $key => $role)
                                        <option value="{{ $key }}" {{ request('role') === $key ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                    <th>

                    </th>
                    <th><button type="submit" class="btn btn-primary mb-2">Поиск</button></th>


                    </form>
                </tr>

                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            @if ($user->isActive())
                                <span class="badge badge-success">Активен</span>
                            @else
                                <span class="badge badge-secondary">Ожидает подтверждение</span>
                            @endif
                        </td>

                        <td>
                            @if ($user->isAdmin())
                                <span class="badge badge-primary">Админ</span>
                            @else
                                <span class="badge badge-info">Пользователь</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <h4><span class="badge badge-light">{{ $user->posts->count() }}</span></h4>
                        </td>

                        <td>
                            @if(!$user->isActive())
                                <form action="{{ route('admin.users.verify', $user) }}" method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->appends($conditions)->links() }}

        </div>
    </div>

@endsection