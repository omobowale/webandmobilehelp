@inject('Category', 'App\Category')

<div class="modal offset-md-2 col-md-8" id="edit-portfolio-modal">
    <form id="edit-portfolio-form" method="post" action="/portfolio" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Portfolio</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter portfolio name" required/>
                </div>
                <div class="form-group">
                    <label for="name">Category:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($Category->getCategories() as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="portfolio_image">Image: <small class="text-danger" style="font-weight: bold"> Only .jpeg, .jpg and .png files are supported. (Max. Size : 2MB)</small></label>
                    <input class="form-control" id="portfolio_image" name="portfolio_image" type="file" placeholder="Choose Image" />
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <textarea rows="5" class="form-control" id="short_description" name="short_description" placeholder="Enter a short description for the portfolio"></textarea>
                </div>
                <div class="form-group">
                    <label for="portfolio_link">Portfolio Link:</label>
                    <input rows="7" class="form-control" id="portfolio_link" type="text" name="portfolio_link" placeholder="Enter link to the portfolio" />
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" data-target="#edit-portfolio-modal" class="bg-danger py-2 px-3 border">Cancel</button>
                <button type="submit" class="py-2 px-3 border general-bg">Update</button>
            </div>  
        </div>
    </form>


    <div class="bg-dark py-2 text-center">
        <form class="" id="delete-portfolio-form" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-danger delete">Delete</button>
        </form>
        
    </div>

</div>