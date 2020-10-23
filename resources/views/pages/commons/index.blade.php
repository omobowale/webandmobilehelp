@extends('template')


@section('tabcontent')


<div class="container-fluid m-0 p-0">

@include("pages.header", ["active" => "commonspage"])


<div class="page-tabs-content bg-secondary">
        <div class="commons">

            @foreach ($commoncontent as $content)
                <div class="container-fluid p-5 page-section border-bottom" id="{{$content->id}}" name="commons">
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
                                    <label for="section_button_text">Section Button Link (Optional)</label>
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

            



                
        </div>
    </div>
</div>
@endsection