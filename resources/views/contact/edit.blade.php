<div class="modal offset-md-2 col-md-8" id="edit-contact-modal">
    <form id="edit-contact-form" method="post" action="/contact">
        @csrf
        @method("PUT")
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Contact</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Location:</label>
                    <input class="form-control" id="location" name="location" type="text" placeholder="Enter contact location" required/>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input class="form-control" id="address" type="text" name="address" placeholder="Enter contact address" required/>
                </div>
                <div class="form-group">
                    <label for="address">Email:</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter contact address" required/>
                </div>
                <div class="form-group">
                    <label for="email_contactable">Email Contactable:</label>
                    <select name="email_contactable" id="email_contactable" class="form-control">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input class="form-control" id="phone" type="phone" name="phone" placeholder="Enter contact phone" required/>
                </div>
                
            </div>  
            <div class="modal-footer">
                <button type="submit" class="general-bg py-2 px-3 border">Update</button>
                <button type="button" data-dismiss="modal" data-target="#create-service-modal" class="bg-danger py-2 px-3 border">Cancel</button>
            </div>  
        </div>
    </form>
</div>