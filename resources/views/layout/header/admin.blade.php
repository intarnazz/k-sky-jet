<header class="bg-gray-900 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Навигационное меню (для больших экранов) -->
        <nav class="hidden md:flex space-x-6">
            <!-- Проверка на права администратора -->
            <a href="{{ route('admin.bookings') }}" class="text-lg hover:text-gray-400">Рейс/бронь</a>
            <a href="{{ route('admin.users') }}" class="text-lg hover:text-gray-400">Пользователи</a>
            <a href="{{ route('admin.services') }}" class="text-lg hover:text-gray-400">Услуги</a>
        </nav>
    </div>
</header>
