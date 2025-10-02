<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
</head>
<body>
    <h1>Daftar Post</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        @foreach ($post as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->content }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
