<div>
    <div class="mx-6 my-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <form wire:submit.prevent="updateInfo">
                    @csrf
                    <div class="box">
                        <div class="px-6 py-6">
                            <div class="card-body ">
                                <h2 class="text-lg">Update Information</h2>
                                <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                                    <div>
                                        <div class="mt-3">
                                            <label for="" class="mb-1">Name</label><i
                                                class="text-red-500">*</i>
                                            <input type="text" wire:model="name" placeholder="Enter Name "
                                                class="form-control" required>
                                            @error('name')
                                                <span class="text-red-500 error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label for="" class="mb-1">Home Town</label><i
                                                class="text-red-500">*</i>
                                            <input type="text" wire:model="home_town" placeholder="Enter Name "
                                                class="form-control" required>
                                            @error('home_town')
                                                <span class="text-red-500 error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label for="" class="mb-1">Email</label><i
                                                class="text-red-500">*</i>
                                            <input type="email" wire:model="email" placeholder="Enter Email"
                                                class="form-control" required>
                                            @error('email')
                                                <span class="text-red-500 error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <label for="" class="mb-1">Phone</label>
                                            <input type="text" wire:model="phone" wire:change="formatPhoneNumber"
                                                wire:keyup="formatPhoneNumber" placeholder="Enter Phone"
                                                class="form-control">
                                        </div>
                                        <div class="mt-3">
                                            <label for="" class="mb-1">Select Team</label><i
                                                class="text-red-500">*</i>
                                            <select name="" wire:model="team_id" id=""
                                                class="p-2 form-control">
                                                <option value="0">Choose Team</option>

                                                @foreach ($all_teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('team_id')
                                                <span class="text-red-500 error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div
                                            class="flex flex-col items-center justify-center p-5 border-2 border-dashed rounded-md shadow-sm border-slate-200/60 dark:border-darkmode-400">
                                            <div class="mx-auto cursor-pointer zoom-in">
                                                <img class="object-scale-down w-40 rounded-md h-60" alt="Player image"
                                                    src="{{ $player->image['small'] }}">
                                            </div>

                                            <div wire:ignore class="relative mx-auto mt-5 cursor-pointer">
                                                <div class="Uppy file-input "></div>
                                                <div class="UppyProgressBar"></div>
                                            </div>

                                        </div>
                                    </div>
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
                                <div class="mt-3">
                                    <label for="" class="mb-1">My School Site Link</label>
                                    <input type="url" wire:model="school_site_link"
                                        placeholder="Enter School Site Link" class="form-control">
                                </div>
                                <div>
                                    <div class="mt-3">
                                        <label for="bourbon-title" class="form-label">Intro Video <span
                                                class="text-xs text-gray-500">(Youtube/Vimeo)</span></label>
                                        <input type="text" wire:model="video" class="form-control"
                                            placeholder="Enter Intro Video Link">
                                    </div>
                                    @if ($player->video)
                                        <div class="mt-2">
                                            <iframe src="{{ $player->video }}"
                                                class="w-full rounded shadow aspect-video" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="">


                <div class="box">
                    <div class="p-6">
                        <a href="{{ route('admin.player.gallery', $player->id) }}"
                            class="w-full btn btn-primary">Gallery</a>
                    </div>
                </div>
                <div class="mt-3 box">
                    <div class="p-6">
                        <a href="{{ route('admin.player.reset-password', $player->id) }}"
                            class="w-full btn btn-primary">Update Password</a>
                    </div>
                </div>
                <div class="mt-3 box">
                    <div class="p-6">
                        <a href="{{ route('admin.player.reference', $player->id) }}"
                            class="w-full btn btn-primary">Reference</a>
                    </div>
                </div>
                <div class="mt-4 box">
                    <div class="px-6 py-6">
                        <h2 class="text-lg">Other Highlights</h2>
                        <div class="mt-1">
                            <label for="" class="mb-1">High School</label>
                            <input type="text" wire:model="high_school" placeholder="High School"
                                class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Guest Playing</label>
                            <input type="text" wire:model="guest_playing" placeholder="Guest Playing "
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mt-4 box">
                    <div class="px-6 py-6">
                        <h2 class="text-lg">Player Matrics</h2>
                        <div class="mt-1">
                            <label for="" class="mb-1">Exit Velo(mph)</label>
                            <input type="number" max="999" wire:model="exit_velo"
                                placeholder="Enter Exit Velo" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Overhand Velo(mph)</label>
                            <input type="number" max="999" wire:model="overhand_velo"
                                placeholder="Enter Overhand Velo " class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">INF Pop Time(sec)</label>
                            <input type="number" min="1" max="60" wire:model="inf_pop_time"
                                placeholder="Enter INF Pop Time" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Catcher Pop Time(sec)</label>
                            <input type="number" min="1" max="60" wire:model="catcher_pop_time"
                                placeholder="Enter Catcher Pop Time" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Home to 1st(sec)</label>
                            <input type="number" min="1" max="60" wire:model="home_to_1st"
                                placeholder="Enter Home to 1st Time" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="mb-1">Pitching Velo(mph)</label>
                            <input type="number" max="999" wire:model="pitching_velo"
                                placeholder="Enter Pitching Velo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="px-6 py-6">
                    <h2 class="text-lg">Player Info</h2>
                    <div class="grid grid-cols-7 mt-8">
                        <div class="col-span-2">
                            <label for="" class="form-label text-md">Jersey #</label>
                        </div>
                        <div class="col-span-5">
                            @php
                                $i = 0;
                            @endphp
                            <select wire:model="jersey_no" id="" class="form-select" required>
                                <option value="" selected>Select</option>
                                @for ($i = 0; $i < 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}
                                    </option>
                                    @if ($i == 99)
                                        <option value="00">00
                                        </option>
                                    @endif
                                @endfor
                            </select>
                            @error('jersey_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-2 mt-4">
                            <label for="" class="form-label text-md">Height</label>
                        </div>
                        <div class="col-span-5 mt-2">
                            @php
                                $i;
                                $j;
                            @endphp
                            <select wire:model="height" id="" class="form-select" required>
                                <option value="" selected>Select</option>
                                @for ($i = 4; $i <= 7; $i++)
                                    @for ($j = 0; $j <= 12; $j++)
                                        <option value="{{ $i }}.{{ $j }}">
                                            {{ $i }}.{{ $j }}''
                                        </option>
                                        @if ($i == 7 && $j == 0)
                                        @break
                                    @endif
                                @endfor
                            @endfor
                        </select>
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">Bats</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <select wire:model="bats" id="" class="form-select" required>
                            <option value="" selected>Select</option>
                            <option value="right">Right</option>
                            <option value="left">Left</option>
                            <option value="both">Both</option>
                        </select>
                        @error('bats')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">Throws</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <select wire:model="throws" id="" class="form-select" required>
                            <option value="" selected>Select</option>
                            <option value="right">Right</option>
                            <option value="left">Left</option>
                        </select>
                        @error('throws')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-7 my-4">
                        <hr>
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">Primary Position</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <select wire:model="primary_position" id="" class="form-select" required>
                            <option value="" selected>Select</option>
                            <option value="P">P</option>
                            <option value="C">C</option>
                            <option value="1B">1B</option>
                            <option value="2B">2B</option>
                            <option value="3B">3B</option>
                            <option value="SS">SS</option>
                            <option value="LF">LF</option>
                            <option value="CF">CF</option>
                            <option value="RF">RF</option>
                        </select>
                        @error('primary_position')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-7 mt-4">
                        <a class="my-2 btn btn-primary" wire:click="addPlayerSceondaryPositionField">+ Add
                            Secondary
                            Position(s)</a>
                        <div class="grid grid-cols-8 gap-2 mt-4">
                            <div class="col-span-4">
                                @foreach ($positions as $key => $value)
                                    <select name="" id="" class="mb-2 form-select"
                                        wire:model.debounce.500ms="positions.{{ $key }}.name">
                                        <option value="P">P</option>
                                        <option value="C">C</option>
                                        <option value="1B">1B</option>
                                        <option value="2B">2B</option>
                                        <option value="3B">3B</option>
                                        <option value="SS">SS</option>
                                        <option value="LF">LF</option>
                                        <option value="CF">CF</option>
                                        <option value="RF">RF</option>
                                    </select>
                                @endforeach
                            </div>
                            <div class="col-span-2">
                                @foreach ($positions as $key => $value)
                                    <div class="flex gap-2 mb-2">
                                        <div>
                                            <a wire:click.prevent="removePlayerSceondaryPositionField({{ $key }})"
                                                class="btn btn-danger"> <i class="fa-regular fa-trash-can">
                                                </i><svg class="w-5 h-5 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></a>

                                        </div>
                                        <div wire:loading
                                            wire:target="removePlayerSceondaryPositionField({{ $key }})">
                                            <div id="loader">
                                                <div
                                                    style="display: flex; justify-content: center; align-items:center; background-color:black; position:fixed; top: 0px; left:0px; z-index: 9999; width:100%; height:100%; opacity:.75;">
                                                    <div class="lds-facebook">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="box">
            <div class="px-6 py-6">
                <h2 class="text-lg">Player School Info</h2>
                <div class="grid grid-cols-7 mt-8">
                    <div class="col-span-2">
                        <label for="" class="form-label text-md">School Name</label>
                    </div>
                    <div class="col-span-5">
                        <input type="text" wire:model="school_name" id="" class="form-control"
                            required>
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">Class of</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <input type="text" wire:model="class_of" id="" class="form-control"
                            required>
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">GPA</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <input type="text" wire:model="gpa" id="" class="form-control" required>
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">Weighted GPA</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <input type="text" wire:model="weighted_gpa" id="" class="form-control">
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">SAT</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <input type="text" wire:model="sat" id="" class="form-control">
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="" class="form-label text-md">ACT</label>
                    </div>
                    <div class="col-span-5 mt-2">
                        <input type="text" wire:model="act" id="" class="form-control">
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="mt-2 btn btn-primary">Update Info</button>
        </div>
        </form>

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
