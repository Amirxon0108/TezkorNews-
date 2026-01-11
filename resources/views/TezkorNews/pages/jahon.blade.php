@extends('TezkorNews.layouts.master')
@section('content')
	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="{{ route('site.index') }}" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="" class="breadcrumb-item f1-s-3 cl9">
					Category
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					jahon
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			jahon
		</h2>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					@if(isset($jahon[0]))
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{ asset('storage/' . $jahon[0]->thumbnail) }});">
						<a href="{{ route('site.blog-detail-01', $jahon[0]->slug)}}" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="{{ route('site.blog-detail-01', $jahon[0]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{ $jahon[0]->category->name }}
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="{{ route('site.blog-detail-01', $jahon[0]->slug)}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									{{ $jahon[0]->title }}
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									{{ $jahon[0]->author->name }}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									{{ $jahon[0]->created_at->format('M d, Y') }}
								</span>
							</span>
						</div>
					</div>
				</div>
				@endif
				@if(isset($jahon[1]))
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $jahon[1]->thumbnail) }});">
								<a href="{{ route('site.blog-detail-01', $jahon[1]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.blog-detail-01', $jahon[1]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $jahon[1]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.blog-detail-01', $jahon[1]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $jahon[1]->title }}
										</a>
									</h3>
										
								</div>
							</div>
						</div>
						@endif
						@if(isset($jahon[2]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $jahon[2]->thumbnail) }});">
								<a href="{{ route('site.blog-detail-01', $jahon[2]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.blog-detail-01', $jahon[2]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $jahon[2]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.blog-detail-01', $jahon[2]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $jahon[2]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
						@endif
						@if(isset($jahon[3]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $jahon[3]->thumbnail) }});">
								<a href="{{ route('site.blog-detail-01', $jahon[3]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.blog-detail-01', $jahon[3]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $jahon[3]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.blog-detail-01', $jahon[3]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $jahon[3]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
						@endif
						@if(isset($jahon[4]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $jahon[4]->thumbnail) }});">
								<a href="{{ route('site.blog-detail-01', $jahon[4]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.blog-detail-01', $jahon[4]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $jahon[4]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.blog-detail-01', $jahon[4]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $jahon[4]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[5]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[5]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[5]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[5]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[5]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[5]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										</span>

										<span class="f1-s-3">
											{{ $jahon[5]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[6]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[6]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[6]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[6]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[6]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[6]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										</span>

										<span class="f1-s-3">
											{{ $jahon[6]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[7]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[7]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[7]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[7]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[7]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[7]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										</span>

										<span class="f1-s-3">
											{{ $jahon[7]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[8]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[8]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[8]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[8]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="{{ route('site.author', $jahon[8]->author->slug) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[8]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										

										<span class="f1-s-3">
											{{ $jahon[8]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[9]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[9]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[9]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[9]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[9]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[9]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										

										<span class="f1-s-3">
											{{ $jahon[9]->created_at->format('M d') }}
										</span>
										
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[10]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[10]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[10]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[10]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[10]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[10]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{{ $jahon[10]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[11]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[11]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[11]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[11]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[11]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[11]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										

										<span class="f1-s-3">
											{{ $jahon[11]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[12]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[12]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[12]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[12]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[12]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[12]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										

										<span class="f1-s-3">
											{{ $jahon[12]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[13]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[13]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[13]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[13]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[13]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[13]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
									

										<span class="f1-s-3">
											{{ $jahon[13]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							 @if(isset($jahon[14]))
							<div class="m-b-45">
								<a href="{{route('site.blog-detail-01', $jahon[14]->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $jahon[14]->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.blog-detail-01', $jahon[14]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $jahon[14]->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $jahon[14]->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										
										

										<span class="f1-s-3">
											{{ $jahon[14]->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							@endif
						</div>
						
					</div>

					<!-- Pagination -->
					<div class="flex-wr-s-c m-rl--7 p-t-15">
						
					</div>
				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
							<h5 class="f1-m-5 cl0 p-b-10">
								Subscribe
							</h5>

							<p class="f1-s-1 cl0 p-b-25">
								Get all latest content delivered to your email a few times a month.
							</p>

							<form class="size-a-9 pos-relative">
								<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

								<button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						</div>

						<!-- Most Popular -->
						<div class="p-b-23">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Most Popular
								</h3>
							</div>
							@foreach($mostPopular as $post)
							<ul class="p-t-35">
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										eng
									</div>

									<a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
										{{ $post->title }}
									</a>
								</li>
								@endforeach
								
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<a href="">
								<img class="max-w-full" src="images/banner-02.jpg" alt="IMG">
							</a>
						</div>
						
						<!-- Tag -->
						<div>
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Fashion
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Denim
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Crafts
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Magazine
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									News
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Blogs
								</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@endsection