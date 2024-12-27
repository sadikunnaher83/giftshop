<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        input[type="text"]{
            width: 200px;
            height: 30px;
        }
        h2{
            color:whitesmoke;
        }
        label{
            display: inline-block;
            width: 200px;
            font-size: 18px!important;
            color:aliceblue!important;
        }
        textarea{
            width: 300px;
            height: 40px;
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
            <h2>Add Product</h2>
            <div class="div_deg">
                <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Product Title</label>
                       <input type="text" name="title" required>
                    </div>
                    <div>
                        <label for="">Description</label>
                       <textarea name="description" required></textarea>
                    </div>
                    <div>
                        <label for="">Price</label>
                       <input type="text" name="price">
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="number" name="qty">
                    </div>
                    <div>
                        <label for="">Product Category</label>
                        <select name="category" required>
                            <option>Select Category</option>
                            @foreach ( $category as  $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success btn-sm" type="submit" value="Add Product">
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>

