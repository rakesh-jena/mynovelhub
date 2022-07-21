<div class="modal fade" id="add_comment_modal" tabindex="-1" role="dialog" aria-labelledby="add_comment_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="add_comment_modalTitle">Add New Comment</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="add_comment_form" action="{{ url('add-comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="chapter_id" id="chapter_id" value="{{ $chapter->id }}">
                    <input type="hidden" name="chapter_type" id="chapter_type" value="translation">
                    <input type="hidden" name="cur_url" value="{{ Request::url() }}">
                    
                    <div class="form-group">
                        <textarea class="form-control form-control-sm" name="content" id="content" placeholder="Write your comment!!"
                            aria-label="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
