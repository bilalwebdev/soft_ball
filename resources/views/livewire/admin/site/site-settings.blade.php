<div>
    <div class="row">
        <div class="my-4 mx-6">
            <div class="box">
                <div class="py-6 px-6">
                    <h2 class="text-lg">Site Setings</h2>
                    <form wire:submit.prevent="updateInfo">
                        @csrf
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
