@extends('admin')

@section('right')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('components.grid', $grid)
            </div>
        </div>
    </div>

    @endsection