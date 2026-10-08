<x-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">المنتجات والخدمات</h1>
        <div class="flex gap-2 mb-6">
            <a href="{{ route('products.index') }}" class="px-3 py-1.5 rounded-lg bg-gray-100">الكل</a>
            @foreach ($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}"
                class="px-3 py-1.5 rounded-lg bg-gray-100">
                {{ $category->name }}
            </a>
            @endforeach
        </div>

        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            x-transition.duration.500ms class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('products.index') }}" method="GET" class="mb-6 flex gap-2">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن منتج..."
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg">بحث</button>
        </form>
        @forelse ( $products as $product )
        <!-- الكارد الرئيسي -->
        <div
            class="border rounded-xl p-5 mb-4 bg-white shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between">

            <!-- المحتوى القابل للضغط للذهاب للتفاصيل -->
            <a href="{{ route('products.show', $product->id) }}" class="block group mb-4">
                <h2 class="font-bold text-xl text-gray-800 group-hover:text-blue-600 transition">
                    {{ $product->name }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">{{ $product->category->name }}</p>
                @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                    class="w-full/2 h-64 object-cover rounded-lg mb-4">
                @else
                <div class="w-full h-40 bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                @endif
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                    {{ $product->description }}
                </p>
                <p class="text-blue-600 font-bold text-lg mt-3">
                    {{ $product->price }} جنيه
                </p>

            </a>

            <!-- خط فاصل خفيف بين المحتوى والأزرار -->
            <hr class="border-gray-100 my-2">


            <!-- شريط الإجراءات (تعديل وحذف) داخل الكارد -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('products.show', $product->id) }}"
                    class="px-3 py-1.5 text-sm font-medium text-green-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                    عرض المنتج
                </a>
                <a href="{{ route('products.edit', $product->id) }}"
                    class="px-3 py-1.5 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                    تعديل
                </a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                    onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                        حذف
                    </button>
                </form>
            </div>

        </div>
        @empty
        <div class="p-6 text-center text-gray-500 bg-gray-50 rounded-lg border border-dashed">
            لا توجد منتجات متاحة حالياً.
        </div>
        @endforelse
        <div class="mt-6">
            {{ $products->appends(request()->query())->links() }}

        </div>
</x-layout>
