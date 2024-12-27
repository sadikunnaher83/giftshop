<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class AdminController extends Controller
{
public function view_category()
{
    $data = Category::all();
    return view('admin.category',compact('data'));
}

public function add_category(Request $request)
{
    $category = new Category;

    $category->category_name = $request->category;

    $category->save();

    toastr()->timeOut(10000)->closeButton()->success('Category added successfully');
    return redirect()->back();
}

public function delete_category($id)
{
    $data = Category::find($id);
    $data->delete();
    // toastr()->timeOut(10000)->closeButton()->warning('Category deleted successfully');
     return redirect()->back();
}

public function edit_category($id)
{
    $data = Category::find($id);
    return view('admin.edit_category',compact('data'));
}

public function update_category(Request $request,$id)
{
    $data = Category::find($id);
    $data->category_name = $request->category;
    $data->save();
    toastr()->timeOut(10000)->closeButton()->success('Category Updated successfully');
    return redirect('/view_category');


}

}

