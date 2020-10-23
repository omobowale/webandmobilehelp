@extends('template')



@section('tabcontent')
{{-- Members table --}}
 <div class="table-responsive table-bordered members-div">
 <table class="members-table table table-hover">
    <tr>
      <th>Member Id</th>
      <th>Member Name</th>
      <th>Member Role</th>
      <th>Member Gender</th>
      <th>Member Photo</th>
    </tr>
    @foreach ($members as $member)
        <tr class="member-row" id="{{$member->id}}">
          <td>{{$member->id}}</td>
          <td>{{$member->name}}</td>
          <td>{{$member->role}}</td>
          <td>{{$member->gender}}</td>
          <td>@if($member->photo) <img src="{{$member->photo}}" class="member-image"/> @endif</td>
        </tr>
    @endforeach

  </table>
  <div class="text-center mt-5">
    <button class="bg-info px-3 py-2 border" data-target="#create-member-modal" data-toggle="modal"><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>Add new member</button>
  </div>
</div>

@endsection