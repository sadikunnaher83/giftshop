<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

        @foreach ($products as $product)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">

              <div class="img-box">
                <img src="products/{{ $product->image }}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$product->title}}</h6>
                <h6><span>${{$product->price}}</span></h6>
              </div>
           <div>
            <a class="btn btn-primary btn-sm" href="{{ url('product_details',$product->id) }}">Details</a>

            <a class="btn btn-info btn-sm" href="{{ url('add_cart', $product->id) }}">Add to Cart</a>

           </div>
          </div>
        </div>

        @endforeach





        {{-- <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p2.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Watch
                </h6>
                <h6>
                  Price
                  <span>
                    $300
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p3.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Teddy Bear
                </h6>
                <h6>
                  Price
                  <span>
                    $110
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p4.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Flower Bouquet
                </h6>
                <h6>
                  Price
                  <span>
                    $45
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p5.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Teddy Bear
                </h6>
                <h6>
                  Price
                  <span>
                    $95
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p6.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Flower Bouquet
                </h6>
                <h6>
                  Price
                  <span>
                    $70
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p7.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Watch
                </h6>
                <h6>
                  Price
                  <span>
                    $400
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/p8.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Ring
                </h6>
                <h6>
                  Price
                  <span>
                    $450
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div> --}}

      </div>
    </div>
  </section>
