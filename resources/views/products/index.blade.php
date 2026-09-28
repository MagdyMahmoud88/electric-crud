<x-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">المنتجات والخدمات</h1>

        @foreach ($products as $product)
        <div class="border rounded-lg p-4 mb-3 bg-white">
            <h2 class="font-bold text-lg">{{ $product->name }}</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-blue-600 font-semibold mt-2">{{ $product->price }} جنيه</p>
        </div>
        @endforeach
    </div>
</x-layout>