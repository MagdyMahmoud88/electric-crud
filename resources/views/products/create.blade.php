<x-layout title="إضافه منتج">

    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">إضافة منتج جديد</h1>

        <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <div>
                    <label class="block mb-1 font-semibold">الاسم</label>
                    <input type="text" name="name" class="w-full border rounded-lg p-2">
                    <x-error name="name" />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">الوصف</label>
                    <textarea name="description" rows="3" class="w-full border rounded-lg p-2"></textarea>
                    <x-error name="description" />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">السعر</label>
                    <input type="number" step="0.01" name="price" class="w-full border rounded-lg p-2">
                    <x-error name="price" />
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white mx-auto px-4 py-2 rounded-lg hover:bg-blue-600">إضافة
                المنتج</button>
        </form>
    </div>
</x-layout>