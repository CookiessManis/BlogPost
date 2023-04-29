@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center py-5 px-4 pb-9">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Create Posts
            </h1>
        </div>
    </div>


    <div class="w-4/5 m-auto pt-20">

        @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>

        @endif
        @if($errors->any())
        <div class="bg-red-200 py-3 px-5 rounded-3xl border-t  text-slate-700 w-300 m-auto font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="title..." class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea name="description" placeholder="Description..." class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

            <div class="bg-grey-lighter pt-15 ">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>

                            <button type="submit" class="w-44 px-5 py-3 text-extrabold bg-blue-500 text-gray-100 rounded-3xl mt-15 uppercase">
                                Submit
                            </button>

            </div>
        </form>
    </div>
@endsection
