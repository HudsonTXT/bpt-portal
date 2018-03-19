@extends('layouts.app')

@section('title', 'Создание страницы')
@section('scripts')
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'html' );
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление страницы</div>
                    <div class="panel-body">
                        <form action="../pages" method="post">
                            {{csrf_field()}}

                            <div class="input-group col-md-12">
                                <label for="title">Заголовок страницы:</label>
                                <input type="text" class="form-control input-lg" id="title" name="title" value="{{ old('title') }}" placeholder="Введите заголовок (title) страницы..." required>
                            </div>
                            <div class="input-group col-md-12">
                                <label for="small_desc">Описание страницы:</label>
                                <input type="text" class="form-control input-lg" id="small_desc" value="{{ old('small_desc') }}" name="small_desc" placeholder="Введите описание (description) страницы..." required>
                                <div class="help-block">Данное поле будет выводиться в админ-панели и в теге meta description</div>
                            </div>
                            <div class="input-group col-md-12">
                                <label for="url">URL страницы:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">http://berpt.portal/</div>
                                    <input type="text" class="form-control input-md" id="url" name="url" value="{{ old('url') }}" placeholder="sample_page" required>

                                </div>
                                <div class="help-block">По этому адресу будет доступна страница</div>
                            </div>

                            <div class="input-group col-md-12">
                                <label for="html">Содержание страницы:</label>
                                <textarea name="html" id="html" cols="30" rows="10">{{ old('html') }}</textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <label>Страница опубликована?</label>
                                <br>
                                <input type="radio" id="postedYes"
                                       name="posted" value="1" checked>
                                <label for="postedYes">Да </label>

                                <input type="radio" id="postedNo"
                                       name="posted" value="0">
                                <label for="postedNo">Нет</label>
                                <div class="help-block">
                                    Если страница опубликована, она будет доступна всем пользователям.
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="submit" class="btn btn-primary" value="Создать страницу">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection