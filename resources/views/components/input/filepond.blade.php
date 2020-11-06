<div class="pt-3"
    wire:ignore
    x-data
    x-init="
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create(
                $refs.input,
                {
                    allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                    server:
                        {
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                            },
                            @if(!empty($uploadedFile))
                                @php($files = json_decode($uploadedFile))
                                    load: (uniqueFileId, load, error, progress, abort, headers) =>
                                    {
                                            fetch(`{{ config('app.url') }}` + '/details/' + uniqueFileId).then((res) =>
                                                {
                                                    return res.blob();
                                                }
                                            ).then(load);
                                    },
                            @endif
                            },
                            @if(!empty($files))
                                files: [
                                    @foreach($files as $file)
                                        {
                                            source: '{{ $file }}',
                                            options: {
                                                type: 'local',
                                            },
                                        },
                                    @endforeach
                                ],
                            @endif

                    onremovefile: (error, file) => {
                        @this.removeFile('{{ $attributes['wire:model'] }}', file.filename);
                    }
            });
        "
>

    <input type="file" x-ref="input">

</div>
