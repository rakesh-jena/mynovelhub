<div class="modal fade" id="genre_edit_modal" tabindex="-1" role="dialog" aria-labelledby="genre_edit_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="genre_edit_modalTitle">Edit Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="" id="genre_edit_form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="genre_edit">Genre</label>
                        <input type="text" name="genre" class="form-control form-control-sm" id="genre_edit" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <label for="genre_synopsis_add">Synopsis</label>
                        <textarea class="form-control form-control-sm" name="description" id="genre_synopsis_edit"></textarea>
                    </div>                        
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>