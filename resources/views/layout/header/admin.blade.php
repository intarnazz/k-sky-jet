<header class="bg-gray-900 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Навигационное меню (для больших экранов) -->
        <nav class="hidden md:flex space-x-6">
            <!-- Проверка на права администратора -->
            <a href="{{ route('admin.bookings') }}" class="text-lg hover:text-gray-400">Админ-панель</a>
        </nav>
    </div>
</header>
