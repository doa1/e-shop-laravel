@extends('admin.master')
@section('content')
<div class="market-updates">
	<div class="col-md-12">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Recent Orders
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover" id="orders_table">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Product</th>
                                      <th>Quantity</th>
                                      <th>Order Date</th>
                                      <th>Customer</th>
                                      <th>Contact</th>
                                      <th>Address</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php $id=0; ?>
                              @foreach($orders as $order)
                               @foreach($order->orders as $item)
                                <tr>
                                  <td>{{$id++}}</td>
                                  <td>{{$order->title}}</td>
                                  <td><span class="label label-success">{{$item->quantity}}</span></td>
                                  <td>{{$item->created_at}}</td>
                                  <td><span class="badge badge-primary">{{$item->customer_name}}</span></td>
                                  <td>{{$item->customer_phone}}</td>
                                  <td>{{$item->customer_city}}-{{$item->customer_address}} ::{{$item->customer_address_type}}</td>
                              </tr>
                              @endforeach
                             @endforeach
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>
      @push('scripts')
    <script>
        $(document).ready(function() {
            $('#orders_table').DataTable({
               /*serverSide: true,
                processing: true,
                responsive: true,
                ajax: "{{ route('getOrders') }}",
                columns: [
                    { name: 'id' },
                    { name: 'title' },
                    { name: "orders['quantity']" },
                    { name: "orders['created_at']" },
                    { name:"orders['customer_name']" },
                    //{ name: "orders['quantity']"}

                ],*/
            });
        });
    </script>
@endpush

     <div class="clearfix"> </div>
</div>
@stop()
