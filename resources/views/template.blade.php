@extends('layouts.app')

@section('content')
<div class="container-fluid mt-0">
    {{ session('status') }}
    <div class="row border border-secondary">

    
          {{-- Left Side Bar --}}
          <div class="col-md-2 left-sidebar text-white p-0 fixed-left">
            <div class="profile-picture text-center pt-5 pb-3">
              <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
              <p class="lead pt-3 text-uppercase">{{Auth::user()->name}}</p>
              <hr/>
            </div>
            <div class="menu-list">
              <div class="accordion" id="">
                <div class="lead border border-primary menu-name pl-3 pb-3 pt-4" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <p><i class="fa fa-columns text-primary mr-2" aria-hidden="true"></i>
                    <span class="label"><a href="/homepage">Site Pages</a></span>
                  </p>
                </div>
              </div>


              <div class="accordion" id="site-content">
                <div class="lead border border-primary menu-name pl-3 pb-3 pt-4" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  <p><i class="fa fa-briefcase text-primary mr-2" aria-hidden="true"></i>
                    <span class="label">Site Content</span><i class="fa fa-arrow-circle-down ml-3" aria-hidden="true"></i>
                  </p>
                </div>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingTwo" data-parent="#site-content">
                  <ul class="py-4" style="list-style: none; padding:0; padding-left:1.2em; background-color:#24344b">
                    <li class="link3" id="logo" name="logo"><a href="/logo">Site Logo</a></li>    
                    <li class="link3" id="services"><a href="/service">All Services</a></li>          
                    <li class="link3" id="portfolio"><a href="/portfolio">Portfolio</a></li>          
                    <li class="link3" id="team-members"><a href="/team">Team Members</a></li>          
                    <li class="link3" id="contact-details"><a href="/contact">Contact Details</a></li>          
                    <li class="link3" id="blog"><a href="/blog">Blog</a></li>          
                  </ul>
                </div>
              </div>
              

              <div class="accordion" id="site-sections">
                <div class="lead border border-primary menu-name pl-3 pb-3 pt-4" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <p><i class="fa fa-bars text-primary mr-2" aria-hidden="true"></i>
                    <span class="label">Site Sections</span><i class="fa fa-arrow-circle-down ml-3" aria-hidden="true"></i>
                  </p>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#site-sections">
                  <ul class="py-4" style="list-style: none; padding:0; padding-left:1.2em; background-color:#24344b">
                      {{-- <li>Header</li>
                      <li><a href="showcontent">Body</a></li> --}}
                      <li><a href="/footer">Footer</a></li>
                  </ul>
                </div>
              </div>

              

              <div class="accordion" id="site-others">
                <div class="lead border border-primary menu-name pl-3 pb-3 pt-4" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  <p><i class="fa fa-plus text-primary mr-2" aria-hidden="true"></i>
                    <span class="label">Site Others</span><i class="fa fa-arrow-circle-down ml-3" aria-hidden="true"></i>
                  </p>
                </div>
                <div id="collapseFour" class="collapse show" aria-labelledby="headingTwo" data-parent="#site-others">
                  <ul class="py-4" style="list-style: none; padding:0; padding-left:1.2em; background-color:#24344b">
                    <li class="link2"><a href="/settings">Settings</a></li>      
                    @if(Auth::user()->role == "superadmin")
                      <li class="link2"><a href="/admin">Edit Admins</a></li>      
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>

        {{-- Middle Side Bar --}}
        <div class="col-md-9">
          {{-- <p class="pt-4"><span class="lead text-uppercase" id="page-title">HOME PAGE</span></p> --}}
          
          @yield('tabcontent')

          {{-- Included view section
          @include('service.index')
          @include('team.index')
          @include('homepage.index')
          @include('aboutpage.index')
          @include('servicespage.index')
          @include('contactpage.index')
          @include('logo.index')
          @include('address.index')
          @include('email.index')
          @include('phone.index') --}}
          
        </div>

      {{-- Right side bar --}}
      <div class="col-md-1 right-sidebar p-0">
          <p class="text-center py-2"><a href="https://webandmobilehelp.com" target="_blank">Show main site</a></p>
      </div>
        
    </div>



    {{-- Modal section --}}
    @include('pages.edit')
    @include('service.create')
    @include('service.edit')
    @include('portfolio.create')
    @include('portfolio.edit')
    @include('category.edit')
    @include('team.create')
    @include('team.edit')
    @include('content.edit')
    @include('logo.edit')
    @include('contact.create')
    @include('contact.edit')
    @include('settings.edit')
    @include('admins.edit')
    @include('footer.edit')

</div>


<div class="container-fluid px-0">
  <div class="footer py-3 text-center text-white" >
    <p>Copyrights &copy; 2020</p>
    <hr />
    <p>WebAndMobileHelp</p>
  </div>
</div>
@endsection
