<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Tournament
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 ">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form wire:submit.prevent="addTournament" class="space-y-2">
                    @csrf
                    <div>
                        <label for="" class="my-1 form-label">Title</label>
                        <input id="" wire:model="title" type="text" class="form-control w-full" placeholder="Title"
                            required>
                        @error('title')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="my-1 form-label">Begining Date</label>
                        <input id="" wire:model="begining_date" type="date" class="form-control w-full"
                            placeholder="Begining Date" required>
                        @error('begining_date')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="my-1 form-label">Ending Date</label>
                        <input id="" wire:model="ending_date" type="date" class="form-control w-full"
                            placeholder="Ending Date" required>
                        @error('ending_date')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="my-1 form-label">Location</label>
                        <input id="" wire:model="location" type="text" class="form-control w-full"
                            placeholder="Location" required>
                        @error('location')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="team">Choose Playing Teams</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 mt-2">

                            @foreach ($teams as $team)
                              <div>
                                <input type="checkbox" wire:model="selected_teams" value="{{ $team->id }}"> {{ $team->title }}
                              </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-left mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>
<!-- END: Form Layout -->
