<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="{{route('home')}}">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
                        </ul>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">

						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Categories
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">All Product Categories</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
                                            @foreach($categories as $category)
												<li>
													<a href="{{route('category',$category->id)}}">{{$category->name}}</a>
												</li>

												@endforeach

											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img">

										</div>
									</div>
								</div>
							</div>
						</li>

						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="{{route('about')}}">About Us</a>
						</li>

						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
                            <a class="dropdown-item" href="/add_product">Add Product</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/checkout">Checkout Page</a>
								<a class="dropdown-item" href="payment.html">Payment Page</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('contact')}}">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
