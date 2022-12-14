<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Tournament
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 ">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <form wire:submit.prevent="updateTournament">
                        @csrf
                        <div>
                            <label for="" class="my-1 form-label">Title</label>
                            <input id="" wire:model="tournament.title" type="text"
                                class="form-control w-full" placeholder="Title" required>
                            @error('title')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="my-1 form-label">Begining Date</label>
                            <input id="" wire:model="tournament.begining_date" type="date"
                                class="form-control w-full" placeholder="Begining Date" required>
                            @error('begining_date')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="my-1 form-label">Ending Date</label>
                            <input id="" wire:model="tournament.ending_date" type="date"
                                class="form-control w-full" placeholder="Ending Date" required>
                            @error('ending_date')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="my-1 form-label">Location</label>
                            <input id="" wire:model="tournament.location" type="text"
                                class="form-control w-full" placeholder="Location" required>
                            @error('location')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="team">Choose Playing Teams</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 mt-2">

                                @foreach ($all_teams as $all_team)
                                    <div>
                                        <input type="checkbox" wire:model="selected_teams_id"
                                            value="{{ $all_team->id }}">
                                        {{ $all_team->title }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-left mt-5">
                            <button type="submit" class="btn btn-primary w-24">Save</button>
                        </div>
                    </form>



                    <div>
                        <div class="p-6 space-y-10">
                            <a href="{{ route('admin.tournament.gallery',$tournament->slug) }}" class="btn btn-primary w-full">Gallery</a>
                            <a href="{{ route('admin.tournament.content',$tournament->slug) }}" class="btn btn-primary w-full">Content</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Game(s)
        </h2>
    </div>
    <form wire:submit.prevent="addGame">
        @csrf
        <div class="grid grid-cols-1 gap-6 mt-5">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="" class="my-1 form-label">Team</label>
                    <select wire:model.defer="team_id" id="" class="form-control p-4 w-full">
                        <option value="0">--Select Team--</option>
                        @foreach ($selected_teams as $team)
                            <option value="{{ $team->id }}">{{ $team->title }}</option>
                        @endforeach
                    </select>
                    @error('team_id')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="">
                    <label for="" class="my-1 form-label">Opponent Name</label>
                    <input id="" wire:model="opponent_name" type="text" class="form-control w-full"
                        placeholder="Enter Opponent Name" required>
                    @error('opponent_name')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="my-1 form-label">Date</label>
                    <input id="" wire:model="date" type="date" class="form-control w-full" placeholder=""
                        required>
                    @error('date')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                    @error('game_date')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="" class="my-1 form-label">Time</label>
                    <input id="" wire:model="time" type="time" class="form-control w-full"
                        placeholder="Enter Opponent Score" required>
                    @error('time')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="text-left mt-2">
                <button type="submit" class="btn btn-primary w-24">Save</button>
            </div>
        </div>
    </form>
    <div class="mt-3">
        <hr>
        <hr>
        <hr>
    </div>
    <h2 class="intro-y text-lg font-medium mt-3 -mb-10">
        All Games
    </h2>
    <div class="grid grid-cols-1 gap-6">
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
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mb-10">
            @foreach ($all_team_games as $key => $games)
                <p class="text-xl">Team: <b>{{ $games[0]->team->title }}</b></p>
                <table class="table table-report -mt-2 ">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap ">OPPONENT NAME</th>
                            <th>{{ $games[0]->team->title }} Score</th>
                            <th>Opponent Score</th>
                            <th>Result</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($games as $game)
                            <tr class="intro-x">
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap text-white"></a>

                                    {{ $game->opponent_name }}
                                </td>
                                <td>
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ $game->our_score }}</a>
                                </td>
                                <td>
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ $game->opponent_score }}</a>
                                </td>
                                <td>

                                    @if ($game->our_score > $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-lime-400 text-white">
                                            WIN
                                        </div>
                                    @elseif($game->our_score < $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-red-400 text-white">
                                            LOSE
                                        </div>
                                    @elseif($game->our_score == $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-yellow-400 text-white">
                                            Draw
                                        </div>
                                    @endif
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center ">
                                        <a class="flex items-center text-md mr-2"
                                            href="{{ route('admin.edit.game', ['id' => $game->id]) }}"> <i
                                                class="las la-edit" style="font-size: 20px"></i> Edit</a>
                                        <button class="flex items-center text-md text-danger "
                                            wire:click="$emit('deleteFile', {{ $game->id }})"> <i
                                                class="lar la-trash-alt" style="font-size: 20px"></i> Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{-- {{ $games->links('pagination::bootstrap-4') }} --}}
        <!-- END: Pagination -->
    </div>
    @php
        $file = 'Game';
    @endphp
    <x-delete-entity :file="$file" />
</div>
