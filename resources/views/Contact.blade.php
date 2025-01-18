<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Contact Us Page') }}
        </h2>
    </x-slot>
    @if(Session::has('success'))
    <div class="width-12 mt-4 p-4 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center" role="alert">
    <span class="font-medium">{{Session::get('success')}}</span>
    </div>
    @endif
    <div class="my-4 w-[45%] translate-x-[60%]">
                <!-- Form title -->
                <!-- <h1 class=" text-center text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-4">Create Product
                </h1> -->
                <form action="{{route("Message.send")}}" method="POST">
                    @csrf

                    <!-- Input field for 'Name' -->
                    <div class="mt-1">
                        <label for="name"
                            class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name"
                            class="@error('name') is-invalid @enderror block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                            id="name" placeholder="Enter your Name">
                            <!-- @error('name')
                            <span class="text-center font-weight-100 text-sm  text-red-800">{{$message}}</span>
                            @enderror -->
                    </div>

                    <!-- Input field for 'Email' -->
                    <div class="mt-1">
                        <label for="Email"
                            class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email"
                            class="@error('email') is-invalid @enderror block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                            id="sku" placeholder="Enter Email">
                            <!-- @error('sku')
                            <span class="text-center font-weight-100 text-sm  text-red-800">{{$message}}</span>
                            @enderror -->
                    </div>


                    <!-- Input field for 'Message' -->
                    <div class="mt-1">
                        <label for="message"
                            class="text-sm sm:text-md font-bold text-gray-700 dark:text-gray-300">Message</label>
                        <textarea name="message" rows="4"
                            class="block w-full border border-slate-200 outline-emerald-800 px-2 py-2 text-sm sm:text-md rounded-md my-1 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                            id="message" placeholder="Enter Your Message Here"></textarea>
                    </div>

                    <!-- Save button -->
                    <button type="submit"
                        class="mt-2 px-4 py-2 bg-slate-500 rounded-sm text-white text-sm sm:text-lg shadow-lg hover:shadow-2xl hover:bg-slate-400 transition w-full">Send</button>
                </form>
            </div>
</x-app-layout>