<div>
    <div class="row">
        <div class="my-4 mx-6">
            <div class="box">
                <div class="py-6 px-6">
                    <form wire:submit.prevent="updateInfo">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="mb-1">Name</label><i class="text-red-500">*</i>
                            <input type="text" wire:model="name" placeholder="Enter Name " class="form-control"
                                required>
                            @error('name')
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
                            <label for="" class="mb-1">Phone</label>
                            <input type="text" wire:model="phone" wire:change="formatPhoneNumber"
                                wire:keyup="formatPhoneNumber" placeholder="Enter Phone" class="form-control">

                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Youtube Link</label>
                            <input type="url" id="validation-form-5" wire:model="youtube"
                                placeholder="Enter Youtube Link" class="form-control">

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
    </div>
</div>
