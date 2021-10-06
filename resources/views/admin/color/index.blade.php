@extends('admin.layout.master')
@section('content')
<div>
    <a href="{{route('color.create')}}" class="btn btn-success">Create Color</a>
</div>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Option</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($color as $cr)
        <tr>
            <td>{{$cr->id}}</td>
            <td>{{$cr->name}}</td>
            <td>
                <a href="{{route('color.edit',$cr->id)}}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{route('color.destroy',$cr->id)}}" class="d-inline"
                    onsubmit="return confirm('are you sure?')" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete" name="" id="">
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{$color->links()}}
@endsection
