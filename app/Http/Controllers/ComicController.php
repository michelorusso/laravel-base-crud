<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comics = Comic::all();
        
        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidation());

        $form_data = $request->all();

        $comic = new Comic();

        // long solution
        // $comic->title = $form_data['title'];
        // $comic->description = $form_data['description'];
        // $comic->poster = $form_data['poster'];
        // $comic->price = $form_data['price'];
        // $comic->start_date = $form_data['start_date'];

        // short solution
        // con queste operazioni massive ricordarsi di inserire nel model le colonne con fillable
        $comic->fill($form_data);
        $comic->save();

        return redirect()->route('comics.show', [
            'comic' => $comic->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [

            'comic' => $comic
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.edit', $data);
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
        $request->validate($this->getValidation());
        
        $form_data = $request->all();

        $comic_to_modify = Comic::find($id);
        $comic_to_modify->update($form_data);
        
        return redirect()->route('comics.show', ['comic' => $comic_to_modify->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // creiamo noi una funzione con tutte le regole di validazione
    private function getValidation() {
        return [
            'title' => 'required|min:4|max:50',
            'poster' => 'required|max:255',
            'price' => 'required',
            'start_date' => 'required',
        ];
    }
}
