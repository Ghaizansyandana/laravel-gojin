@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Show Data Post</legend>
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Message</label>
                        <textarea name="content" class="form-control" disabled> {{ $post->content }} </textarea>
                    </div>
                    <div class="mb-3">
                            <a href="{{ route('post.index') }}" class="btn btn-success">Kembali</a>
                    </div>

            </fieldset>
        </div>
    </div>
</div>