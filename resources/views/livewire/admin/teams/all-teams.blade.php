<div>

    <h2 class="intro-y text-lg font-medium mt-10">
        All Teams
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." wire:model="search">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">IMAGE</th>
                        <th class="whitespace-nowrap">TEAM NAME</th>
                        <th class="whitespace-nowrap"></th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                      $i = 0;
                    @endphp
                    @foreach ($teams as $team)
                    @if(isset($manager_teams))
                     @foreach ($manager_teams[$i++] as $team)
                    <tr class="intro-x">

                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="" class="tooltip rounded-full" src="{{ $team['image']['small'] }}" title="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="font-medium whitespace-nowrap">{{ $team['title'] }}</a>
                        </td>
                        <td>
                          <button><a class="flex items-center text-md btn btn-primary" href="{{ route('admin.team.players', ['id' => $team['id']]) }}">Players</a></button>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center ">
                                <a class="flex items-center text-md mr-2 text-green-700" href="{{ route('admin.edit.team', ['slug' => $team['slug']]) }}"> <i class="las la-edit" style="font-size: 20px"></i> Edit</a>
                                 <button class="flex items-center text-md text-danger" wire:click="$emit('deleteFile', {{ $team['0'] }})"> <i class="lar la-trash-alt"  style="font-size: 20px"></i> Delete</button>
                            </div>
                        </td>
                    </tr>
                   @endforeach
                   @else
                   <tr class="intro-x">

                    <td class="">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="" class="tooltip rounded-full" src="{{ $team->image['small'] }}" title="">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $team->title }}</a>
                    </td>
                    <td>
                        <button><a class="flex items-center text-md btn btn-primary" href="{{ route('admin.team.players', ['id' => $team['id']]) }}">Players</a></button>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center ">
                            <a id="edit" class="flex items-center text-md mr-2" href="{{ route('admin.edit.team', ['slug' => $team->slug]) }}"> <i class="las la-edit" style="font-size: 20px"></i> Edit</a>
                             <button class="flex items-center text-md text-danger" wire:click="$emit('deleteFile', {{ $team->id }})"> <i class="lar la-trash-alt"  style="font-size: 20px"></i> Delete</button>
                        </div>
                    </td>
                </tr>
                   @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{ $teams->links('pagination::bootstrap-4') }}
        <!-- END: Pagination -->
    </div>
    @php
        $file = "Team";
    @endphp
    <x-delete-entity :file="$file" />
</div>

