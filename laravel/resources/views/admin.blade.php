@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Управление</div>
                <div class="panel-body">
                    <nav>
                        <ul class="nav">
                            <li><a href="/admin/settings/">Настройки</a></li>
                            <li><a href="/admin/pages/">Страницы</a></li>
                            <li><a href="/admin/users/">Пользователи</a></li>
                            <li><a href="/admin/menus/">Меню</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        @yield('right')

    </div>

</div>
    @endsection



