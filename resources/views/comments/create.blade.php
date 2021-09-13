
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 text-left pt-10 pb-10 py-2 leading-8">
            {{ $comment->comment }}
        </div>

        <div class="col text-right" style="color: #6c757d">
            Comment by {{ $comment->user->name }} on {{ date('jS M Y', strtotime($comment->created_at)) }}
        </div>
    </div>
    <div class="row" >
        <div class="col"> Reply to {{ auth()->user()->name }} </div>
    </div>
    <div class="row pt-10 pb-10">
        <div class="col">
            <form
                action="{{ route('comments.store', ['id' => $comment->post->id, 'comment_to' => $comment->user->name]) }}"
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
</div>
@endsection
