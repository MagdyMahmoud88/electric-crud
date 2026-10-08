<x-layout title="إضافه منتج">

    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">إضافة منتج جديد</h1>


        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <div>
                    <label class="block mb-1 font-semibold">الاسم</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2">
                    <x-error name="name" />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">الوصف</label>
                    <textarea name="description" rows="3"
                        class="w-full border rounded-lg p-2">{{ old('description') }}</textarea>
                    <x-error name="description" />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">السعر</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                        class="w-full border rounded-lg p-2">
                    <x-error name="price" />
                </div>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">صورة المنتج</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg">
                <x-error name="image" />
            </div>
            <div class="mt-4">
                <label for="category_id" class="block text-gray-700 font-semibold mb-2">القسم</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">أختر قسم</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : "" }}>{{
                        $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id" />

            </div>
            <button type="submit"
                class="bg-blue-500 text-white mx-auto px-4 py-2 rounded-lg hover:bg-blue-600 mt-6">إضافة
                المنتج</button>
        </form>
    </div>
</x-layout>