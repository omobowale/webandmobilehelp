@extends('template')


@section('tabcontent')
<div class="table-responsive table-bordered mt-5">
    <div class="card">
        <div class="card-header">
            <p class="card-title text-center lead">Footer Details</p>
        </div>
        <div class="card-body">
            {{-- Current Emails go here --}}
            
                <table class="table table-hover footer-table">
                    <tr>
                      <th>Website Name</th>
                      <th>Website Description</th>
                      <th>Copyrights Statement</th>
                    </tr>
                        <tr class="footer-row" id="{{$footer->id}}">
                            <td>{{$footer->webname}}</td>
                            <td>{{$footer->webdescription}}</td>
                            <td>{{$footer->copyrightstatement}}</td>
                        </tr>
                  </table>
                
           
            <hr>
            
        </div>
        
    </div>
</div>

@endsection