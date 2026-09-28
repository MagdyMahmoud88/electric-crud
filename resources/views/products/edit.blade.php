<x-layout title="تعديل المنتج">
    <div class="max-w-xl mx-auto my-8 p-6 bg-white border rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">تعديل المنتج</h1>

        <form action="{{ route('products.update' , $product->id) }}" method="post">
            @csrf
            @method('put')
            <!-- اسم المنتج -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">اسم المنتج</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                <x-error name="name" />

            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">الوصف</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                    {{ old('description', $product->description) }}</textarea>
                <x-error name="description" />

            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2"> السعر</label>
                <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
                <x-error name="price" />

            </div>
            <button class="bg-blue-500 text-white p-2 rounded-2xl mx-auto text-center " type="submit">update</button>
        </form>

    </div>


</x-layout>