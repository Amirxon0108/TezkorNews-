<div class="comment-item mb-4" style="margin-left: {{ $comment->parent_id ? '40px' : '0px' }}; padding-left: 15px; border-left: {{ $comment->parent_id ? '2px solid #eee' : 'none' }};">
    <div class="d-flex align-items-start">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->webUser->name ?? 'Mehmon') }}&background=random" class="rounded-circle shadow-sm" style="width: 30px; height: 30px;">
        
        <div class="ms-3 w-100">
            <h6 class="mb-0"><strong>{{ $comment->webUser->name ?? 'Mehmon' }}</strong></h6>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            <p class="mb-1 text-dark">{{ $comment->body }}</p>

            {{-- Faqat login qilganlargagina javob berish tugmasini ko'rsatamiz --}}
            @auth('web_user')
                <span class="text-primary fw-bold" style="cursor: pointer; font-size: 12px;" onclick="showReplyForm({{ $comment->id }})">Javob berish</span>

                <div id="reply-form-{{ $comment->id }}" class="mt-2 reply-form-container" style="display: none;">
                    <form action="{{ route('site.comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        
                        {{-- Foydalanuvchi ismi avtomatik olinadi, input shart emas --}}
                        <p class="small mb-1">Javob beruvchi: <strong>{{ Auth::guard('web_user')->user()->name }}</strong></p>
                        
                        <textarea name="body" class="form-control form-control-sm mb-1" rows="2" placeholder="Javobingiz..." required></textarea>
                        <button type="submit" class="btn btn-sm btn-info text-white">Yuborish</button>
                    </form>
                </div>
            @else
                <a href="{{ route('user.login') }}" class="text-muted" style="font-size: 12px;">Javob berish uchun login qiling</a>
            @endauth

            {{-- Rekursiv javoblar --}}
            @if($comment->replies && $comment->replies->count() > 0)
                <div class="replies-list mt-3">
                    @foreach($comment->replies as $reply)
                        @include('partials.comments', ['comment' => $reply, 'article' => $article])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>