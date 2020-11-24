<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    public function index()
    {

        return view('categories.index')->with('categories', Category::all());

    }


    public function create()
    {

        return view('categories.create');
    }

    public function store(Request $request)
    {


        $categories = Category::create($request->all());


        session()->flash('success', 'Category created successfully');

        return redirect()->action('CategoriesController@index');

    }


    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }


    public function update(UpdateCategoriesRequest $request, Category $category){

        $category->name = $request->name;
        $category->save();

//
//        $category->update([
//
//        $request->name
//
//    ]);
    session()->flash('success','category updated successfully.');
    return redirect(route('categories.index'));

    }

    public function destroy(Category $category)
    {
        $category -> delete();
        session()->flash('success','Category Deleted');
        return redirect(route('categories.index'));
    }




}



