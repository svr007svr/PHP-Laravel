@extends('layouts.app')

@section('content')

<div class="card card-default">
    {{isset($post) ? 'Edit Post' : 'Create Post'}}
</div>

<div class="card-body border">
    <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title : ''}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="5" rows="5" class="form-control" >{{isset($post) ? $post->description : ''}}</textarea>

        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
            <trix-editor input="content"></trix-editor>
        </div>

        @if(isset($post))
        <div class="form-group">
            <img src="{{asset($post->image)}}" alt="not available" style="width:100px">
        </div>
        @endif

        <div class="form-group">
            <label for="category">Category</label>
            <select name='category' id='category' class='form-control'>
            @foreach ($categories as $category)
            <option value='{{$category->id}}'
            @if(isset($post))
            @if($category->id == $post->category_id)
            selected
            @endif
            
            @endif >
            {{$category->name}}
            </option>
            @endforeach
                
    

        </div>



        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">

        </div>

        <div class="form-group">
            <button class="btn btn-success">
            {{isset($post) ? 'Update Post' : 'Add Post'}}
            </button>
        </div>



    </form>
</div>

    </form>


@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpicker('published_at')
    </script>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

