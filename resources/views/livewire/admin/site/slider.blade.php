<div class="space-y-10">



    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <div wire:ignore class="sliderGallery"></div>

    </div>


    <div class="box p-6">
        <div class="grid grid-cols-6 gap-4">
            @foreach ($slides as $slide)
                <div class="shadow-lg rounded p-2 flex flex-col justify-between">
                    <img src="{{ $slide->path['small'] }}" alt="">
                    @if ($editableId == $slide->id)
                        <div class="my-4 space-y-2">
                            <input wire:model="line_one" type="text" class="form-control"
                                placeholder="Enter Line one">
                            <input wire:model="line_two" type="text" class="form-control"
                                placeholder="Enter Line one">
                            <div class="flex space-x-2">
                                <button class="btn btn-success w-full" wire:click="saveText">Save</button>

                                <button class="btn btn-warning" wire:click="makeUnEditable">X</button>
                            </div>
                        </div>
                    @endif
                    <div class="flex space-x-2 mt-2">
                        <button class="btn btn-primary" wire:click="makeEditable({{ $slide->id }})">
                            <i class="lar la-edit" style="font-size: 20px"></i>
                        </button>
                        <button class="btn btn-danger w-full"
                            wire:click="delGalleryAsset({{ $slide->id }})">Delete</button>
                    </div>
                </div>
            @endforeach
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
            target: '.sliderGallery',
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
