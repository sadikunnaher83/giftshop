<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
    input[type="text"]{
      width: 200px;
      height: 30px;
    }
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid rgb(0, 0, 0);
        margin-top: 50px;
        width: 600px;
    }
    th{
        background-color: green;
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
        color: aliceblue;
    }
    td{
        color: whitesmoke;
        padding: 10px;
        border: 1px solid aliceblue;

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
            <h3 style="color:aliceblue">Add Category here</h3>
            <div class="div_deg">
             <form action="{{ url('add_category') }}" method="post">
                @csrf
              <div>
                <input type="text" name="category">
                <input class="btn btn-success" type="submit" value="Add Category">
            </div>
          </form>
        </div>

        <div>
            <table class="table_deg">
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->category_name }}</td>
                    <td>
                        <a href="{{ url('edit_category', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    <td>
                         <a class="btn btn-warning btn-sm" onclick="confirmation(event)" href="{{ url('delete_category', $data->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>


          </div>
      </div>
    </div>
  <!-- JavaScript files-->
    {{-- <script type="text/javascript">

    function confirmation(ev)
    {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
          title: "Are You Sure to Delete This?",
          text: "This will be Deleted Permanently!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })

        .then((willCancel) => {
          if (willCancel) {
            window.location.href = urlToRedirect;
          }

        });
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script> --}}
    @include('admin.js')

  </body>
</html>

