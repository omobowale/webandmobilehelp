<div class="modal offset-md-2 col-md-8" id="edit-content-modal">
    <form id="edit-content-form" method="POST" enctype="multipart/form-data">
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
                <div class="image-div">
                    <label>Response: </label>
                    <input class="form-control" type="file" name="image" id="image" />
                </div>
                <div class="form-group response-div">
                    <label>Response: </label>
                    <textarea class="form-control" type="text" name="value" id="value" placeholder="Enter response here"></textarea>
                </div>
                <small class="text-success" id="progress-info">Number of characters : </small><small id="progress"></small><br>
                <small class="text-danger" id="info"></small>
                
            </div>
            <div class="modal-footer">
                <button class="bg-info px-3 py-2 text-white border" type="submit">Update</button>
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-content-modal">Cancel</button>
            </div>
        </div>
    </form>
    
</div>