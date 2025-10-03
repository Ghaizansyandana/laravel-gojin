@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Tambah Data Post</legend>
                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Message</label>
                        <textarea name="content" class="form-control" {{ $post->content }} required></textarea>
                    </div>
                    
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>
</div>