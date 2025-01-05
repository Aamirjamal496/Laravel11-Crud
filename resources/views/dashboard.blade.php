<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __(' All Products') }}
        </h2>
    </x-slot>
    @if(Session::has('success'))
    <div class="width-12 mt-4 p-4 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center" role="alert">
    <span class="font-medium">{{Session::get('success')}}</span>
    </div>
    @endif

    <div class="py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4 sm:mx-12 flex flex-col">
        <div class="p-6 text-gray-900 justify-center">
            <a class="bg-slate-400 hover:bg-slate-500 text-white rounded-lg items-center py-2 px-4 my-3" href="{{ route('Product.Add');}}">Create</a>
        </div>

        <div class="relative overflow-x-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SKU
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row, repeat this for each product -->
                         @if($products->isNotEmpty())
                         @foreach($products as $product)
                         <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                             <td class="px-6 py-4">
                                 {{$product->id}}
                             </td>
                             <td class="px-6 py-4">
                             @if($product->image != "")
                             <img width="50" src="{{asset('uploads/products/'.$product->image)}}" alt="">
                             @endif
                             </td>
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             {{$product->name}}
                             </th>
                             <td class="px-6 py-4">
                             {{$product->sku}}
                             </td>
                             <td class="px-6 py-4">
                             ${{$product->price}}
                             </td>
                             <td class="px-6 py-4">
                             {{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}
                             </td>
                             <td class="px-6 py-4 flex space-x-2">
                                 <a href="{{ route('products.edit', $product) }}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Edit</a>
                                 <a href="#" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
                             </td>
                         </tr>
                         <!-- Repeat for more rows -->
                         @endforeach
                         @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-app-layout>