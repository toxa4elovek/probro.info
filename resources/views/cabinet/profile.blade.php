@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('cabinet._nav', ['page' => 'profile'])

            <div class="col-md-8">
                <div class="tab-block-right tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="profile-block">
                            <form action="#" method="post" class="form-active">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="login" placeholder="Логин :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email :">
                                </div>
                                <div class="button">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div class="profile-block">
                            <form action="#" method="post" class="form-active">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="old-password" placeholder="Старый пароль :">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="new-password" placeholder="Новый пароль :">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm-password" placeholder="Повторите пароль :">
                                </div>
                                <div class="button">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
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