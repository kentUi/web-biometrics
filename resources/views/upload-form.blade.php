<!-- resources/views/upload-form.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Upload TSV File</title>
</head>
<body>
    <h1>Upload a TSV File</h1>
    <form action="{{ route('processFile1') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
