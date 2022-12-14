<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"  rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div>{{Auth::user()->name}}</div>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <a href = "/posts/{{$post->id}}">
                    <h2 class='title'>{{$post -> title}}</h2>
                </a>
                <!--<a href="">{{$post->category->name}}</a>-->
                <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
                <p class='body'>{{$post -> body}}</p>
                <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <buttun type="buttun" onclick="deletePost({{$post->id}})">delete</buttun>
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts -> links()}}
        </div>
        <script>
            function deletePost(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか?')){
                    document.getElementById(`form_${id}`).submit();　//シングルクォーテーションではなくバッククォーテーション
                }
            }
        </script>
        <div class='footer'>
            <a href ="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>