<div class="modal offset-md-2 col-md-8" id="create-member-modal">
    <form id="" method="POST" action="/team" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Member</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter member name" required/>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo: <small class="text-danger" style="font-weight: bold"> Only .jpeg, .jpg and .png files are supported. (Max. Size : 2MB)</small></label>
                    <input class="form-control" id="photo" name="photo" type="file" />
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input class="form-control" id="role" type="text" name="role" placeholder="Enter member role" required />
                </div>
            </div>  
            <div class="modal-footer">
                <button type="submit" class="bg-info py-2 px-3 border">Add</button>
                <button type="button" data-dismiss="modal" data-target="#create-member-modal" class="bg-danger py-2 px-3 border">Cancel</button>
            </div>  
        </div>
    </form>
</div>