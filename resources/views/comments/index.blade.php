@if (isset($comments))
@foreach ($comments as $comment)
<div class="row">
    <div class="col-8 text-left pt-10 pb-10 py-2 leading-8">
        {{ $comment->comment }}
    </div>
    <div class="col text-right" style="color: #6c757d">
        Comment by {{ $comment->user->name }}
        @if($comment->comment_to!='')
            Replied to {{ $comment->comment_to }}
        @endif
        on {{ date('jS M Y', strtotime($comment->created_at)) }}
        <p><a href="{{ route('comments.create', ['id'=>$comment->id]) }}" class="text-center  w-33 px-6 font-weight-bold text-xl-right text-uppercase">Reply</a></p>
        @if(auth()->user()->id==$comment->user_id)
            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-left font-weight-bold text-uppercase btn-outline-info">Delete</button>
            </form>
        @endif
    </div>
</div>
@endforeach
@endif
<div class="row pt-10 pb-10">
<div class="col">
    <form
        @if (isset($comment))
            action="{{ route('comments.store', ['id' => $comment->post->id]) }}"
        @else
            action="{{ route('comments.store', ['id' => $post->id]) }}"
        @endif
        method="POST"
        enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            <textarea
                name="comment"
                id="comment"
                placeholder="Comment..."
                class="form-control bg-transparent block w-100 my-3 text-xl-left"
                rows="10"></textarea>
            <button
                type="submit"
                class="btn btn-primary uppercase my-3">
                Submit Comment
            </button>
        </div>
    </form>
</div>
</div>


