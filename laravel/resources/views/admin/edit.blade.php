@extends('admin')

@section('right')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="/admin/{{$inputs['module']}}/{{$inputs['id']}}" method="post">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}
                    @foreach($inputs['fields'] as $input)

                        @include('components.inputs', $input)

                    @endforeach
                </form>
            </div>
        </div>
    </div>

@endsection