<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Category List</h1>
            <a href="{{ route('category.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add New Category</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-200 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-200 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-200 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2">{{ $category->id }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $category->name }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center space-x-2">
                            <a href="{{ route('category.show', $category->id) }}" class="text-green-500 hover:underline">View</a>
                            <a href="{{ route('category.delete', $category->id) }}" onclick="return confirm('Are you sure?')" class="text-red-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>