<div>
    <div class="my-4 mx-6">
        <div class="grid grid-cols-2 gap-4">
            <div class="box">
                <div class="py-6 px-6">
                    <div class="card-body columns-1">
                        <form wire:submit.prevent="updateInfo">
                            @csrf
                            <h2 class="text-lg">Update Information</h2>
                            <div class="mt-3">
                                <label for="" class="mb-1">Name</label>
                                <input type="text" wire:model="name" placeholder="Enter Name " class="form-control"
                                    required>
                                @error('name')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="mb-1">Email</label>
                                <input type="email" wire:model="email" placeholder="Enter Email" class="form-control"
                                    required>
                                @error('email')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="mb-1">Phone</label>
                                <input type="text" wire:model="phone"  wire:change="formatPhoneNumber"  wire:keyup="formatPhoneNumber" placeholder="Enter Phone" class="form-control">

                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Youtube Link</label>
                                <input type="url" wire:model="youtube" placeholder="Enter Youtube Link"
                                    class="form-control">

                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Instagram Link</label>
                                <input type="url" wire:model="instagram" placeholder="Enter Instagram Link"
                                    class="form-control">

                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Facebook Link</label>
                                <input type="url" wire:model="facebook" placeholder="Enter Facebook Link"
                                    class="form-control">

                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Twitter Link</label>
                                <input type="url" wire:model="twitter" placeholder="Enter Twitter Link"
                                    class="form-control">

                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="box">
                    <div class="py-6 px-6">
                        <form wire:submit.prevent="updatePassword">
                            @csrf
                            <h2 class="text-lg">Update Password</h2>
                            <div class="mt-3">
                                <label for="" class="mb-1">New Password</label><i class="text-red-500">*</i>
                                <input type="password" wire:model="password" placeholder="Enter Password"
                                    class="form-control" required>
                                @error('password')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="" class="mb-1">Confirm Password</label><i class="text-red-500">*</i>
                                <input type="password" wire:model="confirm_password"
                                    placeholder="Enter Confirm Password" class="form-control" required>
                                @error('confirm_password')
                                    <span class="error text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2">Update Password</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                @csrf
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Pasword</label>
                        <input type="password" name="confirm_password" placeholder="Confirm Password"
                            class="form-control" required>
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>
</div>
