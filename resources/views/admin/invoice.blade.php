<!DOCTYPE html>
<html>
<head>
    <style>
        .center{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <title>Orders PDF</title>
</head>
<body>
    <h1>Orders PDF</h1>
    <div class="center">
        <h3>Customer Name : {{ $order->name }}</h3>
        <h3>Customer Address : {{ $order->rec_address }}</h3>
        <h3>Customer Phone : {{ $order->phone }}</h3>
            <h2>Product Title : {{ $order->product->title }}</h2>
            <h2>Product Price : {{ $order->product->price }}</h2>
        <img width="100px" height="150px" src="products/{{ $order->product->image }}">
    </div>



</body>
</html>

