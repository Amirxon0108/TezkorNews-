@extends('TezkorNews.layouts.master')	
@section('content')
<style>
 .reply-section { 
    margin-left: 20px; /* Har bir daraja uchun surilish */
    border-left: 1px dashed #ccc; 
    padding-left: 15px; 
    margin-top: 10px;
}
.comment-item {
    margin-bottom: 25px;
}
</style>
	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="{{ route('site.index') }}" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="{{ route('site.blog-list-01') }}" class="breadcrumb-item f1-s-3 cl9">
					Blog 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					 Nulla non interdum metus non laoreet nisi tellus eget aliquam lorem pellentesque
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

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
								{{$article->category->category_slug}}
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								{{$article->title}}
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										{{$article->author->name}}
									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{ $article->created_at->format('d M Y') }}
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									{{$article->views_count}} views
								</span>
								<span class="f1-s-3 cl8 m-r-15">O'qish vaqti: {{ $article->reading_time }}</span>


								<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									{{$article->comments->count()}} Comment
								</a>
							</div>

							<div class="wrap-pic-max-w p-b-30">
								<img src="{{ asset('storage/' . $article->thumbnail) }}" alt="IMG">
							</div>

							<p class="f1-s-11 cl6 p-b-25">
							{{$article->excerpt}}		
						</p>

							<p class="f1-s-11 cl6 p-b-25">
								{{$article->slug}}
													</p>

							<p class="f1-s-11 cl6 p-b-25">
						{{$article->body}}	
						</p>

							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Streetstyle
									</a>

									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Crafts
									</a>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-google-plus-g m-r-7"></i>
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a>
								</div>
							</div>
						</div>
<!-- Comments Section -->
	<div class="comments-container p-t-40 p-b-40">
    <h4 class="f1-l-4 cl3 p-b-20">
        Izohlar ({{ $article->comments->count() }})
    </h4>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="comment-list">
        @forelse($article->comments->where('parent_id', null) as $comment)
            @include('partials.comments', ['comment' => $comment, 'article' => $article])
        @empty
            <div class="text-center p-t-20">
                <p class="cl8 f1-s-12">Hozircha izohlar yo'q. Birinchi bo'lib fikr bildiring!</p>
            </div>
        @endforelse
    </div>
</div>
						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>

							<p class="f1-s-13 cl8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							
							<div class="card my-4">
    <h5 class="card-header">Izoh qoldiring:</h5>
    <div class="card-body">
        <form action="{{ route('site.comment.store') }}" method="POST">
            @csrf
			 <input type="hidden" name="article_id" value="{{ $article->id }}">
            <div class="form-group mb-2">
                <input type="text" name="user_name" class="form-control" placeholder="Ismingiz" required>
            </div>
            <div class="form-group mb-2">
                <textarea name="body" class="form-control" rows="3" placeholder="Fikringizni yozing..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Yuborish</button>
        </form>
    </div>
</div>

						</div>
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
						<!-- Category -->
						<div class="p-b-60">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Category	
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Fashion
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Beauty
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Street Style
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Life Style
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div>

						<!-- Archive -->
						<div class="p-b-37">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Archive
								</h3>
							</div>

							<ul class="p-t-32">
								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											July 2018
										</span>

										<span>
											(9)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											June 2018
										</span>

										<span>
											(39)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											May 2018
										</span>

										<span>
											(29)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											April  2018
										</span>

										<span>
											(35)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											March 2018
										</span>

										<span>
											(22)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											February 2018
										</span>

										<span>
											(32)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											January 2018
										</span>

										<span>
											(21)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											December 2017
										</span>

										<span>
											(26)
										</span>
									</a>
								</li>
							</ul>
						</div>

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular Post
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-s p-b-30">
									<a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="images/popular-post-04.jpg" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
												Donec metus orci, malesuada et lectus vitae
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												Music
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 18
											</span>
										</span>
									</div>
								</li>

								<li class="flex-wr-sb-s p-b-30">
									<a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="images/popular-post-05.jpg" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
												Donec metus orci, malesuada et lectus vitae
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												Game
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 16
											</span>
										</span>
									</div>
								</li>

								<li class="flex-wr-sb-s p-b-30">
									<a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="images/popular-post-06.jpg" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
												Donec metus orci, malesuada et lectus vitae
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												Celebrity
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 12
											</span>
										</span>
									</div>
								</li>
							</ul>
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
	<script>
function showReplyForm(id) {
    // Hammasini yopish (ixtiyoriy)
    document.querySelectorAll('.reply-form-container').forEach(el => el.style.display = 'none');
    // Tanlanganni ochish
    var form = document.getElementById('reply-form-' + id);
    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
}
</script>

	@endsection
	