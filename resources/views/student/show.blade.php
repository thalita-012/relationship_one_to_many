<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Student Details</h1>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Name:</label>
            <p class="text-gray-900">{{ $student->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email:</label>
            <p class="text-gray-900">{{ $student->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Phone:</label>
            <p class="text-gray-900">{{ $student->phone }}</p>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('students.index') }}" class="text-blue-500 hover:underline">Back to List</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Delete Student</button>
            </form>
        </div>
    </div>
</body>
</html>
