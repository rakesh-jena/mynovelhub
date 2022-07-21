<div class="modal fade" id="add_reply_modal" tabindex="-1" role="dialog" aria-labelledby="add_reply_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="add_reply_modalTitle">Add New Reply</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="add_reply_form" action="{{ url('add-reply') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="replied_id" id="replied_id" value="">
                    <input type="hidden" name="reply_type" id="reply_type" value="">
                    <input type="hidden" name="cur_url" value="{{ Request::url() }}">
                    
                    <div class="form-group">
                        <textarea class="form-control form-control-sm" name="content" id="content" placeholder="Write your review!!"
                            aria-label="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
