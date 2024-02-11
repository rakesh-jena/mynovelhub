<div class="modal fade" id="edit_review_modal" tabindex="-1" role="dialog" aria-labelledby="edit_review_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="edit_review_modalTitle">Edit Review</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="edit_review_form" action="{{ url('edit-review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $review->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="rating" class="rating" value="{{ $review->rating }}">
                    <input type="hidden" name="book_type" id="book_type" value="translation">
                    <div class="form-group">
                        <label for="rating">Previous Rating</label>
                        <div class="book-star">
                            <ul class="stars-list">
                                @php
                                for($i = 0; $i<$review->rating; $i++)
                                echo("<li class='star-item active'><i class='mdi mdi-star'></i></li>");
                                if($review->rating<5){
                                    $r = 5 - $review->rating;
                                    for($i = 0; $i<$r; $i++)
                                    echo("<li class='star-item inactive'><i class='mdi mdi-star'></i></li>");
                                }                                
                                @endphp
                            </ul>
                        </div>
                        <label for="rating">New Rating</label>

                        <div class='rating-stars text-center'>
                            <ul id='stars'>
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='mdi mdi-star'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='mdi mdi-star'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='mdi mdi-star'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='mdi mdi-star'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='mdi mdi-star'></i>
                                </li>
                            </ul>
                        </div>
                        <div class='success-box text-center'>
                            <div class='clearfix'></div>
                            <div class='text-message'></div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control form-control-sm" name="content" id="content" placeholder="Write your review!!"
                            aria-label="Content">{{ $review->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                    <button class="btn btn-light btn-rounded btn-sm" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
