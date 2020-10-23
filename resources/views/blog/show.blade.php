@extends('template')


@section('tabcontent')
@include("blog.header", ["active" => "blog"])
      
    @if(isset($blog))
        <div class="page-tabs-content p-5">
            <div class="text-center mb-4">
                <img src="{{$blog->blog_image_url ?? '/storage/images/blog_default_image.png'}}" alt="webandmobilehelp_blog_image" style="height: 20em; width:80%"/>
            </div>
            <p class="lead px-5">{{$blog->title}}</p>
            <div class="px-5">
                {!!$blog->content!!}
            </div>
            
            <div class="px-5">
                <hr/>
                <div class="general-text-color" style="font-weight: bold">Pending Comments : <span class="text-danger">{{$blog->comments()->where('status', 'Pending')->count()}}</span></div>
                <div class="general-text-color" style="font-weight: bold">Approved Comments: <span class="text-success">{{$blog->comments()->where('status', 'Approved')->count()}}</span></div>
                <div class="general-text-color" style="font-weight: bold"><a class="general-text-color" href="/comments/{{$blog->id}}"><span style="text-decoration: underline">View All Comments : </span><span class="text-info">{{$blog->comments()->count()}}</span></a></div>
            </div>

            <div class="px-5">
                <hr/>
                <p><small class="general-text-color" style="font-weight: bold">Category: </small>{{$blog->category->name}}</p>
                <p>
                    <small class="general-text-color" style="font-weight: bold">Hash Tags: </small>
                    {{$blog->getTags()}}
                </p>
                <p><small class="general-text-color" style="font-weight: bold">Meta Title: </small>{{$blog->meta_title}}</p>
                <p><small class="general-text-color" style="font-weight: bold">Meta Description: </small>{{$blog->meta_description}}</p>
                <hr />
            </div>
            <div class="text-center">
                <a href="/blog/{{$blog->id}}/edit" class="text-info" style="font-weight: bold">Edit</a>
                <form class="d-inline" action="/blog/{{$blog->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="border:0; padding:0; background:none; font-weight: bold" class="text-danger ml-3">Delete</button>

                </form>
            </div>
        </div>
    
    @endif

    <div class="text-center mb-5">
        <a href="/blog" class="btn general-bg-color">Back</a>
    </div>
     
        
@endsection

