<header class="bg-gray-900 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Логотип -->
        <div>
            <a href="/" class="text-3xl font-bold">Авиакомпания</a>
        </div>

        <!-- Навигационное меню (для больших экранов) -->
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="text-lg hover:text-gray-400">Главная</a>
            <a href="{{ route('ways') }}" class="text-lg hover:text-gray-400">Рейсы</a>
            <a href="{{ route('services') }}" class="text-lg hover:text-gray-400">Услуги</a>
            <a href="" class="text-lg hover:text-gray-400">Контакты</a>
        </nav>

        <!-- Кнопки для мобильной версии -->
        <div class="md:hidden flex items-center">
            <button id="burger-menu" class="text-2xl">
                <i class="fas fa-bars"></i> <!-- иконка бургер-меню, используйте FontAwesome или другую библиотеку -->
            </button>
        </div>

        <!-- Кнопка для входа или регистрации -->
        <div class="hidden md:flex space-x-4">
            <a href="" class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">Войти</a>
            <a href="{{ route('register') }}" class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">Регистрация</a>
        </div>
    </div>

    <!-- Мобильное меню -->
    <div id="mobile-menu"
         class="hidden md:hidden absolute bg-gray-900 text-white w-full left-0 top-full mt-2 shadow-lg">
        <div class="container mx-auto flex flex-col space-y-4 py-4 px-6">
            <a href="/" class="text-lg hover:text-gray-400">Главная</a>
            <a href="{{ route('ways') }}" class="text-lg hover:text-gray-400">Рейсы</a>
            <a href="{{ route('services') }}" class="text-lg hover:text-gray-400">Услуги</a>
            <a href="" class="text-lg hover:text-gray-400">Контакты</a>
            <a href="{{ route('register') }}" class="text-lg hover:text-gray-400">Войти</a>
            <a href="" class="text-lg hover:text-gray-400">Регистрация</a>
        </div>
    </div>
</header>

<script>
    // JavaScript для открытия и закрытия мобильного меню
    const burgerMenu = document.getElementById('burger-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerMenu.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
