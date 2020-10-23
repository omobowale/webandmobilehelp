@extends('template')


@section('tabcontent')


<div class="container-fluid m-0 p-0">
    @include("pages.header", ["active" => "blogpage"])


<div class="page-tabs-content bg-secondary">
        <div class="blogpage">

            <div class="page-meta-content bg-white border p-5" id="{{$pagecontent->id}}">
                <p class="edit text-success text-center">Click to edit</p>
                <div class="" >
                    <p class="general-text-color" style="font-weight: bold">Meta Title : <span class="text-info" id="page_meta_title">{{$pagecontent->meta_title}}</span></p>
                    <p class="general-text-color" style="font-weight: bold">Meta Description : <span class="text-info" id="page_meta_description">{{$pagecontent->meta_description}}</span></p>
                </div>
            </div>

            <div class="page-top-content bg-white border p-5" id="{{$pagecontent->id}}">
                <p class="edit text-success text-center">Click to edit</p>
                <div class="" >
                    <h2 id="page_introduction">{{$pagecontent->introduction}}</h2>
                    <input type="hidden" id="page_introduction_info" value="{{$pagecontent->introduction_info}}" />
                    <button id="page_button_text" class="btn general-bg">{{$pagecontent->button_text}}</button>
                    <input type="hidden" id="page_button_text_info" value="{{$pagecontent->button_text_info}}" />
                    <input type="hidden" id="page_button_link" value="{{$pagecontent->button_link}}" />
                    <input type="hidden" id="page_button_link_info" value="{{$pagecontent->button_link_info}}" />
                </div>
            </div>

            @foreach ($blogcontent as $content)

                <div class="container-fluid p-5 page-section border-bottom" id="{{$content->id}}" name="blogpage">
                    <p class="edit text-success text-center">Click to edit</p>
                    <p class="text-white text-uppercase lead" style="font-weight: bold" id="section_title">{{$content->section_title}}</p>
                    <input type="hidden" id="section_title_info" value="{{$content->section_title_info}}" />
                    <p id="section_description">{{$content->section_description}}</p>
                    <input type="hidden" id="section_description_info" value="{{$content->section_description_info}}" />
                    @if(strlen($content->section_button_text) > 1)
                    <button onclick="alertText()" id="section_button" class="btn general-bg">{{$content->section_button_text}}</button>
                    <input type="hidden" id="section_button_text_info" value="{{$content->section_button_text_info}}" />
                    <input type="hidden" id="section_button_link" value="{{$content->section_button_link}}" />
                    <input type="hidden" id="section_button_link_info" value="{{$content->section_button_link_info}}" />
                @endif
                </div>

            @endforeach


                <div class="modal offset-md-3 col-md-6" id="edit-page-content-modal">
                    <form id="edit-page-content-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Edit Content</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="section_title">Section Title (Optional) : </label>
                                    <input type="text" class="form-control"  name="section_title" id="section_title"/>
                                    <small class="text-danger" id="edit-section_title_info"></small>
                                </div>
                                <div class="form-group">
                                    <label for="section_description">Section Description (Optional) : </label>
                                    <textarea rows="5" class="form-control"  name="section_description" id="section_description"></textarea>
                                    <small class="text-danger" id="edit-section_description_info"></small>
                                </div>
                                <div class="form-group">
                                    <label for="section_button_text">Section Button Text (Optional) : </label>
                                    <input type="text" class="form-control"  name="section_button_text" id="section_button_text" />
                                    <small class="text-danger" id="edit-section_button_text_info"></small>
                                </div>
                                <div class="form-group">
                                    <label for="section_button_text">Section Button Link (Optional) : </label>
                                    <input type="text" class="form-control"  name="section_button_link" id="section_button_link" />
                                    <small class="text-danger" id="edit-section_button_link_info"></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" data-target="#modal" class="bg-danger py-2 px-3 border">Cancel</button>
                                <button type="submit" class="general-bg py-2 px-3 border">Update</button>
                            </div>
                        </div>
                    </form>
            </div>


                <div class="modal offset-md-3 col-md-6" id="edit-page-top-content-modal">
                    <form id="edit-page-top-content-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Edit Content</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="edit_page_introduction">Page Introduction: </label>
                                    <textarea rows="5" class="form-control" name="page_introduction" id="edit_page_introduction" required></textarea>
                                    <small class="text-danger" id="edit_page_introduction_info"></small>
                                </div>
                                <div class="form-group">
                                    <label for="edit_page_button_text">Page Button Text</label>
                                    <input type="text" class="form-control" name="page_button_text" id="edit_page_button_text" required/>
                                    <small class="text-danger" id="edit_page_button_text_info"></small>
                                </div>
                                <div class="form-group">
                                    <label for="edit_page_button_link">Page Button Link</label>
                                    <input type="text" class="form-control"  name="page_button_link" id="edit_page_button_link" required/>
                                    <small class="text-danger" id="edit_page_button_link_info"></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" data-target="#modal" class="bg-danger py-2 px-3 border">Cancel</button>
                                <button type="submit" class="general-bg py-2 px-3 border">Update</button>
                            </div>
                        </div>
                    </form>
            </div>

                <div class="modal offset-md-3 col-md-6" id="edit-page-meta-content-modal">
                    <form id="edit-page-meta-content-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Edit Meta</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="edit_page_meta_title">Meta Title</label>
                                    <input type="text" class="form-control" name="page_meta_title" id="edit_page_meta_title" required/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_page_meta_description">Meta Description: </label>
                                    <textarea rows="5" class="form-control" name="page_meta_description" id="edit_page_meta_description" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" data-target="#modal" class="bg-danger py-2 px-3 border">Cancel</button>
                                <button type="submit" class="general-bg py-2 px-3 border">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection