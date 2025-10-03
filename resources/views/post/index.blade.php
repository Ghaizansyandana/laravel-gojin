@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <fieldset>
                    <legend>Daftar Post</legend>
                    <a href="{{ route('post.create') }}" class="btn btn-sm-primary" style="align:float-right">
                        Tambah data
                    </a>
                    <div class="table-responsive py-4 my-4">
                        <table border="1" cellpadding="8" border="1">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($post as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{Str::limit($data->content, 100) }}</td>
                                <th>
                                    <form action="{{ route('post.delete', $data->id) }}" method="post" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('post.edit', $data->id) }}" class="btn btn-sm btn-success">
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </table>                        
                    </div>
                   
                </fieldset>     
            </div>                    
    </div>
</div>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
  </footer>
</div>
</body>
</html>

@endsection