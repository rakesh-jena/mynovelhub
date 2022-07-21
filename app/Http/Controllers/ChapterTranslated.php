<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChapterTranslation;
use App\Models\BookTranslated;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChapterTranslated extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        $book = BookTranslated::where('id', $book_id)->get();
        return view('layouts.chapter_add', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'chapter_no' => 'required',
            'content' => 'required',
            'volume' => 'required',
            'ch_name' => 'required',
        ]);

        $slug = Str::slug($request->input('ch_name'), "-");

        $chapter = new ChapterTranslation();
        $chapter->book_id = $request->input('book_id');
        $chapter->chapter_no = $request->input('chapter_no');
        $chapter->content = $request->input('content');
        $chapter->volume = $request->input('volume');
        $chapter->ch_name = $request->input('ch_name');
        $chapter->slug = $slug;

        $count = ChapterTranslation::where('book_id', $request->input('book_id'))->count();
        $count = $count+1;
        
        $update_book = BookTranslated::where('id',$request->input('book_id'))->first()->update([
            'chapters' => $count,
            'ch_updated' => Carbon::now()->toDateTimeString(),
        ]);

        $chapter->save();

        return redirect('admin/chapter/'.$chapter->id)
            ->with('success', 'Chapter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = ChapterTranslation::where('id', $id)->get();
        $book = BookTranslated::where('id', $chapter[0]->book_id)->get();

        return view('layouts.chapter_edit', compact('chapter', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = ChapterTranslation::where('id', $id)->get();
        $book = BookTranslated::where('id', $chapter[0]->book_id)->get();

        return view('layouts.chapter_edit', compact('chapter', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required',
            'chapter_no' => 'required',
            'content' => 'required',
            'volume' => 'required',
            'ch_name' => 'required',
        ]);

        $chapter = ChapterTranslation::where('id',$id);
        $slug = Str::slug($request->input('ch_name'), "-");

        $chapter->update([
            'chapter_no' => $request['chapter_no'],
            'content' => $request['content'],
            'volume' => $request['volume'],
            'ch_name' => $request['ch_name'],
            'slug' => $slug,
        ]);

        return redirect('admin/chapter/'.$id)
            ->with('success', 'Chapter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = ChapterTranslation::where('id', $id);
        $book_id = $chapter[0]->book_id;
        $chapter->delete();

        return redirect('book_translated/'.$book_id)
        ->with('success', 'Chapter deleted successfully.');
    }

    public function store_py()
    {
        $data = file_get_contents("json/book8.json");
        $a = json_decode($data);
        $count = 0;
        foreach($a as $ch)
        {
            if($ch->chapter_no > 45 && $ch->chapter_no <= 626)
            {
                $slug = Str::slug($ch->ch_name, "-");

                $chapter = new ChapterTranslation();
                $chapter->book_id = $ch->book_id;
                $chapter->chapter_no = $ch->chapter_no;
                $chapter->content = $ch->content;
                $chapter->volume = $ch->volume;
                $chapter->ch_name = $ch->ch_name;
                $chapter->slug = $slug;

                $count = ChapterTranslation::where('book_id', $ch->book_id)->count();
                $count = $count+1;
                
                $update_book = BookTranslated::where('id',$ch->book_id)->first()->update([
                    'chapters' => $count,
                    'ch_updated' => Carbon::now()->toDateTimeString(),
                ]);

                $chapter->save();
                echo "Success ".$ch->ch_name."\r\n";
            }
        }
    }
}
