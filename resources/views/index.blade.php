
@extends('TezkorNews.layouts.master')
@section('content')
	<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Raxbariyat:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Bu yerda sizning reklamangiz bo'lishi mumkin edi !
					</span>
					
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Bu yerda sizning reklamangiz bo'lishi mumkin edi !
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Bu yerda sizning reklamangiz bo'lishi mumkin edi !
					</span>
				</span>
			</div>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<form action="{{route('site.site.search.result')}}" method="GET">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
				</form>
			</div>
		</div>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">@if(isset($articles[0]))
				<div class="col-md-6 p-rl-1 p-b-2">
					
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[0]->thumbnail) }});">
						<a href="{{ route('site.article.show', $articles[0]->slug) }}"
   class="dis-block how1-child1 trans-03"></a>

							
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="{{route('site.article.show', $articles[0]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{ $articles[0]->category->name }}
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="{{route('site.article.show', $articles[0]->slug)}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									{{ $articles[0]->title }}
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									{{ $articles[0]->author->name }}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									{{$articles[0]->created_at->format('d M Y')}}
								</span>
							</span>
						</div>
					</div>
					
				</div>
@endif
@if(isset($articles[1]))
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[1]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[1]->slug) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<a href="{{ route('site.article.show', $articles[1]->slug) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{$articles[1]->category->name}}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[1]->slug) }}" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
											{{ $articles[1]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
@endif
@if(isset($articles[2]))
						<div class="col-sm-6 p-rl-1 p-b-2">
						<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[2]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[2]->slug) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[2]->slug) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[2]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[2]->slug) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[2]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
