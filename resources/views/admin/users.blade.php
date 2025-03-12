@component('layout.app')
    @include('layout.header.main')
    @component('layout.main')
        @component('layout.wrapper')
            @include('sections.admin.users')
        @endcomponent
    @endcomponent
    @include('layout.footer.main')
@endcomponent

