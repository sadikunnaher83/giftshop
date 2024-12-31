<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 50px;
        }
        .table_deg{
            border: 2px solid black;
        }
        th{
            background-color: whitesmoke;
            color: rgb(31, 12, 116);
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
        }
        td{
            border: 1px solid white;
            text-align: center
            color: white;
        }
        input[type="search"]{
            width: 300px;
            height: 30px;
            margin-left: 10px;
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
            <h2>View Product</h2>
            <form action="{{ url('search_product') }}" method="post">
                @csrf
                <input type="search" name="search">
                <input class="btn btn-info" type="submit" value="Search">
            </form>
           <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($product as $products)
                    <tr>
                        <td>{{ $products->title }}</td>
                        <td>{!!Str::limit($products->description,20)!!}</td>
                        <td>{{  $products->category }}</td>
                        <td>{{  $products->price }}</td>
                        <td>{{  $products->quantity }}</td>
                        <td>
                            <img height="100px" width="120px" src="products/{{ $products->image }}">
                        </td>
                        <td>
                            <a href="{{ url('update_product', $products->id) }}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="div_deg">
               {{ $product->links() }}
                {{-- {{ $product->onEachSide(3)->links() }} --}}
            </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->

   @include('admin.js')

     <!-- JavaScript files-->

  </body>
</html>

