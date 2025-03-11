<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $way->route }}</h1>
        <p class="text-gray-500">{{ $way->views }} просмотров</p>
    </div>

    @include('components.button.back')

    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0">
            @if($way->image)
                <img src="{{ route('image', ['image' => $way->image_id]) }}" alt="Изображение рейса"
                     class="w-full h-64 object-cover rounded-md">
            @endif
        </div>

        <div class="md:w-1/2 md:pl-8">
            <p class="text-lg text-gray-700 mb-4">{{ $way->description }}</p>

            <p><strong>Дата вылета:</strong> {{ \Carbon\Carbon::parse($way->departure_time)->format('d.m.Y H:i') }}</p>
            <p><strong>Дата прилёта:</strong> {{ \Carbon\Carbon::parse($way->arrival_time)->format('d.m.Y H:i') }}</p>

            <p><strong>Класс:</strong> {{ ucfirst($way->class) }}</p>
            <p class="text-xl font-semibold mt-4">Цена: {{ number_format($way->price, 0, ',', ' ') }} ₽</p>

            <div class="mt-6">
                <a href=""
                   class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Забронировать рейс
                </a>
            </div>
        </div>
    </div>

    <!-- Секция с отзывами -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Отзывы</h2>
        @forelse($way->comments as $comment)
            <div class="bg-gray-100 p-4 mb-4 rounded-md shadow-md">
                <div class="flex items-center mb-2">
                    @if($comment->user && $comment->user->image_id)
                        <img src="{{ route('image', ['image' => $comment->user->image_id]) }}" alt="Аватар пользователя"
                             class="w-12 h-12 object-cover rounded-full mr-4">
                    @else
                        <img src="path/to/default-avatar.jpg" alt="Аватар пользователя"
                             class="w-12 h-12 object-cover rounded-full mr-4">
                    @endif
                    <div>
                        <p class="text-gray-700 font-semibold">{{ $comment->user->login ?? 'Неизвестный' }}</p>
                        <p class="text-gray-500 text-sm">Отзыв оставлен</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-2"><strong>Оценка:</strong> {{ $comment->rating }} ⭐</p>
                <p class="text-gray-600">{{ $comment->comment }}</p>
            </div>
        @empty
            <p class="text-gray-600">Отзывов нет.</p>
        @endforelse
    </div>

</div>
