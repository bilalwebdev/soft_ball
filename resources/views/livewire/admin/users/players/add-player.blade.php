<div>
    <div class="row">
        <div class="my-4 mx-6">
            <form wire:submit.prevent="AddInfo">
                @csrf
                <div class="box py-6 px-6">
                    <h2 class="text-lg">Add New Player</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Name</label><i class="text-red-500">*</i>
                                <input type="text" wire:model="name" placeholder="Enter Name " class="form-control"
                                    required>
                                @error('name')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Home Town</label><i class="text-red-500">*</i>
                                <input type="text" wire:model="home_town" placeholder="Enter Home Town "
                                    class="form-control" required>
                                @error('home_town')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Email</label><i class="text-red-500">*</i>
                                <input type="email" wire:model="email" placeholder="Enter Email" class="form-control"
                                    required>
                                @error('email')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Select Team</label><i class="text-red-500">*</i>
                                <select name="" wire:model="team_id" id="" class="form-control p-2">
                                    <option value="0">Choose Team</option>

                                    @foreach ($all_teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->title }}</option>
                                    @endforeach
                                </select>
                                @error('team_id')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Password</label><i class="text-red-500">*</i>
                                <input type="password" wire:model="password" placeholder="Enter Password"
                                    class="form-control" required>
                                @error('password')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Confirm Password</label><i
                                    class="text-red-500">*</i>
                                <input type="password" wire:model="confirm_password"
                                    placeholder="Enter Confirm Password" class="form-control" required>
                                @error('confirm_password')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <button type="submit" class="btn btn-primary mt-2 ">Submit Info</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"
        integrity="sha512-VpQwrlvKqJHKtIvpL8Zv6819FkTJyE1DoVNH0L2RLn8hUPjRjkS/bCYurZs0DX9Ybwu9oHRHdBZR9fESaq8Z8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var inputValue = e.originalEvent && e.originalEvent.clipboardData.getData('phone');
            console.log(inputValue);
            console.log("ready!");
            $("#phone-input").inputmask({
                "mask": "(999) 999-9999"
            }); //specifying options

        });
    </script>
@endpush
