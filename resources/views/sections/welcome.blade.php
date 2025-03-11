<div class="container mx-auto py-12">
    <!-- Приветственный блок -->
    <div class="flex flex-col items-center text-center px-4 md:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
            Добро пожаловать в нашу авиакомпанию!
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            Мы предлагаем лучшие маршруты и незабываемые путешествия. Откройте для себя удобство, комфорт и
            безопасность.
        </p>

        <!-- CTA кнопки -->
        <div class="flex justify-center space-x-6">
            <a href=""
               class="bg-blue-600 text-white py-2 px-6 rounded-full text-lg hover:bg-blue-700 transition duration-300">
                Посмотреть маршруты
            </a>
            <a href=""
               class="bg-green-600 text-white py-2 px-6 rounded-full text-lg hover:bg-green-700 transition duration-300">
                Забронировать рейс
            </a>
        </div>
    </div>

    <!-- Секция популярных маршрутов (если нужно) -->
    <div class="mt-12 text-center">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6">Популярные маршруты</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Пример карточки маршрута -->
            {{--                @foreach($popularRoutes as $route)--}}
            {{--                    <div class="border p-6 rounded-lg shadow-lg">--}}
            {{--                        <img src="{{ asset('storage/' . $route->image->path) }}" alt="Маршрут" class="w-full h-40 object-cover rounded-md mb-4">--}}
            {{--                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $route->route }}</h3>--}}
            {{--                        <p class="text-gray-600 mb-4">{{ $route->description }}</p>--}}
            {{--                        <a href="{{ route('flights.show', $route->id) }}" class="text-blue-600 hover:text-blue-800">Подробнее</a>--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}
        </div>
    </div>
</div>
