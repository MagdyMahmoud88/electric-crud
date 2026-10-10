<x-layout>
    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">المنتجات والخدمات</h1>

        <!-- أزرار التصنيفات -->
        <div class="flex gap-2 mb-6 overflow-x-auto pb-2">
            <a href="{{ route('products.index') }}"
                class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 transition">الكل</a>
            @foreach ($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}"
                class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 transition">
                {{ $category->name }}
            </a>
            @endforeach
        </div>

        <!-- رسالة النجاح -->
        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            x-transition.duration.500ms class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- نموذج البحث -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-6 flex gap-2">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن منتج..."
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">بحث</button>
        </form>

        <!-- شبكة المنتجات -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ( $products as $product )
            <!-- الكارد الرئيسي الموحد -->
            <div
                class="border rounded-xl bg-white shadow-sm hover:shadow-md transition flex flex-col overflow-hidden h-full">

                <!-- 1. صورة المنتج -->
                @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-48 object-contain bg-white p-4 border-b border-gray-100">
                @else
                <div class="w-full h-48 bg-gray-50 border-b border-gray-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                @endif

                <!-- 2. تفاصيل المنتج -->
                <div class="p-5 flex flex-col flex-1">
                    <a href="{{ route('products.show', $product->id) }}" class="block group mb-4">
                        <h2
                            class="font-bold text-xl text-gray-800 group-hover:text-blue-600 transition line-clamp-2 h-14">
                            {{ $product->name }}
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">{{ $product->category?->name }}</p>

                        <p class="text-gray-600 mt-2 text-sm leading-relaxed line-clamp-2 h-14">
                            {{ $product->description }}
                        </p>
                        <p class="text-blue-600 font-bold text-lg mt-3">
                            {{ number_format($product->price) }} جنيه
                        </p>
                    </a>

                    <!-- 3. أزرار التحكم داخل الكارد في الأسفل -->
                    <div class="mt-auto pt-3 border-t border-gray-100 flex items-center justify-end gap-2">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="px-3 py-1.5 text-sm font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition">
                            عرض
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

            </div>
            @empty
            <div class="col-span-full p-6 text-center text-gray-500 bg-gray-50 rounded-lg border border-dashed">
                لا توجد منتجات متاحة حالياً.
            </div>
            @endforelse
        </div>

        <!-- الترقيم (Pagination) -->
        <div class="mt-6">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</x-layout>