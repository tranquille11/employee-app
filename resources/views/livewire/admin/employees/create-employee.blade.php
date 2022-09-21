<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between py-5">
                <div class="flex">
                    <span class="text-2xl font-extrabold self-end"> Create employee </span>
                </div>
            </div>

            <form wire:submit.prevent="store">
                @csrf
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 p-5">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Name must match the employee's government ID.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <div class="overflow-hidden shadow sm:rounded-md">
                                    <div class="bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Name <span
                                                        class="text-red-600">*</span></label>

                                                <input wire:model="name" type="text" name="name" id="first-name" class="mt-1 block w-full
                                                rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('name') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="email" autocomplete="new-email" type="email" name="email" id="email-address"
                                                       class="mt-1
                                                block
                                                w-full
                                                rounded-md
                                                border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                >
                                                @error('email') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="phone" type="text" name="phone" id="phone_number"  class="mt-1 block w-full
                                                rounded-md
                                                border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('phone') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="password" class="block text-sm font-medium text-gray-700">Password <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="password" type="password" autocomplete="new-password" name="password"
                                                       id="password"
                                                       class="mt-1 block
                                                w-full
                                                rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('password') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 p-5">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Address</h3>
                                    <p class="mt-1 text-sm text-gray-600">Address must  match the employee's government ID.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <div class="overflow-hidden shadow sm:rounded-md">
                                    <div class="bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6">
                                                <label for="street-address" class="block text-sm font-medium text-gray-700">Street address <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="address" type="text" name="address" id="street-address"
                                                       autocomplete="street-address"
                                                       class="mt-1 block
                                                w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('address') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="country" class="block text-sm font-medium text-gray-700">Country <span
                                                        class="text-red-600">*</span></label>
                                                <select wire:model="country" id="country" name="country" autocomplete="country-name" class="mt-1
                                                block w-full
                                                rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                    <option value="Romania">Romania</option>
                                                </select>
                                                @error('country') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>
                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">City <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="city" type="text" name="city" id="city" autocomplete="address-level2"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('city') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="region" class="block text-sm font-medium text-gray-700">State / Province <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="region" type="text" id="region" autocomplete="address-level1"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('region') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code <span
                                                        class="text-red-600">*</span></label>
                                                <input wire:model="postal" type="text" id="postal-code" autocomplete="postal-code" class="mt-1 block
                                                 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @error('postal') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                    <div class="md:grid md:grid-cols-3 md:gap-6 ">
                        <div class="md:col-span-1 p-5">
                            <div  class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Attachments</h3>
                                <p class="mt-1 text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">

                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div wire:ignore class="grid grid-cols-6 gap-6">
                                        <x-filepond label="Government ID" wire:model="governmentId" allowImagePreview imagePreviewMaxHeight="200"
                                                    allowFileSizeValidation maxFileSize="2mb"
                                                    acceptedFileTypes="['image/jpg', 'image/jpeg', 'image/png']"
                                                    types="jpg, jpeg or png">


                                        </x-filepond>
                                        @error('governmentId') <span class="error">{{ $message }}</span> @enderror


                                        <x-filepond label="Resumé" wire:model="resume" allowImagePreview imagePreviewMaxHeight="250"
                                                    allowFileSizeValidation maxFileSize="2mb"
                                                    acceptedFileTypes="['application/pdf']"
                                                    types="pdf"
                                        ></x-filepond>
                                        @error('resume') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                    <div class="md:grid md:grid-cols-3 md:gap-6 ">
                        <div class="md:col-span-1 p-5">
                            <div  class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Role</h3>
                                <p class="mt-1 text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">

                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <label for="role" class="block text-sm font-medium text-gray-700"> Role <span
                                                    class="text-red-600">*</span></label>
                                            <select wire:model="role" id="role"  class="mt-1 block w-full rounded-md border border-gray-300
                                        bg-white
                                        py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                    <option value="{{$role->name}}"> {{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                    <div class="md:grid md:grid-cols-3 md:gap-6 ">
                        <div class="md:col-span-1 p-5">
                            <div  class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Team</h3>
                                <p class="mt-1 text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">

                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <label for="team" class="block text-sm font-medium text-gray-700"> Team <span
                                                    class="text-red-600">*</span></label>
                                            <select wire:model="team" id="team"  class="mt-1 block w-full rounded-md border border-gray-300
                                        bg-white
                                        py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                @foreach(\App\Models\Team::all() as $team)
                                                    <option value="{{$team->id}}"> {{$team->name}} Team</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-700 py-2 text-sm px-4 font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2
                    focus:ring-indigo-500
                    focus:ring-offset-2">
                        Save
                    </button>
                </div>


{{--                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">--}}
{{--                    <div class="md:grid md:grid-cols-3 md:gap-6 ">--}}
{{--                        <div class="md:col-span-1 p-5">--}}
{{--                            <div  class="px-4 sm:px-0">--}}
{{--                                <h3 class="text-lg font-medium leading-6 text-gray-900">Tags</h3>--}}
{{--                                <p class="mt-1 text-sm text-gray-600"></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-5 md:col-span-2 md:mt-0">--}}

{{--                            <div class="overflow-hidden shadow sm:rounded-md">--}}
{{--                                <div class="bg-white px-4 py-5 sm:p-6">--}}
{{--                                    <div class="grid grid-cols-6 gap-6">--}}
{{--                                        <div class="col-span-6">--}}
{{--                                            <label for="addTag" class="block text-sm font-medium text-gray-700"> Tag </label>--}}
{{--                                            <div class="mb-2 mt-3">--}}
{{--                                            @forelse($tags as $tag)--}}
{{--                                                    <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline bg-gray-200 text-gray-900 rounded">--}}
{{--                                                        {{$tag}}--}}
{{--                                                        <button type="button" wire:click="removeTag('{{$tag}}')" class="text-sm font-bold ml-1">--}}
{{--                                                           &#x2715;--}}
{{--                                                        </button>--}}
{{--                                                    </span>--}}
{{--                                                @empty--}}

{{--                                            @endforelse--}}
{{--                                            </div>--}}
{{--                                            <input wire:keydown.enter="addTag" wire:model="tag" type="text" id="addTag" class="mt-1 block w-full--}}
{{--                                                rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"--}}
{{--                                            placeholder="Find or create tags">--}}
{{--                                            @error('tags') <span  class="text-sm text-red-600">{{ $message }}</span> @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </form>
        </div>
    </div>
</div>
