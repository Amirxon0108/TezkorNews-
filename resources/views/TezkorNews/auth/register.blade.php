@extends('TezkorNews.layouts.master')

@section('content')
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 border p-all-40 bor10">
                <h3 class="f1-m-2 cl3 m-b-30 text-center">Ro'yxatdan o'tish</h3>

                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="text" name="name" placeholder="To'liq ismingiz" required>
                    </div>

                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="password" name="password" placeholder="Parol" required>
                    </div>

                    <div class="m-b-20">
                        <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-8 cl5 plh6 p-rl-18" type="password" name="password_confirmation" placeholder="Parolni tasdiqlang" required>
                    </div>

                    <button type="submit" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15">
                        RO'YXATDAN O'TISH
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection