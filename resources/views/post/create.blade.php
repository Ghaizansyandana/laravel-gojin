@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Tambah Data Post</legend>
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Message</label>
                        <textarea name="content" class="form-control" required></textarea>
                    </div>
                    
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>
</div>