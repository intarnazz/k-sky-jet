<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between">
            <!-- Информация о компании -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">О компании</h3>
                <p class="text-gray-400">Мы предлагаем лучшие маршруты и незабываемые путешествия. Откройте для себя
                    комфорт, безопасность и качество на каждом этапе путешествия.</p>
            </div>

            <!-- Быстрые ссылки -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">Быстрые ссылки</h3>
                <ul>
                    <li><a href="{{ route('ways') }}" class="text-lg hover:text-gray-400">Рейсы</a></li>
                    <li><a href="{{ route('services') }}" class="text-lg hover:text-gray-400">Услуги</a></li>
                </ul>
            </div>

            <!-- Контактная информация -->
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-semibold mb-4">Контакты</h3>
                <p class="text-gray-400"><strong>Телефон:</strong> +7 999 999 9999</p>
                <p class="text-gray-400"><strong>Email:</strong> aboba@gmail.com</p>
                <p class="text-gray-400"><strong>Адрес:</strong> г. Москва, ул. Кузнецова, д. 3а</p>
            </div>
        </div>

        <!-- Нижний колонтитул -->
        <div class="mt-12 border-t pt-6 text-center">
            <p class="text-gray-400 text-sm">© 2025 SkyJet. Все права защищены.</p>
        </div>
    </div>
</footer>
