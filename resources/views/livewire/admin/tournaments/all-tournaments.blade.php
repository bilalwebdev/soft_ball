<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        All Tournaments
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.add.tournament') }}">
                <button class="btn btn-primary shadow-md mr-2">Add New</button>
            </a>
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
                        <th class="whitespace-nowrap">TITLE</th>
                        <th class="whitespace-nowrap">BEGINING DATE</th>
                        <th class="whitespace-nowrap">ENDING DATE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournaments as $tournament)
                        <tr class="intro-x">
                            <td>
                                <a href="#" class="font-medium whitespace-nowrap">{{ $tournament->title }}</a>
                            </td>
                            <td>
                                <a href="#" class="font-medium whitespace-nowrap">{{ \Carbon\Carbon::parse($tournament->begining_date)->format('M-d-Y') }}</a>
                            </td>
                            <td>
                                <a href="#" class="font-medium whitespace-nowrap">{{ \Carbon\Carbon::parse($tournament->ending_date)->format('M-d-Y') }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center ">
                                    <a class="flex items-center text-md mr-2" href="{{ route('admin.edit.tournament', ['slug' => $tournament->slug]) }}"> <i class="las la-edit" style="font-size: 20px"></i> Edit</a>
                                     <button class="flex items-center text-md text-danger" wire:click="$emit('deleteFile', {{ $tournament->id }})"> <i class="lar la-trash-alt"  style="font-size: 20px"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{ $tournaments->links('pagination::bootstrap-4') }}
        <!-- END: Pagination -->
    </div>
    @php
        $file = "Tournament";
    @endphp
    <x-delete-entity :file="$file" />
</div>


