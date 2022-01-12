<div>
    <div class="lg:grid lg:grid-cols-1 lg:gap-8">
        <div
            class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
            <div class="py-12">
                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                    <span class="block pb-3 sm:pb-5">Search tool for CFX</span>
                </h1>
                <p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">
                    Powerful way to search information for cfx servers.
                </p>
                <div class="mt-8 sm:mt-12">
                    <div class="sm:flex">
                        <div class="min-w-0 flex-1">
                            <label for="url" class="sr-only">Email address</label>
                            <input id="url" type="text" placeholder="Enter URL" wire:model="url"
                                   class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <button wire:click="search"
                                    class="block w-full py-3 px-4 rounded-md shadow bg-red-400 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                                Search now
                            </button>
                        </div>
                    </div>
                    @error('url') <p class="mt-3 text-sm text-red-300 sm:mt-4">{{ $message }}</p>@enderror
                    <p class="mt-3 text-sm text-gray-300 sm:mt-4">Example: cfx.re/join/******.</p>
                </div>
            </div>
        </div>
    </div>
    @if($show)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 p-6">
                <div class="sm:col-span-1">
                    <div class="text-sm font-medium text-gray-500">
                        Address
                    </div>
                    <div class="mt-1 text-sm text-gray-900">
                        {{$address}}
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <div class="text-sm font-medium text-gray-500">
                        Server Name
                    </div>
                    <div class="mt-1 text-sm text-gray-900">
                        {{$server_name}}
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <div class="text-sm font-medium text-gray-500">
                        Owner Name
                    </div>
                    <div class="mt-1 text-sm text-gray-900">
                        <a class="text-sky-400" target="_blank" href="{{$owner_url}}">{{$owner_name}}</a>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <div class="text-sm font-medium text-gray-500">
                        Total Players
                    </div>
                    <div class="mt-1 text-sm text-gray-900">
                        {{$total_players}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
