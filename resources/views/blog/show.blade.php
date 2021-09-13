@extends('layouts.app')

@section('content')



        <div class="container">
            <div class="row">
                <div class="col w-4/5 m-auto text-left">
                    <div class="py-15">
                        <a class="pl-5" href="/">&lt;-Back to Home Page</a>
                        <h1 class="text-center">
                            {{ $post->title }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col w-4/5 pl-5 pt-20" style="color: #6c757d">
                    Created by {{ auth()->user()->name }} on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </div>
            </div>
            <div class="row">
                <div class="col w-4/5 pl-5 pt-8 py-2 leading-8">
                    {{ $post->description }}
                </div>
            </div>
            <div class="row pt-5">
                <div class="col">
                    <h5 style="color: #6c757d">Comments</h5>
                </div>
            </div>
            @include('comments.index')
        </div>

@endsection
