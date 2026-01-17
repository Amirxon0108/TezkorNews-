
@extends('TezkorNews.layouts.master')
@section('content')

<style>
.about-text p {
    font-size: 18px;
    line-height: 1.8;
}
</style>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="{{ route('site.index') }}" class="breadcrumb-item f1-s-3 cl9">
					Bosh sahifa
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					Biz haqimizda
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
	<div class="container p-t-4 p-b-35">
		<h2 class="f1-l-1 cl2">
			Biz haqimizda
		</h2>
	</div>

	<!-- Content -->
	<section class="bg0 p-b-110">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991  about-text">
						<p class="f1-s-20 cl7 p-b-30">
							Bizning platformamiz — O‘zbekiston va jahon miqyosidagi eng muhim yangiliklarni tezkor, ishonchli va tushunarli tarzda yetkazib berishga qaratilgan axborot saytidir. Saytimizda siyosat, iqtisodiyot, jamiyat, texnologiya va boshqa dolzarb mavzulardagi maqolalar muntazam e’lon qilinadi.
						</p>

						<p class="f1-s-15 cl6 p-b-25">
							Biz axborotni xolislik va aniqlik tamoyillariga asoslanib taqdim etamiz. Har bir material ishonchli manbalar asosida tayyorlanadi va o‘quvchilarga sodda, tushunarli tilda yetkaziladi.
						</p>

						<p class="f1-s-15 cl6 p-b-25">
							Loyihamizning asosiy maqsadi — jamiyatda bo‘layotgan voqealardan sizni xabardor qilib borish, fikrlashga undash va dolzarb mavzular bo‘yicha tezkor ma’lumot berishdir. Biz doimo rivojlanib boramiz va sizning fikr-mulohazalaringiz biz uchun juda muhim. Yangiliklardan xabardor bo‘lish uchun saytimizni kuzatib boring.
						</p>
					</div>

				</div>
				
				<!-- Sidebar -->
				<div class="col-md-5 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-5">
						<!-- Popular Posts -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular Post
								</h3>
							</div>

							<ul class="p-t-35">
								@foreach($mostPopular as $pop)
								<li class="flex-wr-sb-s p-b-30">
									<a href="{{ route('site.article.show', $pop->slug) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
										
										<img src="{{ asset('storage/' . $pop->thumbnail) }}" alt="{{ $pop->title }}">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="{{ route('site.article.show', $pop->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
												{{ $pop->title }}
											</a>
										</h6>
										<span class="cl8 txt-center p-b-24">
																			<a href="{{ route('site.article.show', $pop->slug) }}	" class="f1-s-6 cl8 hov-cl10 trans-03">
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
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
