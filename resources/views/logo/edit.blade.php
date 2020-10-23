<div class="modal offset-md-2 col-md-8" id="edit-logo-modal">
    <form id="edit-logo-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Logo</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="hidden" name="sc" id="sc"/>
                </div>
                <div class="form-group">
                    <label>Logo Name</label>
                    <input class="form-control" type="text" name="name" id="name" required />
                </div>
                <div class="form-group">
                    <label>Choose Logo <small class="text-danger" style="font-weight: bold"> Only .jpeg, .jpg and .png files are supported. (Max. Size : 2MB)</small></label>
                    <input class="form-control" type="file" name="logo" id="logo" />
                </div>
                <div class="form-group">
                    <label>Logo Alt</label>
                    <input class="form-control" type="text" name="alt" id="alt" />
                </div>
                <div class="form-group">
                    <label>Set as current logo</label>
                    <select class="form-control" name="current" id="current">
                        <option value="0">no</option>
                        <option value="1">yes</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-target="edit-logo-modal" data-dismiss="modal">Cancel</button>
                <button class="general-bg px-3 py-2 text-white border" type="submit">Update</button>
            </div>
        </div>
    </form>
    

    <div class="bg-dark py-2 text-center">
        <form class="" id="delete-logo-form" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-danger delete">Delete</button>
        </form>
        
    </div>

</div>