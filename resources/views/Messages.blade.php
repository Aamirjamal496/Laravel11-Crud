<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Messages Page') }}
        </h2>
    </x-slot>
    @if(Session::has('success'))
    <div class="width-12 mt-4 p-4 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center" role="alert">
    <span class="font-medium">{{Session::get('success')}}</span>
    </div>
    @endif

    <!-- Messages section -->
    <div class="relative overflow-x-auto mx-12 ">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $messages->links() }} <!-- This will generate the pagination controls -->
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <div class="my-3"><a href="{{route("Messages.export")}}" class="bg-slate-300 py-2 px-3 my-4 mx-2 hover:bg-slate-400 rounded-lg">Download Sheet</a></div>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message
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

                    @if($messages->isNotEmpty())
                    @foreach($messages as $message)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$message->id}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$message->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$message->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$message->message}}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($message->created_at)->format('d M, Y') }}
                        </td>
                        <td class="px-1 py-4 flex justify-center items-center space-x-2">
                            <a href="#" onclick="deleteMessage({{$message->id}})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
                            <form id="delete-message-form-{{$message->id}}" action="{{route('Message.delete',$message->id)}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
    <!-- End -->
</x-app-layout>

<script>
    function deleteMessage(id){
        if(confirm("Are you sure you want to delete this message")){
            document.getElementById('delete-message-form-'+id).submit();
        }
    }
</script>

<!-- Add responsive design tweaks -->
<style>
    @media (max-width: 768px) {
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            font-size: 12px;
        }
        .delete-button {
            padding: 6px 12px;
            font-size: 12px;
        }
    }
</style>
