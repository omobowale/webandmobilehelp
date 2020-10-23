<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- font-awesome link --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    {{-- Google font --}}
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary py-4 text-white shadow-sm">
            <div class="container pl-0 ml-0">
                {{-- @inject('logo', 'App\Logo')
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo-image" src="{{ $logo->getCurrentLogo()->url }}" alt={{$logo->getCurrentLogo()->alt}} />
                </a> --}}

                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ env('APP_NAME'), '' }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-5">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                
                            @endif --}}
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role == "superadmin")
                                      <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register New Admin') }}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                   
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    



    
    <script>
        
    </script>

    {{-- <script src="https://cdn.tiny.cloud/1/i6ae63xfmigcz59ae0b14s7m0rs34uw4yqplit2papu5x64s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea.details',
        height: 500,
        menubar: true,
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
        ],
        a11y_advanced_options: true,
        paste_data_images: true,
        toolbar: 'paste undo redo | formatselect image | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
</script> --}}
   <script>
        //Allow window to load before making ajax request
        window.addEventListener('load', function(){
            

            CKEDITOR.replace('content', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                imageUploadUrl :  "{{route('ckeditor.upload2', ['_token' => csrf_token()])}}",//'/uploader/upload.php?type=Images';
                uploadUrl: "{{route('ckeditor.upload2', ['_token' => csrf_token() ])}}"
            });

            CKEDITOR.replace('details', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                imageUploadUrl :  "{{route('ckeditor.upload2', ['_token' => csrf_token()])}}",//'/uploader/upload.php?type=Images';
                uploadUrl: "{{route('ckeditor.upload2', ['_token' => csrf_token() ])}}"
            });

            CKEDITOR.replace('edit-details', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                imageUploadUrl :  "{{route('ckeditor.upload2', ['_token' => csrf_token()])}}",//'/uploader/upload.php?type=Images';
                uploadUrl: "{{route('ckeditor.upload2', ['_token' => csrf_token() ])}}"
            });
            

            // PAGES SECTION
                // =============================================================================
                // When a section in the "pages" page is clicked
                // =============================================================================
                $(".page-meta-content").click(function(e){
                    var page_id = $(this).attr("id");
                    var page_meta_title = $(this).find("#page_meta_title").text();
                    var page_meta_description = $(this).find("#page_meta_description").text();
                    
                    $("#edit-page-meta-content-modal").modal('toggle');
                    $("#edit-page-meta-content-modal").find("#edit_page_meta_title").val(page_meta_title);
                    $("#edit-page-meta-content-modal").find("#edit_page_meta_description").val(page_meta_description);
                    $("#edit-page-meta-content-form").attr("action", '/page/'+ page_id);
                    
                });

                $(".core-value-row").click(function(e){
                    var core_value_id = $(this).attr("id");
                    var core_value_label = $(this).find("td:nth-child(2)").text();
                    var core_value_value = $(this).find("td:nth-child(3)").text();
                    
                    $("#core-value-content-modal").modal('toggle');
                    $("#core-value-content-modal").find("#core_value_label").val(core_value_label);
                    $("#core-value-content-modal").find("#core_value_value").val(core_value_value);
                    $("#core-value-content-form").attr("action", '/corevalue/'+ core_value_id);
                    $("#delete-core-value-form").attr("action", '/corevalue/' + core_value_id);
                    
                });



                $(".page-top-content").click(function(e){
                    var page_id = $(this).attr("id");
                    var page_introduction = $(this).find("#page_introduction").text();
                    var page_introduction_info = $(this).find("#page_introduction_info").val();
                    var page_button_text = $(this).find("#page_button_text").text();
                    var page_button_text_info = $(this).find("#page_button_text_info").val();
                    var page_button_link = $(this).find("#page_button_link").val();
                    var page_button_link_info = $(this).find("#page_button_link_info").val();
                    
                    $("#edit-page-top-content-modal").modal('toggle');
                    $("#edit-page-top-content-modal").find("#edit_page_introduction").val(page_introduction);
                    $("#edit-page-top-content-modal").find("#edit_page_introduction_info").text(page_introduction_info);
                    $("#edit-page-top-content-modal").find("#edit_page_button_text").val(page_button_text);
                    $("#edit-page-top-content-modal").find("#edit_page_button_text_info").text(page_button_text_info);
                    $("#edit-page-top-content-modal").find("#edit_page_button_link").val(page_button_link);
                    $("#edit-page-top-content-modal").find("#edit_page_button_link_info").text(page_button_link_info);
                    $("#edit-page-top-content-form").attr("action", '/page/'+ page_id);
                    
                    
                });

                $(".page-section").click(function(e){
                    var pagename = $(this).attr("name");
                    var section_id = $(this).attr("id");
                    var section_title = $(this).find("#section_title").text();
                    var section_title_info = $(this).find("#section_title_info").val();
                    var section_description = $(this).find("#section_description").text();
                    var section_description_info = $(this).find("#section_description_info").val();
                    var section_button_text = $(this).find("#section_button").text();
                    var section_button_text_info = $(this).find("#section_button_text_info").val();
                    var section_button_link = $(this).find("#section_button_link").val();
                    var section_button_link_info = $(this).find("#section_button_link_info").val();
                    
                    $("#edit-page-content-modal").modal('toggle');
                    $("#edit-page-content-modal").find("#section_title").val(section_title);
                    $("#edit-page-content-modal").find("#edit-section_title_info").text(section_title_info);
                    $("#edit-page-content-modal").find("#section_description").val(section_description);
                    $("#edit-page-content-modal").find("#edit-section_description_info").text(section_description_info);
                    $("#edit-page-content-modal").find("#section_button_text").val(section_button_text);
                    $("#edit-page-content-modal").find("#edit-section_button_text_info").text(section_button_text_info);
                    $("#edit-page-content-modal").find("#section_button_link").val(section_button_link);
                    $("#edit-page-content-modal").find("#edit-section_button_link_info").text(section_button_link_info);
                    $("#edit-page-content-form").attr("action", '/' + pagename + "/" + section_id);
                    
                    
                });


            // ADMINS SECTION
                // =============================================================================
                // When the rows in the "pages" table are clicked
                // =============================================================================
                $(".admin-row").click(function(e){
                    var admin_id = $(this).attr("id");
                    var admin_name = $(this).find("td:nth-child(2)").text();
                    var admin_email = $(this).find("td:nth-child(3)").text();
                    var admin_role = $(this).find("td:nth-child(4)").text();
                    // console.log(pageTitle, pageName, pageDescription);
                    $("#edit-admin-modal").modal('toggle');
                    $("#edit-admin-modal").find("#name").val(admin_name);
                    $("#edit-admin-modal").find("#email").val(admin_email);
                    $("#edit-admin-modal").find("#role").val(admin_role);
                    $("#edit-admin-form").attr("action", '/admin/'+ admin_id);
                    $("#delete-admin-form").attr("action", '/admin/' + admin_id);
                    
                });



            // SERVICES SECTION
                // =============================================================================
                // When any row of the SERVICES table is clicked
                // =============================================================================

                $(".service-row").click(function(e){
                    var service_id = $(this).attr("id");
                    var service_name = $(this).find("td:nth-child(2)").text();
                    var service_short_description = $(this).find("td:nth-child(4)").html();
                    var service_meta_title = $(this).find("td:nth-child(5)").html();
                    var service_meta_description = $(this).find("td:nth-child(6)").html();
                    var service_details = $(this).find("td:nth-child(7)").html();
                    var service_slug = $(this).find("td:nth-child(8)").text();

                    $("#edit-service-modal").modal('toggle');
                    $("#edit-service-modal").find("#name").val(service_name);
                    $("#edit-service-modal").find("#slug").val(service_slug);
                    $("#edit-service-modal").find("#short_description").val(service_short_description);
                    $("#edit-service-modal").find("#meta_title").val(service_meta_title);
                    $("#edit-service-modal").find("#meta_description").val(service_meta_description);
                    CKEDITOR.instances['edit-details'].setData(service_details);
                    $("#edit-service-form").attr("action", '/service/' + service_id);
                    $("#delete-service-form").attr("action", '/service/' + service_id);
                    
                });


            // BLOG CATEGORY SECTION
                // =============================================================================
                // When the rows in the "blog category" table are clicked
                // =============================================================================
                $(".blog-category-row").click(function(e){
                    var blog_category_id = $(this).attr("id");
                    var blog_category_name = $(this).find("td:nth-child(2)").text();
                    $("#edit-blog-category-modal").modal('toggle');
                    $("#edit-blog-category-modal").find("#name").val(blog_category_name);
                    $("#edit-blog-category-form").attr("action", '/blogcategory/'+  blog_category_id);
                    $("#delete-blog-category-form").attr("action", '/blogcategory/' + blog_category_id); 
                });

                
            // COMMENT SECTION
                // =============================================================================
                // When the rows in the "comments" table are clicked
                // =============================================================================
                $(".comment-content").click(function(e){
                    var comment_id = $(this).parent().attr("id");
                    var comment_content = $(this).parent().find("td:nth-child(2)").text();
                    var status = $(this).parent().find("td:nth-child(3)").text();
                    $("#edit-comment-modal").modal('toggle');
                    $("#edit-comment-modal").find("#comment_content").val(comment_content);
                    $("#edit-comment-modal").find("#status").val(status);
                    $("#edit-comment-form").attr("action", '/comments/'+  comment_id);
                    // $("#delete-comment-form").attr("action", '/blogcategory/' + comment_id);
                });
                

            // PORTFOLIO SECTION
                // =============================================================================
                // When any row of the PORTFOLIO table is clicked
                // =============================================================================

                $(".portfolio-row").click(function(e){
                    var portfolio_id = $(this).attr("id");
                    var portfolio_name = $(this).find("td:nth-child(2)").text();
                    var portfolio_link = $(this).find("td:nth-child(4)").text();
                    var portfolio_category = $(this).find("td:nth-child(5)").text();
                    var portfolio_short_description = $(this).find("td:nth-child(6)").text();

                    $("#edit-portfolio-modal").modal('toggle');
                    $("#edit-portfolio-modal").find("#name").val(portfolio_name);
                    $("#edit-portfolio-modal").find("#category").val(portfolio_category);
                    $("#edit-portfolio-modal").find("#portfolio_link").val(portfolio_link);
                    $("#edit-portfolio-modal").find("#short_description").val(portfolio_short_description);
                    $("#edit-portfolio-form").attr("action", '/portfolio/' + portfolio_id);
                    $("#delete-portfolio-form").attr("action", '/portfolio/' + portfolio_id);
                    
                });


                 //For category
                 $(".category-row").click(function(e){
                    var category_id = $(this).attr("id");
                    var category_name = $(this).find("td:nth-child(2)").text();

                    $("#edit-category-modal").modal('toggle');
                    $("#edit-category-modal").find("#name").val(category_name);
                    $("#edit-category-form").attr("action", '/contact/' + category_id);
                    $("#delete-category-form").attr("action", '/category/' + category_id);
                    
                }); 


 
