<x-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">المنتجات والخدمات</h1>

        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            x-transition.duration.500ms class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        @forelse ( $products as $product )
        <!-- الكارد الرئيسي -->
        <div
            class="border rounded-xl p-5 mb-4 bg-white shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between">

            <!-- المحتوى القابل للضغط للذهاب للتفاصيل -->
            <a href="{{ route('products.show', $product->id) }}" class="block group mb-4">
                <h2 class="font-bold text-xl text-gray-800 group-hover:text-blue-600 transition">
                    {{ $product->name }}
                </h2>
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

    </div>
</x-layout>