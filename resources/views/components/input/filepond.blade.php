<div class="pt-3"
    wire:ignore
    x-data
    x-init="
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create($refs.input, {
                allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    },
                    @if(!empty($uploadedFile))
                    load: (uniqueFileId, load, error, progress, abort, headers) => {
                    fetch(`{{ Storage::disk('details')->url($uploadedFile) }}`).then((res) => {
                        return res.blob();
                     }).then(load);
                       },
                    @endif
                },
                @if(!empty($uploadedFile))
                files: [
                    {
                        source: '{{ $uploadedFile }}',

                        options: {
                            type: 'local',
                        },
                    }
                ],
                @endif

                onremovefile: (error, file) => {
                    @this.set('{{ $attributes['wire:model'] }}', null);
                }
            });
        "
>

    <input type="file" x-ref="input">

</div>
