<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $nama = "ghaizan" ?>
    <h1>Halo, nama saya <?php echo $nama ?></h1>
    @php $now = Date('d M Y') @endphp
    <h2>Tanggal hari ini adalah {{$now}}</h2>
</body>
</html>