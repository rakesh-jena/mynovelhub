@extends('web')
@section('title', 'Upload Chapters')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<!-- Books -->
<section>
    <div class="container">
        @php
        $files = scandir('json/');
        $book_id = 11;
        foreach(glob('json/*.json') as $file)
        {
            
            $chapters = App\Models\ChapterTranslation::where('book_id', $book_id)->count();
            $volume = floor($chapters/100) +1;
            $ch_no = $chapters+1;
            
            $text = file_get_contents($file);
            $json_data = json_decode($text,true);
            $re = '~<h1(.*?)</h1>~';
            $rs = '~<p>.*?Book.*?Chapter.*?</p>~';
            if (@preg_match($re, '', $json_data['body']) === false) {
                break;
            }
            $res = preg_replace($re, '', $json_data['body']);
            $result = preg_replace($rs, '', $res);
            $t = '~Book(.*?)Chapter(.*?)\s(.*?)\s(.*?)\s~';
            if (@preg_match($t, '', $json_data['title']) === false) {
                break;
            }
            $title = preg_replace($t, '', $json_data['title']);
            
            $slug = Illuminate\Support\Str::slug($title, "-");

            $chapter = new App\Models\ChapterTranslation();
            $chapter->book_id = $book_id;
            $chapter->chapter_no = $ch_no;
            $chapter->content = $result;
            $chapter->volume = $volume;
            $chapter->ch_name = $title;
            $chapter->slug = $slug;
    
            $ch_count = App\Models\ChapterTranslation::where('book_id', $book_id)->count();
            $ch_count = $ch_count+1;
            
            $update_book = App\Models\BookTranslated::where('id',$book_id)->first()->update([
                'chapters' => $ch_count
            ]);
    
            $chapter->save();
            print_r('<p>Chapter '.$ch_no.' uploaded successfully.</p>\n');
        }
        print_r('<p>Volume '.$volume.' uploaded successfully.</p>\n');
        @endphp
    </div>
</section>

@endsection
