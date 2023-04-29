@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center py-5 px-4 pb-9">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="pt-15 w-4/5 m-auto">
        <p class="font-italic bg-green-600 px-5 py-3 rounded-3xl shadow-xl text-white">
            {{ session()->get('message') }}
        </p>
    </div>
    @endif
    @if(Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create" class="bg-blue-500 font-extrabold text-gray-100 px-4 py-3 text-xs rounded-3xl shadow-lg">
                Create Post
            </a>
        </div>
    @endif

    @foreach ($posts as $item)


    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/'.$item->image_path) }}"
             alt="">
        </div>

        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $item->title }}
            </h2>


            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $item->user->name }}</span>, {{ $item->created_at->diffForHumans() }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $item->description }}
            </p>
            <a href="/blog/{{ $item->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Keep Reading</a>

            @if(isset(Auth::user()->id) && Auth::user()->id == $item->user->id)
                <span class="float-right">
                    <a href="/blog/{{ $item->slug }}/edit" class="text-gray-500 italic text-2xl hover:text-gray-700 pb-1 border-b-2 hover:border-b-5 hover:border-green-400 transition ease-out duration-200">Edit</a>
                </span>
                <span class="float-right">
                    <form action="/blog/{{ $item->slug }}" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" class="text-red-500 pr-3 italic">
                            Delete
                        </button>
                    </form>
                </span>
            @endif
        </div>
    </div>

    @endforeach

@endsection
