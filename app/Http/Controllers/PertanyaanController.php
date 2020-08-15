<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use DB;
use App\Pertanyaan;
use App\Profile;
use App\Tag;
use Auth;

class PertanyaanController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();

        return view('pages.pertanyaan.index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pertanyaan.create');
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
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $tags_arr = explode(',', $request["tags"]);

        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::where("tag_name", $tag_name)->first();
            $tag = Tag::firstOrCreate(['tag_name' => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        $pertanyaan = Pertanyaan::create([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        $pertanyaan->tags()->sync($tag_ids);

        $profile = Auth::user()->profile;
        $profile->pertanyaan()->save($pertanyaan);

        Alert::success('Berhasil', 'Berhasil Menambahkan Pertanyaan!');

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('pages.pertanyaan.show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('pages.pertanyaan.edit', compact('pertanyaan'));
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
            'judul' => 'required',
            'isi' => 'required',
            'profile' => 'nullable',
            'jawaban' => 'nullable',
        ]);

        $pertanyaan = Pertanyaan::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        Alert::success('Berhasil', 'Berhasil Update Pertanyaan!');
        return redirect('/pertanyaan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::destroy($id);

        Alert::success('Berhasil', 'Berhasil Menghapus Pertanyaan!');

        return redirect('/pertanyaan');
    }
}
