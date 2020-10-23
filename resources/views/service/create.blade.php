<div class="modal offset-md-2 col-md-8" id="create-service-modal">
    <form id="add-new-service-form" method="post" action="/service" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Service</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter service name" required/>
                </div>
                <div class="form-group">
                    <label for="icon">Icon: <small class="text-danger" style="font-weight: bold"> Only .jpeg, .jpg and .png files are supported. (Max. Size : 2MB)</small></label>
                    <input class="form-control" id="icon" name="icon" type="file" placeholder="Choose icon" required/>
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <input rows="7" class="form-control" id="short_description" type="text" name="short_description" placeholder="Enter a short description for the service" />
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title:</label>
                    <input rows="7" class="form-control" id="meta_title" type="text" name="meta_title" placeholder="Enter a meta title for the service" />
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description:</label>
                    <input rows="7" class="form-control" id="meta_description" type="text" name="meta_description" placeholder="Enter a meta description for the service" />
                </div>
                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea rows="7" class="form-control details" id="details" type="text" name="details" placeholder="Enter details of the service" ></textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Slug: (Optional)</label>
                    <input class="form-control" id="slug" name="slug" type="text" placeholder="Enter service slug for SEO performance"/>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" data-target="#create-service-modal" class="bg-danger py-2 px-3 border">Cancel</button>
                <button type="submit" class="general-bg py-2 px-3 border">Add</button>
            </div>  
        </div>
    </form>
</div>