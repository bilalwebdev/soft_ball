<div class="space-y-10">



    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div wire:ignore class="playerGallery"></div>
        <div>
            <form wire:submit.prevent="saveVideo">
                <div class="space-y-2">
                    <label for="">Youtube/Vimeo</label>
                    <input wire:model="videoLink" type="text" class="form-control" placeholder="Enter Video URL"
                        required>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


    <div class="box p-6">
        <h2 class="text-2xl">Images</h2>
        <div class="grid grid-cols-6 gap-4" wire:sortable="updateAssetOrder">
            @foreach ($gallery_images as $img)
                <div wire:sortable.item="{{ $img->id }}" wire:key="img-{{ $img->id }}"
                    class="shadow-lg rounded p-2 flex flex-col justify-between">
                    <img src="{{ $img->path['small'] }}" alt="">
                    <button class="btn btn-danger w-full mt-2"
                        wire:click="delGalleryAsset({{ $img->id }})">Delete</button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="box p-6">
        <h2 class="text-2xl">Videos</h2>
        <div class="grid grid-cols-5 gap-4" wire:sortable="updateAssetOrder">
            @foreach ($gallery_videos as $vid)
                <div wire:sortable.item="{{ $vid->id }}" wire:key="vid-{{ $vid->id }}"
                    class="shadow-lg rounded p-2 pt-8 flex flex-col justify-between
                    border-2 border-white
                    ">
                    <div class="pointer-events-none">
                        <iframe src="{{ $vid->path }}" class="w-full aspect-video rounded shadow" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                    <button class="btn btn-danger w-full mt-2"
                        wire:click="delGalleryAsset({{ $vid->id }})">Delete</button>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('styles')
    <link href="https://releases.transloadit.com/uppy/v2.3.2/uppy.min.css" rel="stylesheet">
@endpush


@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://releases.transloadit.com/uppy/v2.3.2/uppy.min.js"></script>


    <script>
        let bucketUrl = @js(env('AWS_BUCKET_URL'))


        var uppy = new Uppy.Core({
            debug: true,
            autoProceed: false,
            restrictions: {
                maxNumberOfFiles: 10
            }
        })
        const {
            Dashboard,
            AwsS3,
        } = Uppy


        uppy.use(Dashboard, {
            id: 'Dashboard',
            target: '.playerGallery',
            metaFields: [],
            trigger: null,
            inline: true,
            proudlyDisplayPoweredByUppy: false,
            thumbnailWidth: 280,

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

        })
    </script>
@endpush