//==============================================================================================                
//      CONTACT SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the CONTACT table is clicked
                // =============================================================================
                $(".contact-row").click(function(e){
                    var contact_id = $(this).attr("id");
                    var contact_location = $(this).find("td:nth-child(2)").text();
                    var contact_address = $(this).find("td:nth-child(3)").text();
                    var contact_email = $(this).find("td:nth-child(4)").text();
                    var contact_email_contactable = $(this).find("td:nth-child(5)").text();
                    var contact_phone = $(this).find("td:nth-child(6)").text();
                    

                    $("#edit-contact-modal").modal('toggle');
                    $("#edit-contact-modal").find("#location").val(contact_location);
                    $("#edit-contact-modal").find("#address").val(contact_address);
                    $("#edit-contact-modal").find("#email").val(contact_email);
                    $("#edit-contact-modal").find("#email_contactable").val(contact_email_contactable);
                    $("#edit-contact-modal").find("#phone").val(contact_phone);
                    $("#edit-contact-form").attr("action", '/contact/' + contact_id);
                    $("#delete-contact-form").attr("action", '/contact/' + contact_id);
                    
                });



//==============================================================================================                
//      TEAM SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the TEAM table is clicked
                // =============================================================================

                $(".member-row").click(function(e){
                    var member_id = $(this).attr("id");
                    var member_name = $(this).find("td:nth-child(2)").text();
                    var member_role = $(this).find("td:nth-child(3)").text();
                    var member_gender = $(this).find("td:nth-child(4)").text();

                    $("#edit-member-modal").modal('toggle');
                    $("#edit-member-modal").find("#name").val(member_name);
                    $("#edit-member-modal").find("#role").val(member_role);
                    $("#edit-member-modal").find("#gender").val(member_gender);
                    $("#edit-member-form").attr("action", '/team/' + member_id);
                    $("#delete-member-form").attr("action", '/team/' + member_id);
                    
                });                


