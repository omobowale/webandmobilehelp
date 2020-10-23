@extends('template')

@section('tabcontent')
  
<div class="table-responsive table-bordered">
  <p class="alert card-header mb-0">Portfolio</p>
  <table class="portfolios-table table table-hover">
    <tr>
      <th>Portfolio ID</th>
      <th>Portfolio Name</th>
      <th>Portfolio Image</th>
      <th>Portfolio Link</th>
      <th>Portfolio Category</th>
      <th>Portfolio Description</th>
    </tr>
    @foreach ($portfolios as $portfolio)    
    <tr class="portfolio-row" id="{{$portfolio->id}}">
      <td>{{$portfolio->id}}</td>
      <td>{{$portfolio->name}}</td>
      <td><img class="portfolio-icon" src="{{$portfolio->imageUrl}}" /></td>
      <td>{!!$portfolio->portfolio_link!!}</td>
      <td>{{$portfolio->category}}</td>
      <td>{{$portfolio->short_description}}</td>
    </tr>
    @endforeach
  </table>
  <div class="text-center my-5">
    <button class="general-bg px-3 py-2 border" data-target="#create-portfolio-modal" data-toggle="modal"><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>Add new portfolio</button>
  </div>
</div>


<div class="table-responsive table-bordered">
  <p class="alert card-header mb-0">Portfolio Categories</p>
  <table class="portfolios-table table table-hover">
    <tr>
      <th>Category ID</th>
      <th>Category Name</th>
    </tr>
    @foreach ($categories as $category)    
    <tr class="category-row" id="{{$category->id}}">
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
    </tr>
    @endforeach
  </table>



  <div class="px-2 mb-5">
    <form id="add-new-category-form" method="post" action="/category" enctype="multipart/form-data">
      @csrf
      <p class="lead">Add a new category</p>
      <div class="form-group">
          <label for="name">Name:</label>
          <input class="form-control" id="name" name="name" type="text" placeholder="Enter category name" required/>
      </div>
      <button class="btn btn-block general-bg py-2">Add Category</button>
    </form>
  </div>



</div>

@endsection