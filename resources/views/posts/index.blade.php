@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Posts</a>
    </div>

    <div class="card card-default">
    <div class="card-header">Posts</div>
    </div>

    <div class="card-body">

        <table class="table">

            <thead>
            <th>Image</th>
            <th>Title</th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            @foreach($posts as $post)

            <tr>
                <td>
                    <img src="{{asset($post->image)}}" alt="" height="25" width="25">
                </td>
            <td>
                {{$post->title}}
            </td>
                <td>
                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Trash</button>
                </form>
                </td>
            </tr>


            @endforeach
            </tbody>

        </table>

    </div>

@endsection
