<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
        table{
            border: 2px solid black;
            text-align: center
        }
        th{
            background-color: orchid;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: aliceblue;
            text-align: center;
        }
        td
        {
            color: whitesmoke;
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
        .table_center
        {
          display: flex;
          justify-content: center;
          align-items: center;
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

            <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
                @foreach ($order as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->rec_address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>
                        <img width="100px" src="products/{{ $order->product->image }}" >
                    </td>
                    <td>
                        @if ($order->status == 'in progress')
                            <span style="color: red">{{ $order->status }}</span>
                        @elseif ($order->status == 'on the way')
                            <span style="color: green">{{ $order->status }}</span>
                        @else
                        <span style="color: yellow">{{ $order->status }}</span>
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ url('on_the_way',$order->id) }}">On the way</a>
                        <a class="btn btn-success btn-sm" href="{{ url('delivered',$order->id) }}">Delivered</a>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ url('print_pdf',$order->id) }}">Print PDF</a>
                    </td>

                </tr>
                @endforeach

            </table>

          </div>
         </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>

