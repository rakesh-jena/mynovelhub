<div class="modal fade" id="tag_delete_modal" tabindex="-1" role="dialog" aria-labelledby="tag_delete_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tag_delete_modalTitle">Delete Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <form class="forms-sample" action="" id="tag_delete_form" method="POST">
                    @csrf
                    @method('DELETE')             
                    <button type="submit" class="btn btn-gradient-danger mr-2 btn-rounded btn-sm">Delete</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>    
            </div>
        </div>
    </div>
</div>