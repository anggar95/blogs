@extends('layouts.app')

@section('content')
    <div class="w-25 m-auto text-left">
        <div class="py-5">
            <h1 class="text-xl-center">
                Create Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-75 m-auto pt-2">
        <form
            action="{{ route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control bg-transparent block w-100 my-3 text-xl-left">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Description..."
                    class="form-control bg-transparent block w-100 my-3 text-xl-left"
                    rows="10"></textarea>
                <button
                    type="submit"
                    class="btn btn-primary uppercase my-3">
                    Submit Post
                </button>
            </div>
        </form>
    </div>

@endsection
