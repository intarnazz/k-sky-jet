@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('sections.service')
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent


