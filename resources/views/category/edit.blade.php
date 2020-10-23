<div class="modal offset-md-2 col-md-8" id="edit-category-modal">
    <form id="edit-category-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Category</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="hidden" name="sc" id="sc"/>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" id="name" required placeholder="Please category name"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="general-bg px-3 py-2 text-white border" type="submit">Update</button>
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-category-modal">Cancel</button>
            </div>
        </div>
    </form>

    <div class="bg-dark py-2 text-center">
        <form class="" id="delete-category-form" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-danger delete">Delete</button>
        </form>
        
    </div>
    
</div>