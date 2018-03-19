@extends('admin')

@section('title', 'Страницы')

@section('right')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Страницы</div>

                    <div class="panel-body">

                        <div class="alert alert-success">
                            Список всех страниц, используемых на сайте
                        </div>

                        <div class="btn-group pull-right">
                            <a href="pages/create" class="btn btn-info"> <span class="glyphicon glyphicon-plus"></span>
                                Создать страницу</a>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="list-pages table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Заголовок</th>
                                    <th>Описание</th>
                                    <th>URL</th>
                                    <th>Опубл.</th>
                                    <th>Автор</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->title}}</td>
                                        <td>{{$page->small_desc}}</td>
                                        <td>{{$page->url}}</td>
                                        <td>{{$page->posted_status}}</td>
                                        <td>{{$page->creator}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/page/{{$page->url}}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <a class="btn btn-primary" href="/admin/pages/{{$page->id}}/edit"><span
                                                            class="glyphicon glyphicon-edit"></span></a>
                                                <a class="btn btn-danger" href="#" onclick="event.preventDefault();
                                                        document.getElementById('delete-{{$page->id}}').submit();"><span
                                                            class="glyphicon glyphicon-remove"></span></a>
                                                <form method="POST" id="delete-{{$page->id}}" class="hidden"
                                                      action="/admin/pages/{{$page->id}}">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection