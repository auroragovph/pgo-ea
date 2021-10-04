<div class="card card-sm">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="bg-red text-white avatar">
                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                    <x-ui.icon icon="{{ $icon }}" />
                </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                    {{ $metric }}
                </div>
                <div class="text-muted">
                    {{ $title }}
                </div>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
