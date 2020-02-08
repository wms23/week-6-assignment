@extends('layouts.app')

@section('content')
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <text-input name="title" placeholder="Enter Title" label="Title :"></text-input>
            <textarea-input name="content" placeholder="Awesome Content Here" label="Content :"> </textarea-input>        
            <form-group label="Publish Post : ">
                <radio-item name="is_published" checked="true" label="Yes" id="is_published_yes" value="1"></radio-item>
                <radio-item name="is_published" id="is_published_no" label="No" value="0"></radio-item>
            </form-group>           
            <button class='btn btn-primary'>Save</button>
            <a href="{{route('post.index')}}" class='btn'>Cancel</a>
        </form>
    </div>



    @endsection
