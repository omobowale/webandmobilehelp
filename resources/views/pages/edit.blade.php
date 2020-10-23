<div class="modal offset-md-2 col-md-8" id="edit-page-modal">
    <form id="edit-page-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Page</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input name="sc" id="sc" type="hidden" />

                <div class="form-group">
                    <label for="edit-name">Name:</label>
                    <input class="form-control" id="edit-name" name="name" type="text" placeholder="Enter page name" />
                </div>
                <div class="form-group">
                    <label for="edit-title">Title:</label>
                    <input class="form-control" id="edit-title" type="text" name="description" placeholder="Enter page title" />
                </div>
                <div class="form-group">
                    <label for="edit-description">Description:</label>
                    <textarea rows="7" class="form-control" id="edit-description" type="text" name="description" placeholder="Enter page description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="edit-meta-title">Meta Title:</label>
                    <input rows="7" class="form-control" id="edit-meta-title" type="text" name="meta_title" placeholder="Enter page meta title" />
                </div>
                <div class="form-group">
                    <label for="edit-meta-description">Meta Description:</label>
                    <textarea rows="7" class="form-control" id="edit-meta-description" type="text" name="meta_description" placeholder="Enter page meta description" ></textarea>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" data-target="#edit-page-modal" class="bg-danger py-2 px-3 border">Cancel</button>
                <button type="submit" class="general-bg py-2 px-3 border">Update</button>
            </div>  
        </div>
    </form>

</div>