<div class="py-5 px-10">
    <div class="flex justify-between py-5">
        <div class="flex">
            <span class="text-2xl font-extrabold self-end"> Employees </span>
        </div>
        <div>
            <button type="button" class="inline-block px-7 py-3 bg-indigo-700 rounded-md text-white text-sm font-bold leading-snug uppercase shadow-md
             hover:bg-indigo-800 hover:shadow-lg focus:bg-indigo-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800
             active:shadow-lg transition duration-150 ease-in-out">
                <a href="{{route('employees.create')}}"> Create </a>
            </button>
        </div>
    </div>

    <div>
        <div class="flex flex-col">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow-md">
                        <div class="flex items-center bg-white p-5 rounded-t-lg shadow-lg">
                            <div class="flex-grow">
                                <input wire:model.debounce.500ms="search" type="search" class=" text-sm border-gray-300 rounded-sm w-full" placeholder="Search..."/>
                            </div>
                            <div class="flex ml-3">
                                <div>
                                    <button class="border border-gray-300 rounded-sm py-2 px-5 text-sm font-bold hover:bg-gray-100" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                        <i class="fa-solid fa-filter"></i>
                                        <span class="ml-2"> Filters </span>
                                    </button>
                                </div>
                                <div>
                                    <button class="border border-gray-300 dropdown-toggle border border-l-0 rounded-sm py-2 px-5 text-sm font-bold
                                    hover:bg-gray-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-arrow-up-a-z"></i>
                                        <span class="ml-2"> Sort </span>
                                    </button>
                                    <ul class="dropdown-menu min-w-max  hidden bg-white text-base z-50  float-left  list-none  text-left
                                    rounded-lg shadow-lg hidden m-0  bg-clip-padding  border-none allow-focus" aria-labelledby="dropdownMenuButton1">
                                        <li class="px-4 mt-2">
                                            <span class="text-sm font-bold text-black">Sort by:</span>
                                        </li>
                                        <li class="px-4 mt-2">
                                            <div class="form-check">
                                                <input wire:model="sortField" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300
                            bg-white
                            checked:bg-blue-600
                             checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain
                             float-left mr-2 cursor-pointer" value="name" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                                <label class="form-check-label inline-block text-gray-800 text-sm" for="flexRadioDefault1">
                                                    Name
                                                </label>
                                            </div>
                                        </li>
                                        <li class="px-4 pb-2">
                                            <div class="form-check">
                                                <input wire:model="sortField" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300
                            bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top
                            bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" value="created_at" type="radio" name="flexRadioDefault"
                                                       id="flexRadioDefault2" checked />
                                                <label class="form-check-label inline-block text-gray-800 text-sm" for="flexRadioDefault2">
                                                    Date
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="w-full border-t">
                                                <ul class="px-4 py-3">
                                                    <li>
                                                        <button wire:click="sortVertically('asc')" class="{{$sortDirection == 'asc' ?
                                                        'text-blue-600' : ''}}">
                                                            <i class="fa-solid fa-arrow-up"></i>
                                                            <span class="ml-2 text-sm hover:underline">Oldest to newest</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button wire:click="sortVertically('desc')" class="{{$sortDirection == 'desc' ?
                                                        'text-blue-600'
                                                         : ''}}">
                                                            <i class="fa-solid fa-arrow-down"></i>
                                                            <span class="ml-2 text-sm hover:underline">Newest to oldest</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="bg-white w-full flex justify-center items-center">
                            <div wire:loading wire:target="search" class="ml-5 spinner-border animate-spin inline-block w-6 h-6 border-3 rounded-full"
                                 role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="relative bg-white shadow-sm">
                            <div class="flex justify-start items-center bg-white rounded h-16 top-0 w-full {{$selectedUsers->count() == 0 ?
                            'hidden' :
                            ''}}">
                                <div class="border border-gray-300 rounded-sm px-4 py-1 ml-2">
                                    <input wire:click="addAllUsersToBulkAction" class="appearance-none h-4 w-4 border border-gray-300 rounded-sm
                                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200  bg-no-repeat
                                    bg-center bg-contain cursor-pointer" type="checkbox" id="flexCheckChecked3"
                                         {{ $users->intersect($selectedUsers)->count() == $users->count() && $selectedUsers->count() > 0  &&
                                        $users->count() > 0 ? 'checked' : ''}}  />
                                    <span class="text-sm font-bold ml-3"> {{ $selectedUsers->count() }} selected</span>
                                </div>
                                <div class="border border-gray-300 border-l-0 ">
                                    <button class="px-3 py-1 hover:bg-gray-100" wire:click="testAction">
                                        <span class="text-sm font-bold">Add tags</span>
                                    </button>
                                </div>
                                <div class="border border-gray-300 border-l-0">
                                    <button class="px-3 py-1 hover:bg-gray-100">
                                        <span class="text-sm font-bold">Add roles</span>
                                    </button>
                                </div>
                                <div class="border border-gray-300 border-l-0">
                                    <button class="hover:bg-gray-100 px-3 py-1">
                                        <span class="text-sm font-bold">Add team</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table class="min-w-full text-left">
                            <thead class="border-b bg-white">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2 w-1">
                                    <input wire:click="addAllUsersToBulkAction" class="appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white
                                    checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200  bg-no-repeat bg-center bg-contain cursor-pointer"
                                     type="checkbox" id="flexCheckChecked3"
                                        {{  $users->intersect($selectedUsers)->count() == $users->count() && $selectedUsers->count() > 0 &&
                                        $users->count() > 0?
                                         'checked' : ''}}  />
                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-700 py-2 px-4">

                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-900 py-2 px-4">
                                    Name
                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-900 py-2 px-4">
                                    Phone
                                </th>

                                <th scope="col" class="text-xs font-semibold text-indigo-900 py-2 px-4">
                                    Role
                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-900  py-2 px-4">
                                    Tags
                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-900 py-2 px-4">
                                    Team
                                </th>
                                <th scope="col" class="text-xs font-semibold text-indigo-900  py-2 px-4">
                                    Created
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white border-b  {{$this->selectedUsers->find($user) ? 'bg-gray-50' : ''}}">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div class="form-check">
                                            <input wire:click="addUserToBulkAction({{$user}})"
                                                   class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white
                                        checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top
                                        bg-no-repeat bg-center bg-contain cursor-pointer"
                                                   type="checkbox"
                                                   id="flexCheckChecked3"
                                            {{$this->selectedUsers->find($user) ? 'checked'  : ''}} />
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <span class="text-xs inline-block py-1 px-2.5 leading-none whitespace-nowrap align-baseline
                                        font-bold {{ $user->trashed() ? 'bg-gray-100 text-gray-800' : 'bg-green-100
                                        text-green-800'
                                        }} rounded-xl">
                                            {{ $user->trashed() ? 'Disabled' : "Active" }}
                                        </span>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light py-1 whitespace-nowrap px-4">
                                        <a href="#!" class="hover:text-indigo-900 transition duration-300 ease-in-out">
                                            <div><span class="font-semibold">{{$user->name}}</span></div>
                                            <div><span>{{$user->email}}</span></div>
                                        </a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light py-1 whitespace-nowrap px-4">
                                        <span> {{$user->phone}} </span>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light py-2 px-4 whitespace-nowrap">
                                        <span> {{$user->roles->first()->name}} </span>
                                    </td>
                                    <td class="py-2 px-4 whitespace-nowrap">
                                    <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline
                                    font-semibold bg-gray-100 text-gray-800 rounded">
                                       english
                                    </span>
                                        <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline
                                    font-semibold bg-gray-100 text-gray-800 rounded">
                                       spanish
                                    </span>
                                        <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline
                                    font-semibold bg-gray-100 text-gray-800 rounded">
                                            schedule::other-brands
                                    </span>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light py-2 px-4 whitespace-nowrap">
                                        steve madden
                                    </td>
                                    <td class="text-sm text-gray-900 font-light py-2 px-4 whitespace-nowrap">
                                        {{ $user->created_at->format('F j, Y  g:i A')  }}
                                    </td>
                                </tr>
                            @empty
                                <td class="text-sm text-gray-800 font-light px-6 py-2 whitespace-nowrap">
                                    No results
                                </td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-96" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header flex items-center justify-between p-4">
            <h5 class="offcanvas-title mb-0 leading-normal font-semibold" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow p-4 overflow-y-auto">
            ...
        </div>
    </div>
</div>
