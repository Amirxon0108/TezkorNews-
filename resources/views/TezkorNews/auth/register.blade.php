@extends('TezkorNews.layouts.master')

@section('content')
<div class="container p-t-100 p-b-100">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="f1-l-4 cl3 p-b-20 text-center">Ro'yxatdan o'tish</h4>
            
            <form action="{{ route('register') }}" method="POST" class="bo-all-1 bocl11 p-all-30">
                @csrf
                
                <div class="m-b-20">
                    <input class="bo-all-1 bocl11 size-a-20 f1-s-13 cl5 plh6 p-rl-20 w-full" type="text" name="name" placeholder="Ismingiz" value="{{ old('name') }}" required>
                    @error('name') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                </div>

                <div class="m-b-20">
                    <input class="bo-all-1 bocl11 size-a-20 f1-s-13 cl5 plh6 p-rl-20 w-full" type="email" name="email" placeholder="Email manzilingiz" value="{{ old('email') }}" required>
                    @error('email') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                </div>

                <div class="m-b-20">
                    <input class="bo-all-1 bocl11 size-a-20 f1-s-13 cl5 plh6 p-rl-20 w-full" type="password" name="password" placeholder="Parol" required>
                    @error('password') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                </div>

                <div class="m-b-20">
                    <input class="bo-all-1 bocl11 size-a-20 f1-s-13 cl5 plh6 p-rl-20 w-full" type="password" name="password_confirmation" placeholder="Parolni tasdiqlang" required>
                </div>

                <button type="submit" class="size-a-20 bg10 f1-s-12 cl0 hov-btn1 trans-03 w-full">RO'YXATDAN O'TISH</button>
                
                <div class="p-t-20 text-center">
                    <a href="{{ route('login') }}" class="f1-s-12 cl8">Profilingiz bormi? Kirish</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection