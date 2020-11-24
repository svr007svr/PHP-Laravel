@extends('layouts.app')



@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create')}}" class="btn btn-success"> Add Category </a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <th>Name</th>
         
            <th>Posts Count</th>
  
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>

                        {{$category->name}}
                        <button class="btn btn-danger btn-sm btn-info btn-default float-right m-1" onclick="handleDelete( {{ $category->id }} )">Delete</button>

                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success btn-info btn-sm btn-default float-right m-1">Edit</a>

                    </td>
             
                    <td>
                {{$category->posts->count()}}
                    </td>
                </tr>


            @endforeach


            </tbody>


        </table>


        <!-- Button trigger modal -->
    {{--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteeModal">--}}
    {{--            Launch demo modal--}}
    {{--        </button>--}}

    <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">



                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')


                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure you want to delete this category ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Go Back</button>
                            <button type="submit" class="btn btn-primary btn-danger">Yes,Delete</button>
                        </div>
                    </div>


            </form>
        </div>


    </div>


@endsection


@section('script')
    <script>
        function handleDelete(id){

            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')

        }
    </script>
@endsection
