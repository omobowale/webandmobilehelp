@extends('template')


@section('tabcontent')

    @include("blog.header", ["active" => "blogcategory"])

    <div class="page-tabs-content">
        @if(isset($blogcategories) && count($blogcategories) > 0)
            <table class="table">
                <tr>
                    <th>S/N</th>
                    <th>Category</th>
                </tr>
            @foreach ($blogcategories as $index => $blogcategory)
                <tr class="blog-category-row" id="{{$blogcategory->id}}">
                    <td>{{$index + 1}}</td>
                    <td>{{$blogcategory->name}}</td>
                </tr>
            @endforeach
            </table>

        @endif
    </div>


    <div class="mt-5">
        <h4 class="text-center">Add New Category</h4>
        <form method="POST" action="/blogcategory">
            @csrf
            <div class="form-group">
                <label>Name: </label>
                <input class="form-control" type="text" placeholder="Enter name of category" name="name" id="name"  />
            </div>
            <button class="btn btn-block general-bg-color text-white" type="submit">Add</button>
        </form>
    </div>
     
    <div class="modal offset-md-2 col-md-8" id="edit-blog-category-modal">
        <div class="modal-content">
            <form id="edit-blog-category-form" method="POST" > 
                @csrf               
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name: </label>
                        <input class="form-control" type="text" placeholder="Enter name of category" name="name" id="name"  />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-block general-bg-color text-white" type="submit">Update</button>
                </div>
            </form>
        </div>
        <div class="bg-dark py-2 text-center">
            <form class="" id="delete-blog-category-form" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger delete">Delete</button>
            </form>
            
        </div>
    </div>
     
        
@endsection

