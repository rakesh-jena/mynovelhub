@extends('home')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-uppercase">chapter</h3>
                <form class="form-sample" enctype="multipart/form-data" action="{{ url('admin/chapter/add') }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-uppercase">Book</label>
                                <input type="hidden" name="book_id" value="{{ $book[0]->id }}">
                                <strong class="form-control form-control-sm">{{ $book[0]->novel }}</strong>
                            </div>
                            @php
                            $chapters = App\Models\ChapterTranslation::where('book_id', $book[0]->id)->count();
                            $volume = floor($chapters/100) +1;
                            $ch_no = $chapters+1;
                            
                            @endphp
                            <div class="form-group">
                                <label class="text-uppercase">volume</label>
                                <input type="number" name="volume" class="form-control form-control-sm" placeholder="Volume"
                                    aria-label="Name" value="{{ $volume }}">
                            </div>   
                            <div class="form-group">
                                <label class="text-uppercase">Chapter No.</label>
                                <input type="number" name="chapter_no" class="form-control form-control-sm" placeholder="Chapter No."
                                    aria-label="Name" value="{{ $ch_no }}">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Chapter Name</label>
                                <input type="text" name="ch_name" class="form-control form-control-sm" placeholder="Name"
                                    aria-label="Name" value="Chapter {{$ch_no}}">
                            </div>                         
                            <div class="form-group">
                                <label class="text-uppercase">content</label>
                                <textarea class="form-control form-control-sm" name="content"
                                    placeholder="What is our book about" aria-label="content"></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                            <a href="{{ url('book_translated/'.$book[0]->id) }}"
                                class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Cancel</a>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection