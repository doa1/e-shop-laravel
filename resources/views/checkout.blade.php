@extends('master')
@section('content')
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{route('home')}}">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span id="itemsNumber"></span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody id="cartBody">

						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Add a new Details</h4>
					<form class="creditly-card-form agileinfo_form" method="post" id="orderForm">
                    @csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="customer_name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="address">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls" name="home_address">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn" id="orderBtn">Delivery to this Address</button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="payment.html">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--checkout cart-->
<script type="text/javascript">
    $(document).ready(function () {
        let tbody=$('#cartBody');
        //get items currently in the cart
        let cartItems=paypals.minicarts.cart.items();
        console.log(cartItems);
        //append to the body only if we got something
        let id=0;
        $('#itemsNumber').text(`${cartItems.length}  Products`);
        if(cartItems.length >0){
            cartItems.forEach((item)=>{
                id++;
                tbody.append(`<tr class="rem${id}">\
                    <td class="invert">${id}</td>\
                    <td class="invert-image">\
                    <a href="/product/${item._data.item_id}">\
                        <img src="${item._data.item_image?'uploads/'+item._data.item_image:'images/a.jpg'}" alt=" " class="img-thumbnail img-fluid" style="height:80px;width:100px">\
                    </a>\
                    </td>\
                    <td class="invert">\
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>${item._data.quantity}</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">${item._data.item_name}</td>
								<td class="invert">Ksh.${item._total}</td>
								<td class="invert">
									<div class="rem">
										<div class="close${id}"> </div>
									</div>
								</td>
        </tr>`)
            });
        }
        //submit the form
        $('#orderForm').on('submit',function (event) {
            event.preventDefault();
            let formData={};
            let homeAddress =null;
            $(this).serializeArray().forEach(data=>{
                if(data.name=='address'){
                  homeAddress=data.value;
                }
                formData[data.name]=data.value;
            });
            console.log(homeAddress)
            if(homeAddress ==="Select Address type"){
                alert('Select the Home Address Type');
                return false;
            }
            let items=[];
            cartItems.forEach(item=>{
                let product=item._data;
                items.push({'item_id':product.item_id,'quantity':product.quantity,'amount':item._total});

            });
            formData['items']=items;
            console.log(formData);
            console.log(formData.items);
            //set the headers then send the data
            $.ajaxSetup({headers:{
                'X-CSRF-TOKEN':$('input[name="_token"]').val()
            }})
            if(formData.items){
                $.ajax({
                    type: "POST",
                    url: "{{route('save-order')}}",
                    data: {'data':formData},//if you dont send as an array,only the form data will reach the server
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response)
                        }
                    });
            }

          });
      });
</script>
<!-- quantity -->
<script>

		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!-- //quantity -->

@stop()
