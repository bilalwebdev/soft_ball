<div>
    <div class="max-full p-4 bg-white dark:bg-gray-800 rounded space-y-10">

        <div class="form-group">
            <label>Content</label>

            <div wire:ignore>
                <textarea wire:model="tournament.content" id="myeditorinstance"></textarea>
            </div>
        </div>


        <div>
            <button wire:click="saveContent" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>



@push('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists advlist checklist image  autolink emoticons media',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | image | emoticons | media',
            setup: function(ed) {
                ed.on('change', function(e) {

                    @this.updateContent(ed.getContent())
                });
            }
        });
    </script>
@endpush
