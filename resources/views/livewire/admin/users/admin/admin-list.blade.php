<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        All Admins
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.add.admin') }}">
                <button class="btn btn-primary shadow-md mr-2">Add New</button>
            </a>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="search" class="form-control w-56 box pr-10" wire:model.debounce.500ms="search" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @if($admins!=NULL)
        @foreach ($admins as $admin)
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="#" class="font-medium">{{ $admin->name }}</a>
                    </div>
                    <div class="flex mt-4 lg:mt-0">
                        <a href=" {{ route('admin.edit.admin', ['id'=> $admin->id]) }}">
                            <button class="btn btn-primary py-1 px-2 mr-2"> </i>Edit</button>
                        </a>
                        <a class="btn btn-danger py-1 px-2 " wire:click="$emit('deleteFile', {{ $admin->id }})"> </i>Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div>
            no data
        </div>
        @endif

        <!-- BEGIN: Users Layout -->
        <!-- END: Pagination -->
        {{ $admins->links('pagination::bootstrap-4') }}
        <!-- END: Pagination -->
    </div>
    @php
        $file = "Admin";
    @endphp
    <x-delete-entity :file="$file" />
</div>
