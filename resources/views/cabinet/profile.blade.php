@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('cabinet._nav', ['page' => 'profile'])

            <div class="col-md-8">
                <div class="tab-block-right tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="profile-block">
                            <form action="{{ route('cabinet.profile.update', $user) }}" method="post" class="form-active">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           name="name" value="{{ old('name', $user->name) }}" placeholder="Имя :">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                           value="{{ old('email', $user->email) }}" name="email" placeholder="Email :">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="button">
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div class="profile-block">

                            <form action="{{ route('cabinet.profile.changePassword', $user) }}" method="post" class="form-active">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Старый пароль :">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control {{ $errors->has('newPassword') ? 'is-invalid' : '' }}" name="newPassword" placeholder="Новый пароль :">
                                    @if ($errors->has('newPassword'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('newPassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control {{ $errors->has('newPassword_confirmed') ? 'is-invalid' : '' }}" name="newPassword_confirmed" placeholder="Повторите пароль :">
                                    @if ($errors->has('newPassword_confirmed'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('newPassword_confirmed') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="button">
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-post" role="tabpanel" aria-labelledby="v-pills-post-tab">

                    </div>
                    <div class="tab-pane fade" id="v-pills-create-post" role="tabpanel" aria-labelledby="v-pills-create-post-tab">...</div>
                </div>
            </div>

        </div>
    </div>
@endsection