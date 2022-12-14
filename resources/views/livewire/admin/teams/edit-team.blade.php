<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Team
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 ">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form wire:submit.prevent="UpdateTeam">
                    @csrf
                    <div>
                        <label for="" class="form-label">Title</label>
                        <input id="" wire:model="title" type="text" class="form-control w-full"
                            placeholder="Title" required>
                    </div>
                    <div class="mt-3">
                        <div
                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 flex justify-center items-center flex-col">
                            <div class=" cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md h-60 w-40 object-scale-down" alt="Player image"
                                    src="{{ $team->image['small'] }}">
                            </div>

                            <div wire:ignore class="mx-auto cursor-pointer relative mt-5">
                                <div class="Uppy file-input "></div>
                                <div class="UppyProgressBar"></div>
                            </div>

                        </div>
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
                    <div>
                        <label for="" class="form-label">Description</label>
                        <textarea id="" wire:model="description" type="text" class="form-control w-full" placeholder="Description"
                            rows="10"></textarea>
                    </div>
                    @can('add manager')
                        <label for="" class="form-label">Add Managers</label>
                        <div class="" wire:ignore>
                            <select wire:model="selected_managers" data-placeholder="Select your managers"
                                class="tom-select w-72" multiple>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}" @if (in_array($manager->id, $selected_managers)) selected @endif>
                                        {{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    <div class="text-left mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>


@push('styles')
    <link href="https://releases.transloadit.com/uppy/v2.3.2/uppy.min.css" rel="stylesheet">
@endpush


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://releases.transloadit.com/uppy/v2.3.2/uppy.min.js"></script>


    <script>
        let bucketUrl = @js(env('AWS_BUCKET_URL'))


        var uppy = new Uppy.Core({
            debug: true,
            autoProceed: true,
            restrictions: {
                maxNumberOfFiles: 1
            }
        })
        const {
            FileInput,
            AwsS3,
            ProgressBar
        } = Uppy


        uppy.use(FileInput, {
            target: '.Uppy',

            locale: {
                strings: {
                    // The same key is used for the same purpose by @uppy/robodog's `form()` API, but our
                    // locale pack scripts can't access it in Robodog. If it is updated here, it should
                    // also be updated there!
                    chooseFiles: 'Change Photo',
                },
            },
        })
        uppy.use(ProgressBar, {
            target: '.UppyProgressBar',
            hideAfterFinish: false,
        })
        uppy.use(AwsS3, {
            getUploadParameters(file) {

                return fetch("{{ route('admin.preurl') }}", {
                    method: 'post',

                    headers: {
                        accept: 'application/json',
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify({
                        _token: "{{ csrf_token() }}",
                        filename: file.name,
                        contentType: file.type,

                    }),
                }).then((response) => {
                    return response.json()
                }).then((data) => {

                    return {
                        method: data.method,
                        url: data.url,
                        headers: {
                            'Content-Type': file.type,
                        },
                    }
                })
            },
            limit: 1,
            timeout: 0
        })

        uppy.on('upload-success', (file, response) => {


            let url = response.uploadURL
            let key = url.replace(bucketUrl + '/', '')


            @this.call('saveImage', key)
            uppy.reset();
        })
    </script>
@endpush
