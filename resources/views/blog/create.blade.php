@extends('template')


@section('tabcontent')
@include("blog.header", ["active" => "blog"])


    <div class="container mb-5">
        <h4 class="text-center text-uppercase my-5" style="font-weight: bold">Add new post</h4>
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label><span class="text-danger">* </span> Title: </label>
                <input class="form-control" name="title" type="text" placeholder="Enter Post Title" required/>
            </div>

            <div class="form-group">
                <label><span class="text-danger">* </span> Select Category: </label>
                <select class="form-control" name="blog_category_id">
                    @foreach (App\BlogCategory::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Enter hash tags (separate by commas): </label>
                <input class="form-control" name="hash_tags" id="hash_tags" type="text" placeholder="Enter hash tags" />
            </div>
            <div class="form-group">
                <label><span class="text-danger">* </span>Content</label>
                <textarea name="content" id="content" class="form-control" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label>Choose File</label>
                <input type="file" class="form-control" name="blog_image" id="blog_image" placeholder="Choose file"/>
            </div>
            <div class="form-group">
                <label><span class="text-danger">* </span>Meta Title</label>
                <input class="form-control" name="meta_title" id="meta_title" type="text" placeholder="Enter meta title"/>
            </div>
            <div class="form-group">
                <label><span class="text-danger">* </span>Meta Description</label>
                <textarea class="form-control" name="meta_description" id="meta_description" rows="3" type="text" placeholder="Enter meta description"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-block general-bg" type="submit">Add</button>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-block btn-danger" href="/blog">Back</a>
                </div>
            </div>

        </form>
    </div>

    

@endsection