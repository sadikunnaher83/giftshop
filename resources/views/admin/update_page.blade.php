<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 200px;
            color: aliceblue;
            padding: 10px;
        }
        input[type="text"]{
            width: 200px;
            height: 30px;
        }
        textarea{
            width: 200px;
            height: 100px;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    <!-- Sidebar Navigation -->
    @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2>Update Product</h2>
            <div class="div_deg">
                <form action="{{ url('edit_product', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Product Title</label>
                        <input type="text" name="title" value="{{ $product->title }}">
                    </div>
                    <div>
                    <label for="">Description</label>
                    <textarea name="description">{{ $product->description }}</textarea>
                    </div>
                    <div>
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{ $product->price }}">
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div>
                        <label for="">Category</label>
                        <select name="category">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>
                            @foreach ($data as $data )
                            <option value="{{  $data->category_name }}">{{  $data->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div>
                        <label for="">Current Image</label>
                        <img width="100px" src="{{ asset('product/' . $product->image) }}">
                        {{-- <img width="100px" src="/product/{{ $product->image }}">
                    </div> --}}
                    <div>
                        <label for="">Change Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-info" type="submit" value="Update Product">
                    </div>

                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>

