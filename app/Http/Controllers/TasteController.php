<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Taste;
use Illuminate\Support\Facades\File;

class TasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tastes = Taste::all();
        return view('tastes.index', ['tastes'=>$tastes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tastes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taste = new Taste();
        $taste->name = $request->input('name');
        $taste->description = $request->input('description');
        $taste->save();
        $image = new Image();
        $image->path = $request->file('image')->store('tastes', 'public');
        $image->alt_text = $request->input('alt_text', 'null');
        $taste->image()->save($image);
        return view('tastes.index', ['tastes' => Taste::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taste = Taste::find($id);
        return view('tastes.show', ['taste' => $taste]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taste = Taste::find($id);
        return view('tastes.edit', ['taste' => $taste]);
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
        $taste = Taste::find($id);
        $taste->name = $request->input('name');
        $taste->description = $request->input('description');
        $taste->save();
        $image = $taste->image;
        if($request->hasFile('image')){
            unlink(storage_path().'\\app\\public\\'.$image->path);
            $path = $request->file('image')->store('tastes', 'public');
            $image->path = $path;
        }
        $image->alt_text = $request->input('alt_text', 'null');
        $taste->image()->save($image);

        return redirect()->route('taste.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taste = Taste::all()->find($id);
        unlink(storage_path().'\\app\\public\\'.$taste->image->path);
        $taste->image()->delete();
        $taste->delete();
        return redirect()->route('taste.index');
    }
}
