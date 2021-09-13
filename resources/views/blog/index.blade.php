@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blogs') }}<a class="float-right font-weight-bolder" href="{{ route('posts.create') }}">+</a></div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            @foreach ($posts as $post)
                                    <div class="row row-cols-2 shadow-sm">
                                        <div class="col-8 text-info pt-4 pb-16  block text-left">
                                            <h4 class="text-xl-left text-uppercase font-weight-bold">
                                                {{ $post->title }}
                                            </h4>
                                            <span class="text-sm-left text-black-50">{{ $post->created_at }}</span>
                                            <h6 class="text-sm-left text-black-50">{{ $post->slug }}...</h6>
                                        </div>
                                        <div class="col-2 text-info pt-4 pb-16  block text-left">
                                            <a href="{{ route('posts.show', $post->id) }}" class="text-center  w-33 px-6 font-weight-bold text-uppercase">Read More</a>
                                            <a href="{{ route('posts.edit', $post) }}" class="text-center  w-33 px-6 font-weight-bold text-xl-right text-uppercase">Edit it</a>
                                            <form
                                                action="{{ route('posts.destroy', $post)  }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-left font-weight-bold text-uppercase btn-outline-info">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="text-info pt-4 pb-16 w-50 text-center m-auto">{{ $posts->links('pagination::bootstrap-4') }}</div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






