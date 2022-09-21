<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10">
    <div class="flex justify-between py-5">
        <div class="flex align-bottom">
            <span class="text-2xl font-extrabold self-end"> Talkdesk calls </span>
        </div>
        <div>
            <button type="button" class="inline-block px-7 py-3 bg-indigo-700 rounded-md text-white text-sm font-bold leading-snug uppercase shadow-md
             hover:bg-indigo-800 hover:shadow-lg focus:bg-indigo-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800
             active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-toggle="modal" data-bs-target="#importModal">
                Import
            </button>
        </div>
        <div wire:ignore.self class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="importModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                            Import calls
                        </h5>
                        <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="import">
                        @csrf
                        <div class="modal-body relative p-4">

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="default_size">Upload (CSV format only)</label>
                                <input wire:model="file" class="block mb-3 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 cursor-pointer focus:outline-none " id="default_size" type="file">
                                @error('file') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <span class="text-sm font-medium">Download sample report:
                                    <button type="button" wire:click="exportCSVTemplate" class="text-blue-800 underline text-sm font-medium">talkdesk-template.csv</button>
                                </span>
                            </div>
                        </div>
                        <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                            <button type="button" class="mr-3 inline-block px-5 py-2.5 border-2 border-indigo-700 text-indigo-700 font-semibold text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0
                            transition duration-150 ease-in-out" data-bs-dismiss="modal">
                                Close
                            </button>

                            <button wire:loading.attr="disabled" wire:loading.class="bg-opacity-75" wire:target="file" type="submit" class="inline-block px-5 py-2.5 bg-indigo-700 rounded text-white text-xs font-medium leading-snug uppercase shadow-md
                                     hover:bg-indigo-800 hover:shadow-lg focus:bg-indigo-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800
                                     active:shadow-lg transition duration-150 ease-in-out">
                                Import
                                <div wire:loading role="status">
                                    <svg class="inline ml-1 w-3 h-3 text-gray-200 animate-spin fill-indigo-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @error('import')
    <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{$message}}</span>
            <ul class="mt-1.5 ml-4 text-red-700 list-disc list-inside">
                <li>There are no duplicate calls on the report</li>
                <li>Calls aren't already in the database</li>
                <li>Make sure report has the right columns. Download the template to check.</li>
            </ul>
        </div>
    </div>
    @enderror
    @if(session()->has('success'))
        <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success!</span> {{session()->get('success')}}
            </div>
        </div>
    @endif
         <div wire:loading.flex wire:target="import" class="flex p-4 mb-4 text-sm text-indigo-700 bg-indigo-100 rounded-lg" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium mr-4">
                    Importing calls...
                </span>
                <svg class="inline mr-2 w-4 h-4 text-white animate-spin fill-indigo-700" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Interaction ID
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Call type
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Start time
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    End time
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Talkdesk Phone Number
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Talk Time
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Record
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Wait time
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    User ID
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Disposition Code
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Transfer?
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Handling user ID
                </th>
                <th scope="col" class="py-3 px-6 text-indigo-800">
                    Tags
                </th>
            </tr>
            </thead>
            <tbody>

            @forelse($calls as $call)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{$call->interaction_id}}
                    </th>
                    <td class="py-2 px-6">
                        {{$call->call_type}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{\Illuminate\Support\Carbon::parse($call->start_time)->format('Y-m-d H:i')}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{\Illuminate\Support\Carbon::parse($call->end_time)->format('Y-m-d H:i')}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->talkdesk_phone}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->talk_time}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->record}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                       {{$call->wait_time}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->user_id}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->disposition_code}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->transfer}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->handling_user_id}}
                    </td>
                    <td class="py-2 px-6 whitespace-nowrap">
                        {{$call->tag}}
                    </td>
                </tr>

            @empty
                <td class="py-2 px-6 whitespace-nowrap">
                    No results
                </td>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