@endif
@if(isset($articles[3]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[3]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[3]->slug) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[3]->slug) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[3]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[3]->slug) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[3]->title }}
										
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
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<!-- Entertainment -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl12 tab01-title">
									Siyosat
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">Eng so'ngi yangiliklar</a>
									</li>



									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									Ko'proq
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											 @if(isset($siyosat[0]))
											<div class="m-b-30">
												<a href="{{ route('site.article.show', $siyosat[0]->slug ) }}" class="wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $siyosat[0]->thumbnail) }}" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="{{route('site.article.show', $siyosat[0]->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
															{{ $siyosat[0]->title }}
														</a>
													</h5>

													<span class="cl8">
														<a href="{{route('site.article.show', $siyosat[0]->slug)}}" class="f1-s-4 cl8 hov-cl10 trans-03">
															{{ $siyosat[0]->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>
														

														<span class="f1-s-3">
															{{ $siyosat[0]->created_at->format('d M Y') }}
														</span>
													</span>
												</div>
											</div>
											@endif
										</div>


										
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											 @foreach($siyosat->slice(1) as $item)
											<div class="flex-wr-sb-s m-b-30">
												<a href="{{route('site.article.show', $item->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $item->thumbnail) }}" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="{{route('site.article.show', $item->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
															{{ $item->title }}
														</a>
													</h5>

													<span class="cl8">
														<a href="{{route('site.article.show', $item->slug)}}" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{ $item->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $item->created_at->format('d M Y') }}
														</span>
													</span>
												</div>
											</div>
											@endforeach										
										</div>
									</div>
								</div>

								<!-- - -->
								
							</div>
						</div>

						<!-- Business -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl13 tab01-title">
									Ta'lim
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab2-1" role="tab">All</a>
									</li>

									

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											 @if(isset($talim[0])) 

											<div class="m-b-30">
												<a href="{{ route('site.article.show', $talim[0]->slug) }}" class="wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $talim[0]->thumbnail) }}" alt="IMG">
								</a>	

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="{{ route('site.article.show', $talim[0]->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
															{{ $talim[0]->title }} 
														</a>
													</h5>

													<span class="cl8">
														<a href="{{ route('site.article.show', $talim[0]->slug) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
															{{ $talim[0]->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														{{ $talim[0]->created_at->format(' M d Y')}}
														</span>
													</span>
												</div>
											</div>
											@endif
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											@foreach( $talim->slice(1) as $item )
											<div class="flex-wr-sb-s m-b-30">
												<a href="{{ route('site.article.show', $item->slug) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $item->thumbnail ) }}" alt="IMG">
								</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="{{ route('site.article.show', $item->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
															{{ $item->title }}
														</a>
													</h5>

													<span class="cl8">
														<a href="{{ route('site.article.show', $item->slug) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{ $item->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $item->created_at->format('M d Y')}}
														</span>
													</span>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>

								
							</div>
						</div>

						<!-- Travel -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl14 tab01-title">
									Moliya
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab3-1" role="tab">All</a>
									</li>

									

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											 @if(isset($moliya[0]))
											<div class="m-b-30">
												<a href="{{ route('site.article.show', $moliya[0]->slug) }}" class="wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $moliya[0]->thumbnail) }}" alt="IMG">
								</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="{{ route('site.article.show', $moliya[0]->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
															{{ $moliya[0]->title }}
														</a>
													</h5>

													<span class="cl8">
														<a href="{{ route('site.article.show', $moliya[0]->slug) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
															{{ $moliya[0]->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $moliya[0]->created_at->format('M d Y')}}
														</span>
													</span>
												</div>
											</div>
											@endif
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											 @foreach ( $moliya->slice(1) as $item )
											<div class="flex-wr-sb-s m-b-30">
												<a href="{{ route('site.article.show', $item->slug) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="{{ asset('storage/' . $item->thumbnail) }}" alt="IMG">
								</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="{{ route('site.article.show', $item->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
															{{ $item->title }}
														</a>
													</h5>

													<span class="cl8">
														<a href="{{ route('site.article.show', $item->slug) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{ $item->category->name }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $item->created_at->format('M d Y')}}
														</span>
													</span>
												</div>
											</div>
											@endforeach
											
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Eng ko'p ko'rilgan
								</h3>
							</div>

							<ul class="p-t-35">
								@foreach($mostPopular as $most)
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										eng
									</div>

									<a href="{{ route('site.article.show', $most->slug) }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
										{{ $most->title }}
									</a>
								</li>
								@endforeach
								
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-t-8">
							<a href="https://t.me/Amirdevv">
								<img class="max-w-full" src="{{ asset('assets/images/banner-02.png') }}" alt="IMG">
							</a>
						</div>
						
						<!--  -->
						<div class="p-t-50">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Bog'lanish
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="https://t.me/amirdevv" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
										<span class="fab fa-telegram"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											Own Profile
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Chat
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="https://github.com/Amirxon0108" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
										<span class="fab fa-git"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 Followers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Follow
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<span class="fab fa-youtube"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 Subscribers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Subscribe
										</a>
									</div>
								</li>
								<li class="flex-wr-sb-c p-b-20">
									<a href="https://instagram.com/amirkhan_e17" class="size-a-8 flex-c-c bg-youtube borad-3 size-a-8 fs-16 cl0 hov-cl0">
										<span class="fab fa-instagram"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											4509 Fans
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											like
										</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="container">
    <div class="flex-c-c p-t-20 p-b-20"> <a href="#">
            <img class="img-fluid" src="{{ asset('assets/images/banner-01.jpg') }}" alt="Banner">
        </a>
    </div>
</div>

	<!-- Latest -->
	<section class="bg0 p-t-60 p-b-35">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							Eng so'ngi yangiliklar
						</h3>
					</div>

					<div class="row p-t-35">
						@foreach($articles->slice(4) as $item)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							
							<div class="m-b-45">
								<a href="{{ route('site.article.show', $item->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $item->thumbnail) }}" alt="IMG">
						</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.article.show', $item->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $item->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											{{ $item->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{{$item->created_at->format('M d')}}
										</span>
									</span>
								</div>
							</div>
							
						</div>@endforeach
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!-- Video -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title">
									 Video Xabar
								</h3>
							</div>

							<div>
								<div class="wrap-pic-w pos-relative">
									<img src="{{ asset('assets/images/kun.jpg') }}" alt="IMG">
							<a class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" href="https://youtu.be/Yuz9nquHuZo?si=HSiUv9T-yVLyIIgx">
										<span class="fab fa-youtube"></span>
</a>
								</div>

								<div class="p-tb-16 p-rl-25 bg3">
									<h5 class="p-b-5">
										<a href="https://youtu.be/Yuz9nquHuZo?si=HSiUv9T-yVLyIIgx" class="f1-m-3 cl0 hov-cl10 trans-03">										
										Namoyishlarning uchinchi haftasi: qurbonlar ortmoqda, Tramp va’da bermoqda 
										</a>
									</h5>

									<span class="cl15">
										<a href="https://www.youtube.com/@kunuz_official" class="f1-s-4 cl8 hov-cl10 trans-03">
											by KunUZ
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Jan 14  	
										</span>
									</span>
								</div>
							</div>	
						</div>
							
						<!-- Subscribe -->
						@include('TezkorNews.subcribe.email')
						
						
					</div>
				</div>
			</div>
		</div>
	</section>

	@endsection