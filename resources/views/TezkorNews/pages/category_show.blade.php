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
					articles
				</span>
			</div>
			
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

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			articles
		</h2>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					@if(isset($articles[0]))
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[0]->thumbnail) }});">
						<a href="{{ route('site.article.show', $articles[0]->slug)}}" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="{{ route('site.article.show', $articles[0]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{ $articles[0]->category->name }}
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="{{ route('site.article.show', $articles[0]->slug)}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
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
									{{ $articles[0]->created_at->format('M d, Y') }}
								</span>
							</span>
						</div>
					</div>
				</div>
				@endif
				
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
                        @if(isset($articles[1]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[1]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[1]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[1]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[1]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[1]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[1]->title }}
										</a>
									</h3>
										
								</div>
							</div>
						</div>
						@endif
						@if(isset($articles[2]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[2]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[2]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[2]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[2]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[2]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[2]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
						@endif
						@if(isset($articles[3]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[3]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[3]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[3]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[3]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[3]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[3]->title }}
										</a>
									</h3>
								</div>
							</div>
						</div>
						@endif
						@if(isset($articles[4]))
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{ asset('storage/' . $articles[4]->thumbnail) }});">
								<a href="{{ route('site.article.show', $articles[4]->slug)}}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="{{ route('site.article.show', $articles[4]->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $articles[4]->category->name }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="{{ route('site.article.show', $articles[4]->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{ $articles[4]->title }}
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
                            @foreach( $articles->slice(4) as $article)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							
							<div class="m-b-45">
								<a href="{{route('site.article.show', $article->slug)}}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/' . $article->thumbnail) }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('site.article.show', $article->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $article->title }}
										</a>
									</h5>

									<span class="cl8">
										<a href="https://textopia.42web.io/sory/author-profile.php" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $article->author->name }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
										</span>

										<span class="f1-s-3">
											{{ $article->created_at->format('M d') }}
										</span>
									</span>
								</div>
							</div>
							
						</div>@endforeach
						
					</div>
					<!-- Pagination -->
					<div class="flex-wr-s-c m-rl--7 p-t-15">
						
					</div>
				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						@include('TezkorNews.subcribe.email')

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

									<a href="{{ route('site.article.show', $post->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
										{{ $post->title }}
									</a>
								</li>
								@endforeach
								
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<a href="https://t.me/Amirdevv">
								<img class="max-w-full" src="{{ asset('assets/images/banner-02.png') }}" alt="IMG">
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