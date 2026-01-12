<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
    <div class="content-topbar container h-100">
        <div class="left-topbar">
            <span class="left-topbar-item flex-wr-s-c">
                <span>New York, NY</span>
                <img class="m-b-1 m-rl-8" src="{{ asset('assets/images/icons/icon-night.png') }}" alt="IMG">
                <span>HI 58° LO 56°</span>
            </span>

            <a href="{{route('site.about')}}" class="left-topbar-item">About</a>
            <a href="{{route('site.contact')}}" class="left-topbar-item">Contact</a>

            {{-- Agar foydalanuvchi tizimga kirgan bo'lsa --}}
            @auth('web_user')
                <div class="left-topbar-item flex-wr-s-c">
                    <a href="#" class="cl10 m-r-15">
                        <i class="fa fa-user m-r-5"></i> 
                        <strong>{{ Auth::guard('web_user')->user()->name }}</strong>
                    </a>

                    <a href="{{ route('user.logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="f1-s-12 cl6 hov-cl10 trans-03">
                        <i class="fa fa-sign-out-alt"></i> Chiqish
                    </a>

                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                {{-- Agar foydalanuvchi kirmagan bo'lsa --}}
                <a href="{{ route('user.register') }}" class="left-topbar-item">Sign up</a>
                <a href="{{ route('user.login') }}" class="left-topbar-item">Log in</a>
            @endauth
        </div>

        <div class="right-topbar">
            <a href="#"><span class="fab fa-facebook-f"></span></a>
            <a href="#"><span class="fab fa-twitter"></span></a>
            <a href="#"><span class="fab fa-pinterest-p"></span></a>
            <a href="#"><span class="fab fa-vimeo-v"></span></a>
            <a href="#"><span class="fab fa-youtube"></span></a>
        </div>
    </div>
</div> 

			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->		
				<div class="logo-mobile">
					<a href="index.html"><img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="topbar-mobile">
					<li class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="{{ asset('assets/images/icons/icon-night.png') }}" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>
					</li>

					<li class="left-topbar">
						<a href="{{route('site.about')}}" class="left-topbar-item">
							About
						</a>

						<a href="{{route('site.contact')}}" class="left-topbar-item">
							Contact
						</a>

						<a href="#" class="left-topbar-item">
							Sing up
						</a>

						<a href="#" class="left-topbar-item">
							Log in
						</a>
					</li>

					<li class="right-topbar">
						<a href="#">
							<span class="fab fa-facebook-f"></span>
						</a>

						<a href="#">
							<span class="fab fa-twitter"></span>
						</a>

						<a href="#">
							<span class="fab fa-pinterest-p"></span>
						</a>

						<a href="#">
							<span class="fab fa-vimeo-v"></span>
						</a>

						<a href="#">
							<span class="fab fa-youtube"></span>
						</a>
					</li>
				</ul>

				<ul class="main-menu-m">
					<li>
						<a href="{{ route('site.index') }}">Home</a>
						<ul class="sub-menu-m">
							<li><a href="{{ route('site.index') }}">Homepage v1</a></li>
							<li><a href="">Homepage v2</a></li>
							<li><a href="">Homepage v3</a></li>
						</ul>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="{{ route('site.category.show', 'moliya') }}">Moliya</a>
					</li>

					<li>
						<a href="{{ route('site.category.show', 'talim') }}">Ta'lim</a>
					</li>

					

					<li>
						<a href="{{ route('site.category.show', 'siyosat') }}">Siyosat</a>
					</li>
<li>
						<a href="{{ route('site.category.show', 'biznes') }}">Biznes</a>
					</li>
					<li>
						<a href="{{ route('site.category.show', 'jahon') }}">Jahon</a>
					</li>

					<li>
						<a href="{{ route('site.category.show', 'jamiyat') }}">Jamiyat</a>
					</li>

					<li>
						<a href="#">Features</a>
						<ul class="sub-menu-m">
							<li><a href="">Category Page v1</a></li>
							<li><a href="">Category Page v2</a></li>
							<li><a href="">Blog Grid Sidebar</a></li>
							<li><a href="">Blog List Sidebar v1</a></li>
							<li><a href="">Blog List Sidebar v2</a></li>
							<li><a href="">Blog Detail Sidebar</a></li>
							<li><a href="">Blog Detail No Sidebar</a></li>
							<li><a href="{{ route('site.about') }}">About Us</a></li>
							<li><a href="{{ route('site.contact') }}">Contact Us</a></li>
						</ul>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>
				</ul>
			</div>
			
			<!--  -->
			<div class="wrap-logo container">
				<!-- Logo desktop -->		
				<div class="logo">
					<a href="index.html"><img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header">
					<a href="https://themewagon.com/themes/free-bootstrap-4-html5-moliya-website-template-magmoliya2/"><img src="{{ asset('assets/images/banner-01.jpg') }}" alt="IMG"></a>
				</div>
			</div>	
			
			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.html">
							<img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="LOGO">
						</a>

						<ul class="main-menu">
							<li class="main-menu-active">
								<a href="{{route('site.index')}}">Home</a>
								<ul class="sub-menu">
									<li><a href="index.html">Homepage v1</a></li>
									<li><a href="home-02.html">Homepage v2</a></li>
									<li><a href="home-03.html">Homepage v3</a></li>
								</ul>
							</li>
						@foreach($header_categories as $cat)
    <li class="mega-menu-item">
        <a href="{{ route('site.category.show', $cat->slug) }}">{{ $cat->name }}</a>

        <div class="sub-mega-menu">
            <div class="nav flex-column nav-pills" role="tablist">
                {{-- ID unikal bo'lishi shart --}}
                <a class="nav-link active" data-toggle="pill" href="#header-cat-{{ $cat->id }}" role="tab">All</a>
            </div>

            <div class="tab-content">
                {{-- Klassda 'fade show active' bo'lishi barcha kategoriyalar uchun ma'lumotni darhol ko'rsatadi --}}
                <div class="tab-pane fade show active" id="header-cat-{{ $cat->id }}" role="tabpanel">
                    <div class="row">
                        @forelse($cat->articles as $article)
                            <div class="col-3">
                                <div>
                                    <a href="{{ route('site.article.show', $article->slug) }}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}">
                                    </a>

                                    <div class="p-t-10">
                                        <h5 class="p-b-5">
                                            <a href="{{ route('site.article.show', $article->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{ Str::limit($article->title, 45) }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="{{ route('site.category.show', $cat->slug) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                {{ $cat->name }}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">-</span>
                                            <span class="f1-s-3">
                                                {{ $article->created_at->format('M d, Y') }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 p-l-30">
                                <p class="f1-s-1 cl8">Ushbu bo'limda ({{ $cat->name }}) hozircha maqolalar mavjud emas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
							
							
							<li>
								<a href="#">Features</a>
								<ul class="sub-menu">
									<li><a href="{{ route('site.category.show', 'moliya') }}">Category Page v1</a></li>
									<li><a href="{{ route('site.category.show', 'moliya') }}">Category Page v2</a></li>
									<li><a href="{{ route('site.blog-grid') }}">Blog Grid `Sidebar`</a></li>
									<li><a href="{{ route('site.blog-list-01') }}">Blog List Sidebar v1</a></li>
									<li><a href="{{ route('site.blog-list-02') }}">Blog List Sidebar v2</a></li>
									<li><a href="{{ route('site.blog-detail-01') }}">Blog Detail Sidebar</a></li>
									<li><a href="{{ route('site.blog-detail-02') }}">Blog Detail No Sidebar</a></li>
									<li><a href="{{ route('site.about') }}">About Us</a></li>
									<li><a href="{{ route('site.contact') }}">Contact Us</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>	
		</div>
	</header>