//==============================================================================================                
//      PAGE CONTENT SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the CONTENT table is clicked
                // =============================================================================

                $(".content-row").click(function(e){
                    var content_id = $(this).attr("id");
                    var content_info = $(this).attr("data-info");
                    var content_item = $(this).find("td:nth-child(2)").text();
                    var content_value = $(this).find("td:nth-child(3)").text();
                    if($(this).attr('name') == "image"){
                        $("#edit-content-modal").find(".image-div").show();
                        $("#edit-content-modal").find(".response-div").hide();
                        $("#edit-content-modal").find("#progress").hide();
                        $("#edit-content-modal").find("#progress-info").hide();
                        $("#edit-content-modal").find("#info").hide();
                        //Hide the file input element
                    }
                    else{
                        $("#edit-content-modal").find(".image-div").hide();
                        $("#edit-content-modal").find(".response-div").show();
                        $("#edit-content-modal").find("#progress").show();
                        $("#edit-content-modal").find("#progress-info").show();
                        $("#edit-content-modal").find("#info").show();
                    }

                    $("#edit-content-modal").modal('toggle');
                    $("#edit-content-modal").find("h3").text("Edit " + content_item);
                    $("#edit-content-modal").find("#value").val(content_value);
                    $("#edit-content-modal").find("#info").text(content_info);
                    $("#edit-content-modal").find("#progress").text(content_value.length);
                    $("#edit-content-form").attr("action", '/content/' + content_id);
                });   

                //When content input element changes
                $("#edit-content-modal").find("#value").on('keyup', function(){
                    $("#progress").text(($(this).val().length));
                });         

