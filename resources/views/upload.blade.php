<!DOCTYPE html>
<html>
<head>
    <title>Subir archivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Subir archivo Excel/CSV</h2>
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <form action="http://localhost:8000/api/v1/prices/import" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="file">Seleccionar archivo:</label>
            <input type="file" name="file" class="form-control" required>
            <input type="text" name="type" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
</div>
</body>
</html>
