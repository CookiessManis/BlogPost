@extends('layouts.app')

@section('content')

    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">

                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want Read a Blog?
                </h1>
                <a href="/blog" class="text-center bg-gray-200 text-gray-700 py-2 px-4 font-bold text-xl uppercase rounded-sm">
                    Read More
                </a>
            </div>
        </div>
    </div>

   @if(empty($Post))
    <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
        <p class="text-slate-700 font-bold text-2xl underline">
            <a href="/register">
                Silahkan Login Untuk Melakukan Penambahan Posts pada Blog Ini
            </a>
        </p>
    </div>

    @else()
    <div class="sm:grid grid-cols-2 gap-20 w-4/5   mx-auto py-20 border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2017/03/18/16/42/video-game-2154473_1280.png"
            width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block pv-4">
            <h2 class="text-4xl font-extrabold text-gray-600">
                {{ $Post->title }}
            </h2>

            <p class="py-8 text-gray-500 text-s pb-9">
                {{ $Post->description }}
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find Out More

            </a>
        </div>
    </div>

    @endif

    <div class="text-center py-20 bg-black text-white">
        <div class="px-4 py-4">

            <h2 class="text-2xl pb-5 text-l">
                Lorem, ipsum dolor.
            </h2>
            <span class="font-extrabold block text-4xl py-1">
                Lorem ipsum dolor sit.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem ipsum dolor sit.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem ipsum dolor sit.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem ipsum dolor sit.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem ipsum dolor sit.
            </span>
        </div>
    </div>

    <div class="text-center py-20">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse dignissimos veritatis ab.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto ">
        <div class="flex bg-yellow-700 text-gray-100 pt-10 px-4">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PIECPI
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. At doloribus doloremque libero a quaerat, itaque, fugit nesciunt esse velit, consequuntur ducimus modi rem saepe obcaecati qui culpa aspernatur possimus id.
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>

            </div>

        </div>
        <div class="px-4">
            <img src="https://cdn.pixabay.com/photo/2017/03/18/16/42/video-game-2154473_1280.png"
            width="700" alt="">
        </div>
    </div>
@endsection
