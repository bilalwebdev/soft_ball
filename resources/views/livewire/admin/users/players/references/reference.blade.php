<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Reference
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 ">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form wire:submit.prevent="addReference">
                    @csrf
                    <div>
                        <label for="" class="my-1 form-label">Title</label>
                        <input id="" wire:model="title" type="text" class="form-control w-full"
                            placeholder="Title" required>
                        @error('title')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-left mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <div class="flex justify-between mt-8">
                    <h2 class="intro-y text-lg font-medium mt-10">
                        All References
                    </h2>
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                        <div class="hidden md:block mx-auto text-slate-500"></div>
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-slate-500">
                                <input type="text" class="form-control w-56 box pr-10" placeholder="Search..."
                                    wire:model="search">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <tbody>
                    @foreach ($allReferences as $reference)
                        <tr class="intro-x">
                            <td>
                                <a href="#" class="font-medium whitespace-nowrap">{{ $reference['title'] }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center ">
                                    <a class="flex items-center text-md mr-2 text-green-700"
                                        href="{{ route('admin.player.reference.edit', ['id' => $reference['id']]) }}">
                                        <i class="las la-edit" style="font-size: 20px"></i> Edit</a>
                                    <button class="flex items-center text-md text-danger"
                                        wire:click="$emit('deleteFile', {{ $reference['id'] }})"> <i
                                            class="lar la-trash-alt" style="font-size: 20px"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $allReferences->links('pagination::bootstrap-4') }}
    </div>
    @php
        $file = 'Reference';
    @endphp
    <x-delete-entity :file="$file" />
</div>
