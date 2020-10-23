@extends('template')

@section('tabcontent')
{{-- Settings table --}}
 <div class="table-responsive table-bordered settings-websitename-div">
  <table class="settings-table table table-hover">
    <tr>
      <th>Website Name</th>
    </tr>
    <tr class="webname-row" id="{{$settings->id}}">
        <td>{{$settings->webname}}</td>
    </tr>
  </table>
</div>


@endsection

