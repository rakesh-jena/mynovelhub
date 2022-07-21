<div class="modal fade" id="tag_edit_modal" tabindex="-1" role="dialog" aria-labelledby="tag_edit_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tag_edit_modalTitle">Edit Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="" id="tag_edit_form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tag_edit">Genre</label>
                        <input type="text" name="tag" class="form-control form-control-sm" id="tag_edit" placeholder="Tag">
                    </div>
                    <div class="form-group">
                        <label for="tag_synopsis_add">Synopsis</label>
                        <textarea class="form-control form-control-sm" name="description" id="tag_synopsis_add"></textarea>
                    </div>                      
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>