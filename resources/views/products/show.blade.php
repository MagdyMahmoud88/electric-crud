<x-layout title="عرض المنتجات">

    <div class=" max-w-2xl mx-auto bg-white border rounded-lg p-6 shadow-md">

        <div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-xl font-bold text-blue-600">{{ $product->price }} جنيه</p>


        </div>
        <div class="mt-8 flex items-center justify-between gap-4">

            <a href="{{ route('products.index')}}" class="font-semibold"> العوده للصفحه الرئيسيه</a>

        </div>
    </div>
</x-layout>