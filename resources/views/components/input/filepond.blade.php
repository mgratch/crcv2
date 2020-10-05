<div class="pt-3"
    wire:ignore
    x-data
    x-init="
            FilePond.create($refs.input, {
                allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    },
                    load: (uniqueFileId, load, error, progress, abort, headers) => {
                    fetch(`{{ Storage::disk('details')->url($attributes['uploadedFile']) }}`).then((res) => {
                        return res.blob();
                     }).then(load);
                    },
                },
                files: [
                    {
                        source: '{{ Storage::disk('details')->url($attributes['uploadedFile']) }}',

                        options: {
                            type: 'local',
                        },
                    }
                ],

                onremovefile: (error, file) => {
                    @this.set('{{ $attributes['wire:model'] }}', null);
                }
            });
        "
>

    <input type="file" x-ref="input">

</div>

{{ $attributes['uploadedFile'] }}
