@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('components.filters.service')
            @include('sections.services')
            @include('components.pagin', ['pagin'=> $services])
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent
