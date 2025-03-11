@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('components.filters.ways')
            @include('sections.ways')
            @include('components.pagin', ['pagin'=> $ways])
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent
