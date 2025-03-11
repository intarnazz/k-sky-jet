@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('sections.welcome')
            @include('sections.ways')
            @include('sections.services')
            @include('sections.contact')
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent

