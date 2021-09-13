@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <a class="pl-5" href="/">&lt;-Back to Home Page</a>
            <h1 class="text-center">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <div class="w-4/5 pl-5 pt-20">
    <span style="color: #6c757d">
        Created by {{ auth()->user()->name }} on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 py-2 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>

@endsection
