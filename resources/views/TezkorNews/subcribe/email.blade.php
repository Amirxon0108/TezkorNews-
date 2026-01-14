<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
							<h5 class="f1-m-5 cl0 p-b-10">
								Obuna bo'ling
							</h5>
							@if (session('esuccess'))
    <div class="alert alert-success">{{ session('esuccess') }}</div>
@endif
							<p class="f1-s-1 cl0 p-b-25">
								Eng oxirgi yangiliklar emailingizga yuboriladi!
							</p>

							<form class="size-a-9 pos-relative" action="{{route('site.email.store')}}" method="POST" >
							@csrf	
							<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Emailingizni kiriting">

								<button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						</div>