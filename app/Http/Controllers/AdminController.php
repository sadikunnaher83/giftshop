<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;




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
public function add_product()
{

    $category = Category::all();
    return view('admin.add_product',compact('category'));
}
public function upload_product(Request $request)
{
   $data = new Product;
   $data->title = $request->title;
   $data->description = $request->description;
   $data->price = $request->price;
   $data->quantity = $request->qty;
   $data->category = $request->category;
   $image = $request->image;
   if($image)
   {
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('products',$imagename);
    $data->image = $imagename;
   }
   $data->save();
   toastr()->timeOut(10000)->closeButton()->success('Product added successfully');
   return redirect()->back();
}

public function view_product()
{
    $product = Product::paginate(5);
    return view('admin.view_product',compact('product'));
}

public function delete_product($id)
{
    $product = Product::find($id);
    $image_path = public_path('products/'.$product->image);   //public folder teke image delete korar jonno
    if(file_exists($image_path))
    {
        unlink($image_path);
    }
    $product->delete();
    toastr()->timeOut(10000)->closeButton()->success('Product deleted successfully');
    return redirect()->back();
}

public function update_product($id)
{
    $product = Product::find($id);
    $data = Category::all();
    return view('admin.update_page',compact('product','data'));
}
public function edit_product(Request $request,$id)
{
    $product = Product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->category = $request->category;
    $image = $request->image;
    if($image)
    {
     $imagename = time().'.'.$image->getClientOriginalExtension();
     $request->image->move('products',$imagename);
     $product->image = $imagename;
    }
    $product->save();
    toastr()->timeOut(10000)->closeButton()->success('Product updated successfully');
    return redirect('/view_product');
}

public function search_product(Request $request)
{
    $search = $request->search;
    // $product = Product::where('title','like','%'.$search.'%')->paginate(5);
    $product = Product::where('title','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->paginate(5);
    return view('admin.view_product',compact('product'));
}

public function view_order()
{

    $order = Order::all();
    return view('admin.order',compact('order'));
}

public function on_the_way($id)
{
    $order = Order::find($id);
    $order->status = 'on the way';
    $order->save();
    return redirect('/view_orders');
}

public function delivered($id)
{
    $order = Order::find($id);
    $order->status = 'delivered';
    $order->save();
    return redirect('/view_orders');
}

 public function print_pdf($id)
 {

     $order = Order::find($id);
     $pdf = Pdf::loadView('admin.invoice',compact('order'));
     return $pdf->download('invoice.pdf');

 }


}
