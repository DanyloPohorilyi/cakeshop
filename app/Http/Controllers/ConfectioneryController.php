<?php

namespace App\Http\Controllers;

use App\Models\Confectionery;
use App\Models\Category;
use App\Models\Image;
use App\Models\Taste;
use Illuminate\Http\Request;

class ConfectioneryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('confectionery.index', ['confectioneries' => Confectionery::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tastes = Taste::pluck('name', 'id');
        return view('confectionery.create', ['categories' => $categories, 'tastes' => $tastes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $confectionery = new Confectionery();
        $confectionery->name = $request->input('name');
        $confectionery->description = $request->input('description');
        $confectionery->price = $request->input('price');
        $confectionery->calories = $request->input('calories');
        $confectionery->fats = $request->input('fats');
        $confectionery->proteins = $request->input('proteins');
        $confectionery->carbohydrates = $request->input('carbohydrates');
        $confectionery->preparing_time = $request->input('preparing_time');
        $category_id = $request->input('category');
        $confectionery->category()->associate(Category::find($category_id));
        $confectionery->save();

        $confectionery->refresh();

        $tastes = $request->input('tastes');
        foreach ($tastes as $taste_id ) {
            $confectionery->tastes()->attach($taste_id);
        }

        $image = new Image();
        $image->path = $request->file('image')->store('confectioneries', 'public');
        $image->alt_text = $request->input('alt_text', 'null');
        $confectionery->image()->save($image);
        return redirect()->route('confectionery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Confectionery  $confectionery
     * @return \Illuminate\Http\Response
     */
    public function show(Confectionery $confectionery)
    {
        return view('confectionery.show', ['confectionery' => $confectionery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Confectionery  $confectionery
     * @return \Illuminate\Http\Response
     */
    public function edit(Confectionery $confectionery)
    {
        $categories = Category::pluck('name', 'id');
        $tastes = Taste::pluck('name', 'id');
        return view('confectionery.edit', ['categories' => $categories, 'tastes' => $tastes, 'confectionery' => $confectionery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Confectionery  $confectionery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confectionery $confectionery)
    {
        $confectionery->name = $request->input('name');
        $confectionery->description = $request->input('description');
        $confectionery->price = $request->input('price');
        $confectionery->calories = $request->input('calories');
        $confectionery->fats = $request->input('fats');
        $confectionery->proteins = $request->input('proteins');
        $confectionery->carbohydrates = $request->input('carbohydrates');
        $confectionery->preparing_time = $request->input('preparing_time');
        $category_id = $request->input('category');
        $confectionery->category()->disassociate();
        $confectionery->category()->associate(Category::find($category_id));
        $confectionery->save();

        $confectionery->refresh();

        $confectionery->tastes()->detach();
        $tastes = $request->input('tastes');
        foreach ($tastes as $taste_id ) {
            $confectionery->tastes()->attach($taste_id);
        }

        $image = $confectionery->image;
        if($request->hasFile('image')){
            unlink(storage_path().'\\app\\public\\'.$image->path);
            $path = $request->file('image')->store('confectioneries', 'public');
            $image->path = $path;
        }
        $image->alt_text = $request->input('alt_text', 'null');
        $confectionery->image()->save($image);
        return redirect()->route('confectionery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Confectionery  $confectionery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confectionery $confectionery)
    {
        unlink(storage_path().'\\app\\public\\'.$confectionery->image->path);
        $confectionery->image()->delete();

        $confectionery->tastes()->detach();
        $confectionery->category()->dissociate();

        $confectionery->delete();
        return redirect()->route('confectionery.index');
    }
}
