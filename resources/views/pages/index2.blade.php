@extends('template')

@section('tabcontent')
@foreach ($pages as $page) 
<div class="container-fluid mb-5">
    <p class="pt-4"><span class="lead text-uppercase" id="page-title">{{$page->name}} PAGE</span></p>
    <div class="table-responsive table-bordered mb-5">
        <div class="card">
            <div class="card-header">
                <p class="card-title text-center lead">Titles and Descriptions</p>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>Page Name</th>
                        <th>Page Title</th>
                        <th>Page Description</th>
                        <th>Page Meta Title</th>
                        <th>Page Meta Description</th>
                    </tr>
                    <tr class="page-row" id="{{$page->id}}" title="{{$page->name}}">
                        <td>{{$page->name}}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->description}}</td>
                        <td>{{$page->meta_title}}</td>
                        <td>{{$page->meta_description}}</td>
                    </tr>
                </table>

                <div>
                    
                </div>
            </div>
            <div class="card-footer">
                <small class="text-info">Click on the row to edit details</small>
            </div>
        </div>
    </div>

    <div class="table-responsive table-bordered mt-5">
        <div class="card">
            <div class="card-header">
                <p class="card-title text-center lead">Content</p>
            </div>
            <div class="card-body">
                {{-- Current Emails go here --}}
                
                    <table class="table table-hover content-table">
                            <tr>
                                <th style="width: 10%">Page</th>
                                <th style="width: 30%">Item</th>
                                <th style="width: 60%">Value</th>
                            </tr>
                            @foreach ($contents as $content) 
                            @if($content->page_name === $page->name)
                                @if($content->item === "home_one_image")
                                    <tr class="content-row" id="{{$content->id}}" name="image" data-info="{{$content->info}}">
                                        <td>{{$content->page_name}}</td>
                                        <td>{{$content->item}}</td>
                                        <td name="image"><img class="logo-image" src={{$content->value}} /></td>
                                    </tr>
                                @else    
                                    <tr class="content-row" id="{{$content->id}}" data-info="{{$content->info}}">
                                        <td>{{$content->page_name}}</td>
                                        <td>{{$content->item}}</td>
                                        <td>{{$content->value}}</td>
                                    </tr>
                                @endif 
                            @endif 
                            @endforeach
                            
                      </table>
                
            </div>
            
        </div>
    </div>
</div>    
    @endforeach


@endsection