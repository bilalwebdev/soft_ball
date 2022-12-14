<div>
    <div class="flex justify-between">
        <h2 class="intro-y text-lg font-medium mt-10">
            All Players
        </h2>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="search" class="form-control w-56 box pr-10" wire:model.debounce.500ms="search"
                        placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @foreach ($players as $player)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="" class="rounded-full" src="{{ $player->image['small'] }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="#" class="font-medium">{{ $player->name }}</a>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <a href=" {{ route('admin.edit.player', ['id' => $player->id]) }}">
                                <button class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                            </a>
                            <a class="btn btn-danger py-1 px-2"
                                wire:click="$emit('deleteFile', {{ $player->id }})">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <!-- BEGIN: Users Layout -->
        <!-- END: Pagination -->
        {{-- @if (is_array($team_players) || is_object($team_players))
        {{ $team_players->links('pagination::bootstrap-4') }}
        @else
        {{ $players->links('pagination::bootstrap-4') }}
        @endif --}}
        <!-- END: Pagination -->
    </div>
    @php
        $file = 'Player';
    @endphp
    <x-delete-entity :file="$file" />
</div>
