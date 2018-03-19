<div class="list-pages table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            @foreach($th as $t)
                <th>{{$t}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($tr as $td)
            <tr>
                @foreach($td as $k=>$te)
                    @if($k == count($td)-1)
                        @isset($edit)
                            <td>
                                <div class="btn-group">
                                    @if($edit['edit'])
                                        <a class="btn btn-primary" href="/admin/{{$edit['model']}}/{{$td[0]}}/edit"><span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                    @endif
                                    @if($edit['delete'])
                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault();
                                                document.getElementById('delete-{{$td[0]}}').submit();"><span
                                                    class="glyphicon glyphicon-remove"></span></a>
                                        <form method="POST" id="delete-{{$td[0]}}" class="hidden"
                                              action="/admin/{{$edit['model']}}/{{$td[0]}}">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                        </form>
                                    @endif
                                </div>
                            </td>
                        @endisset
                        @else
                    <td>{{ $te }}</td>
                    @endif

                @endforeach
            </tr>
        @endforeach
        </tbody>


    </table>
</div>