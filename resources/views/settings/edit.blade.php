<div class="modal offset-md-2 col-md-8" id="edit-webname-modal">
    <form id="edit-webname-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Website Name</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Web name</label>
                    <input class="form-control" type="text" name="webname" id="webname" required placeholder="Please enter webname"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="bg-info px-3 py-2 text-white border" type="submit">Update</button>
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-webname-modal">Cancel</button>
            </div>
        </div>
    </form>
    
</div>