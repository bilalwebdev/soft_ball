<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Game
        </h2>
    </div>
    <form wire:submit.prevent="updateGame">
        <div class="grid grid-cols-2 gap-6 mt-5">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                @csrf
                <div>
                    <label for="" class="my-1 form-label">Team</label>
                    <select wire:model.defer="team_id" id="" class="form-control w-full">
                        <option value="0">--Select Team--</option>
                        @foreach ($teams as $team)
                            @if ($team_id == $team->id)
                                <option value="{{ $team->id }}" selected>{{ $team->title }}</option>
                            @else
                                <option value="{{ $team->id }}">{{ $team->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('team_id')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="" class="">Opponent Name</label>
                    <input id="" wire:model="opponent_name" type="text" class="form-control w-full"
                        placeholder="Enter Opponent Name" required>
                    @error('opponent_name')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="" class="">Date</label>
                    <input id="" wire:model="date" type="date" class="form-control w-full" placeholder="" required>
                    @error('date')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="" class="">Time</label>
                    <input id="" wire:model="time" type="time" class="form-control w-full"
                        placeholder="Enter Opponent Score" >
                    @error('time')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="intro-y box p-5">
                <div class="mb-2">
                    <label for="" class="">{{ $selected_team->title }} Score</label>
                    <input id="" wire:model="our_score" type="number" class="form-control w-full"
                        placeholder="Enter Our Score" >
                    @error('our_score')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="" class="">{{ $game->opponent_name }} Score</label>
                    <input id="" wire:model="opponent_score" type="number" class="form-control w-full"
                        placeholder="Enter Opponent Score" required>
                    @error('opponent_score')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-primary w-24">Save</button>
            </div>
        </div>
    </form>
    <!-- END: Form Layout -->
</div>
</div>
