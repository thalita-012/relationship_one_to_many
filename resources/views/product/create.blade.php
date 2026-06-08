<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-50 min-h-screen p-6 sm:p-10 text-slate-800 flex justify-center items-center">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Add New Product</h1>
            <p class="text-slate-500 text-sm mt-1">Fill out the basic info to initialize item stock.</p>
        </div>

        <form action="{{ route('product.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Assign Category</label>
                <select name="category_id" id="category_id" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-indigo-500 focus:bg-white focus:outline-none transition-all" required>
                    <option value="" disabled selected>-- Choose a category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Product Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Wireless Mouse" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-indigo-500 focus:bg-white focus:outline-none transition-all" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-semibold text-slate-700 mb-1.5">Price (USD)</label>
                    <input type="number" step="0.01" min="0" name="price" id="price" placeholder="0.00" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-indigo-500 focus:bg-white focus:outline-none transition-all" required>
                </div>
                <div>
                    <label for="qty" class="block text-sm font-semibold text-slate-700 mb-1.5">Stock Quantity</label>
                    <input type="number" min="0" name="qty" id="qty" placeholder="0" class="w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-indigo-500 focus:bg-white focus:outline-none transition-all" required>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('product.index') }}" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg shadow transition-colors">Save Product</button>
            </div>
        </form>
    </div>
</body>
</html>