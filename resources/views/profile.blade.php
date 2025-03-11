@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('sections.profile')
            @include('sections.bookings')
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent

