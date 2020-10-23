@extends('template')


@section('tabcontent')
<div class="table-responsive table-bordered mt-5 contact-div">
    <div class="card">
        <div class="card-header">
            <p class="card-title text-center lead">Admins</p>
        </div>
        <div class="card-body">
            {{-- Current Admins go here --}}
            
                <table class="table table-hover admins-table">
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                    </tr>
                    @foreach ($admins as $key => $admin)
                        <tr class="admin-row" id="{{$admin->id}}">
                            <td>{{$key + 1}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->role}}</td>
                        </tr>
                    @endforeach
                </table>
       
            <hr>
            <div class="text-center mt-5">
                <a class="bg-info px-3 py-2 border" href="/register"><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>Add new admin</a>
            </div>
        </div>
        
    </div>
</div>
@endsection