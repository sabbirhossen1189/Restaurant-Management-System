@extends('admin.index')

@section('body')
<h2 class="h5 no-margin-bottom">Delivered Orders</h2>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="block">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Food Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $order)
                <tr>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->titile }}</td>
                  <td>{{ $order->quantity }}</td>
                  <td>{{ $order->price }}</td>
                  <td>
                    <img src="food_img/{{ $order->food_image }}" alt="Food Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                  </td>
                  <td>{{ $order->delivery_status }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection