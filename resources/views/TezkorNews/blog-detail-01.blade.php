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
								{{$article->category->name}}
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
							<p class="f1-s-20 cl4 p-b-25">
							{{$article->excerpt}}		
						</p>	
							<div class="wrap-pic-max-w p-b-30">
								<img src="{{ asset('storage/' . $article->thumbnail) }}" alt="IMG">
							</div>

							

							

							<p class="f1-s-11 cl6 p-b-25">
						{{ $article->body }}	
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
	<div class="p-t-20 p-b-20">
    <button class="btn btn-outline-primary btn-block f1-s-2 text-uppercase" type="button" 
            data-toggle="collapse" data-target="#commentsCollapse" 
            aria-expanded="false" aria-controls="commentsCollapse">
        <i class="fa fa-comments m-r-5"></i> 
        Izohlarni ko'rish ({{ $article->comments->count() }})
    </button>
</div>

<div class="collapse" id="commentsCollapse">
    <div class="comments-container p-all-25 bg-light border-radius-10 shadow-sm m-b-40">
        <h4 class="f1-l-4 cl3 p-b-20 border-bottom">
            Fikrlar
        </h4>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm m-t-15">
                <i class="fa fa-check-circle m-r-5"></i> {{ session('success') }}
            </div>
        @endif

        <div class="comment-list m-t-20">
            @forelse($article->comments->where('parent_id', null) as $comment)
                <div class="single-comment p-b-20 m-b-20 border-bottom-dashed">
                    @include('partials.comments', ['comment' => $comment, 'article' => $article])
                </div>
            @empty
                <div class="text-center p-t-30 p-b-30">
                    <img src="https://cdn-icons-png.flaticon.com/512/1380/1380338.png" width="50" class="opacity-05" alt="no comments">
                    <p class="cl8 f1-s-12 m-t-10">Hozircha izohlar yo'q. Birinchi bo'lib fikr bildiring!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="card my-4 shadow-sm border-0">
    <h5 class="card-header bg-white border-bottom f1-m-4 cl3">Izoh qoldiring:</h5>
    <div class="card-body">
        @auth('web_user')
            <form action="{{ route('site.comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                
                <div class="form-group mb-3">
                    <label class="f1-s-3 cl5">
                        Javob beruvchi: <span class="cl2"><strong>{{ Auth::guard('web_user')->user()->name }}</strong></span>
                    </label>
                </div>
                                    
                <div class="form-group mb-3">
                    <textarea name="body" class="form-control bo-1-rad-5 p-all-10" rows="3" placeholder="Fikringizni yozing..." required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary f1-s-12 text-uppercase">Yuborish</button>
            </form>
        @else
            <div class="alert alert-info shadow-sm p-4 text-center border-0">
                <h6 class="m-b-15 f1-m-4">Izoh qoldirish uchun tizimga kirishingiz kerak</h6>
                <p class="f1-s-13 cl8 p-b-20">
                    Fikringiz biz uchun muhim. Iltimos, ro'yxatdan o'ting yoki hisobingizga kiring.
                </p>
                <div class="flex-c-m">
                    <a href="{{ route('user.login') }}" class="btn btn-sm btn-primary m-r-10 p-rl-20">
                        <i class="fa fa-sign-in m-r-5"></i> Kirish
                    </a>
                    <a href="{{ route('user.register') }}" class="btn btn-sm btn-outline-secondary p-rl-20">
                        <i class="fa fa-user-plus m-r-5"></i> Ro'yxatdan o'tish
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>

</div> </div> 


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
    @foreach($categories as $cat)
    <li class="how-bor3 p-rl-4">
        <a href="" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
            {{ $cat->name }} ({{ $cat->articles_count }})
        </a>
    </li>
    @endforeach
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
								@foreach ($categories as $cat)
								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											{{$cat->created_at->format('M d, Y')}}
										</span>

										<span>
											({{$cat->articles_count}})
										</span>
									</a>
								</li>
								@endforeach

								
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
								@foreach($popularArticles as $pop)
<li class="flex-wr-sb-s p-b-30">
    <a href="" class="size-w-10 wrap-pic-w hov1 trans-03">
        
        <img src="{{ asset('storage/' . $pop->thumbnail) }}" alt="{{ $pop->title }}">
    </a>

    <div class="size-w-11">
        <h6 class="p-b-4">
            <a href="" class="f1-s-5 cl3 hov-cl10 trans-03">
                {{ $pop->title }}
            </a>
        </h6>
		<span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												{{ $pop->category->name }}
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												{{ $pop->created_at->format('M d') }}
											</span>
										</span>	
        <span class="cl8 txt-center p-b-24">
            <span class="f1-s-3"></span>
        </span>
    </div>
</li>
@endforeach
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
	