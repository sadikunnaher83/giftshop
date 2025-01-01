<!DOCTYPE html>
<html>

<head>
 @include('home.css')
 <style>
   .div_deg{
       display: flex;
       justify-content: center;
       align-items: center;
       margin: 50px;
   }
   table{
       width: 50%;
       text-align: center;
       border: 2px solid black;
       weight: 50px;
   }
   th{
       border: 2px solid black;
       text-align: center;
       color: white;
       font: 20px;
       font-weight: bold;
       padding: 10px;
       background-color: skyblue;
   }
   td{
       border: 2px solid black;
       text-align: center;
       font: 20px;
       font-weight: bold;
       padding: 10px;
   }
   .cart_value{
       text-align: center;
       margin-bottom: 70px;
       padding: 18px;
   }
   .order_deg{
       padding-right: 100px;
       margin-top: -50px;
   }

   label{
       display: inline-block;
       width: 150px;
   }
   .div_gap{
       padding: 10px;
   }


 </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <div class="div_deg">

    <div class="order_deg">
        <form action="{{ url('comfirm_order') }}" method="post">
            @csrf
            <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="div_gap">
                <input class="btn btn-success btn-sm" type="submit" value="Cash on Delivery">
{{--
                <a class="btn btn-warning btn-sm" href="">Pay Using Card</a> --}}
            </div>
        </form>
    </div>

  <table >
    <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
    </tr>

    <?php
    $value = 0;
    ?>

    @foreach ($cart as $cart)
    <tr>
        <td>{{ $cart->product->title}}</td>
        <td>{{ $cart->product->price }}</td>
        <td>
            <img width="100px" src="/products/{{$cart->product->image}}">
        </td>
        <td>
            <a class="btn btn-success btn-sm" href="{{ url('remove_cart', $cart->id) }}">Remove</a>
        </td>
    </tr>


    <?php
    $value = $value + $cart->product->price;
    ?>

    @endforeach
  </table>
  </div>

  <div class="cart_value">
      <h2>Total Value of Cart is : ${{ $value }}</h2>
  </div>

  <!-- info section -->

   @include('home.footer')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>

