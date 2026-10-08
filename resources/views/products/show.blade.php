<x-layout title="عرض المنتجات">

    <div class=" max-w-2xl mx-auto bg-white border rounded-lg p-6 shadow-md">

        <div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            @if ($product->image)
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                class="w-full h-64 object-cover rounded-lg mb-4">
            @else
            <div class="w-full/2 h-40 bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
            @endif
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-xl font-bold text-blue-600">{{ $product->price }} جنيه</p>


        </div>
        <div class="mt-8 flex items-center justify-between gap-4">

            <a href="{{ route('products.index')}}" class="font-semibold"> العوده للصفحه الرئيسيه</a>

        </div>
    </div>
</x-layout>