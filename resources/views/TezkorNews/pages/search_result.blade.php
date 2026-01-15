@extends('TezkorNews.layouts.master')
@section('content')

	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					Blog
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
    <form action="{{ route('site.site.search.result') }}" method="GET">
        <input 
            class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45"
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search">
            
        <button type="submit" class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
            <i class="zmdi zmdi-search"></i>
        </button>
    </form>
</div>

		</div>
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			Blog List
		</h2>
	</div>

	<!-- Post -->
	<section class="bg0 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<div class="m-t--40 p-b-40">
							<!-- Item post -->
                             @foreach($articles as $article)
							<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
								<a href="{{route('site.article.show', $article->slug)}}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
									<img src="{{asset('storage/'. $article->thumbnail)}}" alt="IMG">
								</a>

								<div class="size-w-9 w-full-sr575 m-b-25">
									<h5 class="p-b-12">
										<a href="{{route('site.article.show', $article->slug)}}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
											{{ $article->title }}
										</a>
									</h5>

									<div class="cl8 p-b-18">
										<a href="https://textopia.42web.io/sory/profile" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{$article->author->name}}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{{ $article->created_at->format('M d') }}
										</span>
									</div>

									<p class="f1-s-1 cl6 p-b-24">
										{{Str::limit($article->excerpt)}}
									</p>

									<a href="{{route('site.article.show', $article->slug)}}" class="f1-s-1 cl9 hov-cl10 trans-03">
										Davomini o'qish
										<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>
                            @endforeach

							
						</div>

						<a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							{{ $articles->links('pagination::bootstrap-4') }}
						</a>
                        <div class="flex-c-c p-t-40">
					{{ $articles->links('pagination::bootstrap-4') }}
					</div>
			 	 </div>
				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
						@include('TezkorNews.subcribe.email')

						<!-- Most Popular -->
						<div class="p-b-23">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Eng ko'p ko'rilgan
								</h3>
							</div>

							<ul class="p-t-35">
                                @foreach($mostPopular as $article)
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										eng
									</div>

									<a href="{{ route('site.article.show', $article->slug) }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
										{{$article->title}}
									</a>
								</li>
                                @endforeach
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<a href="https://amirdevv.page.gd/pages/index.php#services">
								<img class="max-w-full" src="{{ asset('assets/images/banner-02.png')}}" alt="IMG">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	@endsection