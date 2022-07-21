@extends('home')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-uppercase">novel information</h3>
                <form class="form-sample" enctype="multipart/form-data" action="{{ route('book_translated.update', $book[0]->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase">Novel</label>
                                <input type="text" name="novel" class="form-control form-control-sm" placeholder="Name"
                                    aria-label="Name" value="{{ $book[0]->novel }}">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Abbreviation</label>
                                <input type="text" name="abbreviation" class="form-control form-control-sm"
                                    placeholder="Abbreviation" aria-label="Abbreviation" value="{{ $book[0]->abbreviation }}">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">author</label>
                                <input type="text" name="author" class="form-control form-control-sm"
                                    placeholder="Author" aria-label="Author" value="{{ $book[0]->novel }}">
                            </div>

                            <div class="form-group">
                                <label class="text-uppercase">Main lead</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="lead" id="optionsRadios1"
                                            value="male" checked=""> male lead <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="lead" id="optionsRadios2"
                                            value="female"> female lead <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Featured</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="featured" id="optionsRadios1"
                                            value="1" > Yes <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="featured" id="optionsRadios2"
                                            value="0" checked=""> no <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">status</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios1"
                                            value="ongoing" checked=""> Ongoing <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios2"
                                            value="complete"> Complete <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">synopsis</label>
                                <textarea class="form-control form-control-sm" name="description"
                                    placeholder="What is our book about" aria-label="Username">{{ $book[0]->description }}</textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Submit</button>
                            <a href="{{ route('book_translated.index') }}"
                                class="btn btn-gradient-primary mr-2 btn-rounded btn-sm">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase" for="cover">Select a file:</label>
                                <img id="book_cover" src="{{ URL::asset('images/book-cover/300/'.$book[0]->cover) }}">
                                <input type="hidden" name="cover" id="cover_image" value="{{ $book[0]->cover }}">
                                <button type="button" class="form-control form-control-sm btn btn-gradient-success btn-rounded btn-sm"
                                    data-toggle="modal" data-target="#select_image_modal" data-url="{{ url('image-upload') }}" data-src="{{ url('images/temp') }}"
                                    data-height="400" data-width="300" data-input="cover_image" data-img="book_cover">
                                    Select
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection