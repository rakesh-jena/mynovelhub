<div class="modal fade" id="genre_add_modal" tabindex="-1" role="dialog" aria-labelledby="genre_add_modalTitle"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="genre_add_modalTitle">Add New Genre</h5>                    
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('genre.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="genre_add">Genre</label>
                        <input type="text" name="genre" class="form-control form-control-sm" id="genre_add" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <label for="genre_synopsis_add">Synopsis</label>
                        <textarea class="form-control form-control-sm" name="description" id="genre_synopsis_add"></textarea>
                    </div>                        
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>