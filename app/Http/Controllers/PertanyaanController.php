<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use DB;
use App\Pertanyaan;
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
        // $pertanyaan = DB::table('pertanyaan')->get();

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
            // 'profile' => 'nullable',
            // 'jawaban' => 'nullable',
        ]);

        // $query = DB::table('pertanyaan')->insert([
        //     "judul" => $request["judul"],
        //     "isi" => $request["isi"],
        //     "profile_id" => $request["profile_id"],
        //     "jawaban_tepat_id" => $request["jawaban_tepat_id"]
        // ]);

        // $pertanyaan = new Pertanyaan;
        // $pertanyaan->judul = $request["judul"];
        // $pertanyaan->isi = $request["isi"];
        // $pertanyaan->save();

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
        // $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();

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
        // $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();

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

        // $query = DB::table('pertanyaan')
        //     ->where('id', $id)
        //     ->update([
        //         "judul" => $request["judul"],
        //         "isi" => $request["isi"],
        //         "profile_id" => $request["profile_id"],
        //         "jawaban_tepat_id" => $request["jawaban_tepat_id"]
        // ]);

        $pertanyaan = Pertanyaan::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        return redirect('/pertanyaan')->with('success', 'Berhasil update pertanyaan!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $query = DB::table('pertanyaan')->where('id', $id)->delete();

        $pertanyaan = Pertanyaan::destroy($id);

        return redirect('/pertanyaan')->with('success', 'Berhasil hapus pertanyaan!');
    }
}
