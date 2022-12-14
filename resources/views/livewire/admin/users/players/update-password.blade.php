<div>
    <div class="my-4 mx-6">
        <div class="box">
            <div class="py-6 px-6">
                <form wire:submit.prevent="updatePassword">
                @csrf
                    <div class="form-group">
                        <label for="">New Password</label><i class="text-red-500">*</i>
                        <input type="password" wire:model="password" placeholder="Password" class="form-control" required>
                        @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Confirm Pasword</label><i class="text-red-500">*</i>
                        <input type="password" wire:model="confirm_password" placeholder="Confirm Password"
                            class="form-control" required>
                            @error('confirm_password') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-2">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

