<x-app-layout>
    <!-- component -->
<div class="my-5">
    <!-- Main container for the form, responsive to screen sizes -->
    <div class="container mx-auto max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl shadow-md dark:shadow-white py-4 px-6 sm:px-10 bg-white dark:bg-gray-800 border-emerald-500 rounded-md">

        <!-- Back button -->
        <!-- <svg class="cursor-pointer text-slate-600 w-6 h-6 text-gray-800 dark:text-white transform rotate-180" aria-hidden="true" fill="none" viewBox="0 0 16 16">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
</svg> -->
        <a href="{{ route('dashboard') }}" class="mb-1 px-4 py-2 bg-slate-600 rounded-md text-white text-sm sm:text-lg shadow-md hover:bg-slate-700 transition">
            Go Back
        </a>

        <div class="my-2">
            <!-- Form title -->
            <h1 class="text-center text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-4">Create Product</h1>

            <form action="{{route('Product.Store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input field for 'Profile Image' -->
                <div class="mt-1">
                    <label for="image" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Profile Image</label>
                    <input type="file" name="image" class="block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="image">
                </div>

                <!-- Input field for 'Name' -->
                <div class="mt-1">
                    <label for="name" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Name</label>
                    <input value="{{old('name')}}" type="text" name="name" class="@error('name') is-invalid @enderror block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="name" placeholder="Enter Product Name">
                    @error('name')
                        <span class="text-center font-weight-100 text-sm text-red-800">{{$message}}</span>
                    @enderror
                </div>

                <!-- Input field for 'SKU' -->
                <div class="mt-1">
                    <label for="sku" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">SKU</label>
                    <input value="{{old('sku')}}" type="text" name="sku" class="@error('sku') is-invalid @enderror block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="sku" placeholder="Enter Sku">
                    @error('sku')
                        <span class="text-center font-weight-100 text-sm text-red-800">{{$message}}</span>
                    @enderror
                </div>

                <!-- Input field for 'Price' -->
                <div class="mt-1">
                    <label for="price" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Price</label>
                    <input value="{{old('price')}}" type="number" name="price" step="0.01" class="@error('price') is-invalid @enderror block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="price" placeholder="Enter Price">
                    @error('price')
                        <span class="text-center font-weight-100 text-sm text-red-800">{{$message}}</span>
                    @enderror
                </div>

                <!-- Input field for 'Description' -->
                <div class="mt-1">
                    <label for="description" class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" rows="4" class="block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" id="description" placeholder="Enter Description">{{old('description')}}</textarea>
                </div>

                <!-- Save button -->
                <button type="submit" class="mt-2 px-4 py-2 bg-slate-500 rounded-sm text-white text-sm sm:text-lg shadow-lg hover:shadow-2xl hover:bg-slate-400 transition w-full">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
<!-- <<x-slot name="header"> -->
<!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight"> -->
<!-- {{ __('Crud App Dashboard') }} -->
<!-- </h2> -->
<!-- </x-slot> -->