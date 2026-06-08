<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Category Details</h1>
        
        <div class="mb-6">
            <p class="text-gray-600"><strong>ID:</strong> {{ $category->id }}</p>
            <p class="text-gray-600 mt-2"><strong>Name:</strong> {{ $category->name }}</p>
        </div>

        <a href="{{ route('category.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded inline-block">Back to List</a>
    </div>
</body>
</html>