<div class="modal offset-md-2 col-md-8" id="edit-footer-modal">
    <form id="edit-footer-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Footer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Web name</label>
                    <input class="form-control" type="text" name="webname" id="webname" required placeholder="Please enter footer web name"/>
                </div>

                <div class="form-group">
                    <label>Web description</label>
                    <input class="form-control" type="text" name="webdescription" id="webdescription" required placeholder="Please enter footer web description"/>
                </div>

                <div class="form-group">
                    <label>Copyrights statement</label>
                    <input class="form-control" type="text" name="copyrightstatement" id="copyrightstatement" required placeholder="Please enter copyrights statement"/>
                </div>
            </div>
            <div class="modal-footer">
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-webname-modal">Cancel</button>
                <button class="general-bg px-3 py-2 text-white border" type="submit">Update</button>
            </div>
        </div>
    </form>
    
</div>