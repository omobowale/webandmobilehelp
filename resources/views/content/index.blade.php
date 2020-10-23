@extends('template')


@section('tabcontent')

<div class="table-responsive table-bordered mt-5">
    <div class="card">
        <div class="card-header">
            <p class="card-title text-center lead">Content Details</p>
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
                        @endforeach
                        
                  </table>
            
        </div>
        
    </div>
</div>


@endsection