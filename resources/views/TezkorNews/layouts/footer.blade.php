<!-- Footer -->
	<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.html">
								<img class="max-s-full" src="{{ asset('assets/images/icons/logo-02.png') }}" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on (+1) 96 716 6879
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Eng ko'p ko'rilgan
							</h5>
						</div>

						<ul>
							@if(isset($mostPopular[0]))
							<li class="flex-wr-sb-s p-b-20">
								<a href="{{ route('site.article.show', $mostPopular[0]->slug) }}" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/'. $mostPopular[0]->thumbnail) }}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="{{ route('site.article.show', $mostPopular[0]->slug) }}" class="f1-s-5 cl11 hov-cl10 trans-03">
											{{ $mostPopular[0]->title }}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										{{$mostPopular[0]->created_at->format('M d')}}
									</span>
								</div>
							</li>
							@endif
							@if(isset($mostPopular[1]))
							<li class="flex-wr-sb-s p-b-20">
								<a href="{{ route('site.article.show', $mostPopular[1]->slug) }}" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/'. $mostPopular[1]->thumbnail) }}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="{{ route('site.article.show', $mostPopular[1]->slug) }}" class="f1-s-5 cl11 hov-cl10 trans-03">
											{{ $mostPopular[1]->title }}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										{{$mostPopular[1]->created_at->format('M d')}}
									</span>
								</div>
							</li>
							@endif

							@if(isset($mostPopular[2]))
							<li class="flex-wr-sb-s p-b-20">
								<a href="{{ route('site.article.show', $mostPopular[2]->slug) }}" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('storage/'. $mostPopular[2]->thumbnail) }}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="{{ route('site.article.show', $mostPopular[2]->slug) }}" class="f1-s-5 cl11 hov-cl10 trans-03">
											{{ $mostPopular[2]->title }}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										{{$mostPopular[2]->created_at->format('M d')}}
									</span>
								</div>
							</li>
							@endif
						</ul>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>

						<ul class="m-t--12">
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Fashion (22)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Technology (29)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Street Style (15)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Life Style (28)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									DIY & Crafts (16)
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2018 

					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>