//==============================================================================================                
//      FOOTER SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the FOOTER table is clicked
                // =============================================================================

                $(".footer-row").click(function(e){
                    var footer_id = $(this).attr("id");
                    var footer_webname = $(this).find("td:nth-child(1)").text();
                    var footer_webdescription = $(this).find("td:nth-child(2)").text();
                    var footer_copyrightstatement = $(this).find("td:nth-child(3)").text();
                    

                    $("#edit-footer-modal").modal('toggle');
                    $("#edit-footer-modal").find("#webname").val(footer_webname);
                    $("#edit-footer-modal").find("#webdescription").val(footer_webdescription);
                    $("#edit-footer-modal").find("#copyrightstatement").val(footer_copyrightstatement);
                    $("#edit-footer-form").attr("action", '/footer/' + footer_id);
                    
                });                

//==============================================================================================                
//      SETTINGS SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the SETTINGS WEBNAME table is clicked
                // =============================================================================

                $(".webname-row").click(function(e){
                    var webname_id = $(this).attr("id");
                    var webname_webname = $(this).find("td:nth-child(1)").text();
                    console.log(webname_webname);
                    $("#edit-webname-modal").modal('toggle');
                    $("#edit-webname-modal").find("#webname").val(webname_webname);
                    $("#edit-webname-form").attr("action", '/settings/' + webname_id);
                });                

                             

//==============================================================================================                
//      CONTACT DETAILS SECTION
//==============================================================================================                
                // =============================================================================
                // When any row of the CONTACT DETAILS table is clicked
                // =============================================================================

                //For address
                $(".address").click(function(e){
                    var address_id = $(this).attr("id");
                    var address_address = $(this).find("td:nth-child(2)").text();

                    $("#edit-address-modal").modal('toggle');
                    $("#edit-address-modal").find("#address").val(address_address);
                    $("#edit-address-form").attr("action", '/contact/' + address_id);
                    $("#delete-address-form").attr("action", '/address/' + address_id);
                    
                }); 

                //For email
                $(".email").click(function(e){
                    var email_id = $(this).attr("id");
                    var email_email = $(this).find("td:nth-child(2)").text();
                    var email_contactable = $(this).find("td:nth-child(3)").text();

                    $("#edit-email-modal").modal('toggle');
                    $("#edit-email-modal").find("#email").val(email_email);
                    $("#edit-email-modal").find("#contactable").val(email_contactable);
                    $("#edit-email-form").attr("action", '/contact/' + email_id);
                    $("#delete-email-form").attr("action", '/email/' + email_id);
                    
                });                
                //For phone
                $(".phone").click(function(e){
                    var phone_id = $(this).attr("id");
                    var phone_phone = $(this).find("td:nth-child(2)").text();

                    $("#edit-phone-modal").modal('toggle');
                    $("#edit-phone-modal").find("#phone").val(phone_phone);
                    $("#edit-phone-form").attr("action", '/contact/' + phone_id);
                    $("#delete-phone-form").attr("action", '/phone/' + phone_id);
                    
                });                
                

//==============================================================================================                
//      LOGO SECTION
//==============================================================================================                
                // =============================================================================
                // When the logo link in the "site content" tab is clicked
                // =============================================================================
                $(".logo").click(function(){
                    var logo_id = $(this).attr("id");
                    modifyLogo(logo_id);
                });


                

                //When a row on the logos table is clicked
                function modifyLogo(id){
                 
                    //make an ajax call to the get the corresponding service
                    $.ajax({
                        url: "{{ url('/logo') }}" + "/" + id,
                        method: 'GET',
                        success: function(logo){
                          
                            var logo_id = logo.id;
                            var logo_name = logo.name;
                            var logo_url = logo.url;
                            var logo_alt = logo.alt;
                            var logo_current = logo.current;
                            $("#edit-logo-form").find("#name").val(logo_name);
                            $("#edit-logo-form").find("#current").val(logo_current);
                            $("#edit-logo-form").find("#alt").val(logo_alt);
                            $("#edit-logo-form").find("#sc").val(logo_id);
                            $("#edit-logo-form").attr("action", 'logo/'+logo_id);
                            $("#delete-logo-form").attr("action", 'logo/'+logo_id);
                            $("#edit-logo-modal").modal('show');

                        },

                        error: function(){
                            alert("Could not find page");
                        }
                    });
                    //call the edit modal
                }



// =============================================================================================================
//      All other functions
// =============================================================================================================
//                

    });
    </script>
    
</body>
</html>