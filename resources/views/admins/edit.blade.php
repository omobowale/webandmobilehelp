<div class="modal offset-md-2 col-md-8" id="edit-admin-modal">
    <form id="edit-admin-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Admin</h3>
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
                    <input class="form-control" type="text" name="name" id="name" required placeholder="Please enter name"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" id="email" required placeholder="Please enter email"/>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">admin</option>
                        <option value="superadmin">super admin</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="bg-info px-3 py-2 text-white border" type="submit">Update</button>
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-admin-modal">Cancel</button>
            </div>
            <hr>
           
        </div>
    </form>
    
    <div class="bg-dark py-2 text-center">
        <form class="" id="delete-admin-form" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-danger delete">Delete</button>
        </form>
        
    </div>

    
</div>