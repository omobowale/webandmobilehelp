@extends('template')


@section('tabcontent')
  
<div class="table-responsive table-bordered">
  <p class="alert card-header mb-0">All Services</p>
  <table class="services-table table table-hover">
    <tr>
      <th>Service ID</th>
      <th>Service Name</th>
      <th>Service Icon</th>
      <th>Service Short Description</th>
      <th>Service Meta Title</th>
      <th>Service Meta Description</th>
      <th>Service Details</th>
      <th>Service Slug</th>
    </tr>
    @foreach ($services as $service)    
    <tr class="service-row" id="{{$service->id}}">
      <td>{{$service->id}}</td>
      <td>{{$service->name}}</td>
      <td><img class="service-icon" src="{{$service->icon}}" /></td>
      <td>{!!$service->short_description!!}</td>
      <td>{{$service->meta_title}}</td>
      <td>{{$service->meta_description}}</td>
      <td>{!!$service->details!!}</td>
      <td>{{$service->slug}}</td>
    </tr>
    @endforeach
  </table>
  <div class="text-center mt-5">
    <button class="general-bg px-3 py-2 border" data-target="#create-service-modal" data-toggle="modal"><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>Add new service</button>
  </div>
</div>

@endsection