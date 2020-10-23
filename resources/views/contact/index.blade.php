@extends('template')


@section('tabcontent')
  
<div class="table-responsive table-bordered">
  <p class="alert card-header mb-0">Contact Details</p>
  <table class="services-table table table-hover">
    <tr>
      <th>Contact ID</th>
      <th>Location</th>
      <th>Address</th>
      <th>Email</th>
      <th>Email Contactable</th>
      <th>Phone</th>
    </tr>
    @foreach ($contacts as $contact)    
    <tr class="contact-row" id="{{$contact->id}}">
      <td>{{$contact->id}}</td>
      <td>{{$contact->location}}</td>
      <td>{{$contact->address}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->email_contactable ? "yes" : "no"}}</td>
      <td>{{$contact->phone}}</td>
    </tr>
    @endforeach
  </table>
  <div class="text-center mt-5">
    <button class="general-bg px-3 py-2 border" data-target="#create-contact-modal" data-toggle="modal"><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>Add new contact</button>
  </div>
</div>

@endsection