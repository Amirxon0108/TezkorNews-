@extends('TezkorNews.layouts.master') @section('content')
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4 border p-all-40 bor10">
                <h3 class="f1-m-2 cl3 m-b-30 text-center">Tizimga kirish</h3>

                @if ($errors->any())
                    <div class="alert alert-danger p-t-10 p-b-10 f1-s-12">
                        @foreach ($errors->all() as $error)
                            <p class="m-b-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="password" name="password" placeholder="Parol" required>
                    </div>

                    <div class="flex-s-c m-b-30">
                        <div class="size-w-0">
                            <input id="checkbox-remember" type="checkbox" name="remember">
                            <label for="checkbox-remember" class="f1-s-12 cl6">Meni eslab qol</label>
                        </div>
                    </div>

                    <button type="submit" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15">
                        KIRISH
                    </button>
                </form>

                <div class="p-t-20 text-center">
                    <span class="f1-s-12 cl6">Profilingiz yo'qmi?</span>
                    <a href="{{ route('user.register') }}" class="f1-s-12 cl10 hov-cl10 trans-03">Ro'yxatdan o'ting</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection