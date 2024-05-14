@include('filament-forms::components.rich-editor')

@assets
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tributejs/3.3.2/tribute.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tributejs/3.3.2/tribute.min.css" />
@endassets

@script
<script>
    document.addEventListener('livewire:load', function () {
        const initRichEditor = () => {
            console.log('ok');
        };

        // Initialize on load
        initRichEditor();

        // Re-initialize when any filament modal is opened
        document.addEventListener('filament-modal-open', function () {
            initRichEditor();
        });
    });
</script>
@endscript
