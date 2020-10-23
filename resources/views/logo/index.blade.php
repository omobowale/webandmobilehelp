@extends('template')

@section('tabcontent')
    

<div class="table-responsive table-bordered logo-div" id="">
    <div class="card">
        <div class="card-header">
            <p class="card-title text-center lead">Logo</p>
        </div>
        <div class="card-body">
            {{-- Current Image for logo goes here --}}
            
                <table class="table table-hover logo-table">
                    <tr>
                      <th>Logo Name</th>
                      <th>Image</th>
                      <th>Image Alt</th>
                      <th>Currently in use</th>
                    </tr>
                    @foreach ($logos as $logo)
                        <tr id="{{$logo->id}}" class="logo">
                            <td>{{$logo->name}}</td>
                            <td><img class="logo-image" src="{{$logo->url}}" /></td>
                            <td>{{$logo->alt}}</td>
                            <td>{{$logo->current == '1'? "yes" : "no"}}</td>
                        </tr>
                    @endforeach
                  </table>
                
           
            <hr>
            <div class="new-logo-form">
                <form id="create-new-logo-form" method="POST" action="/logo" enctype="multipart/form-data">
                    @csrf
                    <h3>Choose New Logo</h3>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="api_token" value="{{ Auth::user()->api_token ?? ''}}" required />
                    </div>
                    <div class="form-group">
                        <label>Logo Name</label>
                        <input class="form-control" type="text" name="name" id="name" required />
                    </div>
                    <div class="form-group">
                        <label>Choose Logo <small class="text-danger" style="font-weight: bold"> Only .jpeg, .jpg and .png files are supported. (Max. Size : 2MB)</small></label>
                        <input class="form-control" type="file" name="logo" id="logo" required />
                    </div>
                    <div class="form-group">
                        <label>Logo Alt</label>
                        <input class="form-control" type="text" name="alt" id="alt" />
                    </div>
                    <div class="form-group">
                        <label>Set as current logo</label>
                        <select class="form-control" name="current" id="current">
                            <option value="0">no</option>
                            <option value="1">yes</option>
                        </select>
                    </div>
                    <button class="general-bg px-3 py-2 text-white border" type="submit">Upload</button>
                </form>
            </div>
        </div>
        
    </div>
</div>

@endsection