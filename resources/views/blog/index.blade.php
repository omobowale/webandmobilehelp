@extends('template')


@section('tabcontent')

@include("blog.header", ["active" => "blog"])

<div class="bg-info fixed floating-button" title="Add new post" >
    <a href="/blog/create"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
</div>

    <div class="page-tabs-content">
    @if(isset($blogs) && count($blogs) > 0)
            <h4 class="text-center text-uppercase my-5" style="font-weight: bold">All posts</h4>
            @foreach ($blogs as $blog)
                <div class="card mb-5" style="cursor: pointer" onclick="location='/blog/{{$blog->id}}'" >
                    <div class="card-header general-bg-color text-white">
                        <p class="card-title lead">{{$blog->title}}</p>
                    </div>
                    <div class="card-body" style="position: relative">
                        <div class="pb-5">
                            {!!$blog->content!!}
                        </div>
                        <hr/>
                        <div style="">
                            <p class="p-0 m-0"><small class="general-text-color" style="font-weight: bold">Category: </small> {{$blog->category->name}}</p>
                            <p>
                                <small class="general-text-color" style="font-weight: bold">Hash Tags: </small>
                                {{$blog->getTags()}}
                            </p>
                            <p class="p-0 m-0"><small class="general-text-color" style="font-weight: bold">Date Posted: </small> {{$blog->created_at}}</p>
                        </div>
                    </div>
                    <div class="card-footer container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="general-text-color" style="font-weight: bold">Pending Comments : <span class="text-danger">{{$blog->comments()->where('status', 'Pending')->count()}}</span></div>
                                <div class="general-text-color" style="font-weight: bold">Approved Comments: <span class="text-success">{{$blog->comments()->where('status', 'Approved')->count()}}</span></div>
                                <div class="general-text-color" style="font-weight: bold"><a class="general-text-color" href="/comments/{{$blog->id}}"><span style="text-decoration: underline">View All Comments : </span><span class="text-info">{{$blog->comments()->count()}}</span></a></div>
                            </div>
                            <div class="col-md-4 text-center" style="display: grid; grid-template-columns: repeat(2, 1fr); align-items: center;">
                                    <div class="text-info"><a href="/blog/{{$blog->id}}/edit" class="text-info" style="font-weight: bold">Edit</a></div>
                                    <div class="text-danger" style="font-weight: bold">
                                        <form class="d-inline" action="/blog/{{$blog->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border:0; padding:0; background:none; font-weight: bold" class="text-danger ml-3">Delete</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </a> --}}
            @endforeach

            <div class="" style="width: 100%; display: grid; justify-content: center; align-items: center">{{ $blogs->links() }}</div>
            @else
                <div class="text-info mt-5">
                    No posts yet
                </div>
            @endif

        </div>





     
        
@endsection

