<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $service->name }}</h1>
        <p class="text-gray-500">{{ $service->views }} просмотров</p>
    </div>

    @include('components.button.back')

    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0">
            @if($service->image_id)
                <img src="{{ route('image', ['image' => $service->image_id]) }}" alt="Изображение рейса"
                     class="w-full h-64 object-cover rounded-md">
            @endif
        </div>

        <div class="md:w-1/2 md:pl-8">
            <p class="text-lg text-gray-700 mb-4">{{ $service->description }}</p>

            <p><strong>Тип услуги:</strong> {{ ucfirst($service->type) }}</p>
            <p class="text-xl font-semibold mt-4">Цена: {{ number_format($service->price, 0, ',', ' ') }} ₽</p>

            <div class="mt-6">
                <a href="#"
                   class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Оформить услугу
                </a>
            </div>
        </div>
    </div>
    <!-- Секция с отзывами -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Отзывы</h2>
        @forelse($service->comments as $comment)
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
    <!-- Форма для добавления нового комментария -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Добавить комментарий</h2>
        <form action="{{ route('comment.add') }}" method="POST">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <!-- Оценка -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Оценка</label>
                <select name="rating" class="w-full px-4 py-2 border rounded-md" required>
                    <option value="1">1 ⭐</option>
                    <option value="2">2 ⭐</option>
                    <option value="3">3 ⭐</option>
                    <option value="4">4 ⭐</option>
                    <option value="5">5 ⭐</option>
                </select>
            </div>

            <!-- Комментарий -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Комментарий</label>
                <input name="comment" class="w-full px-4 py-2 border rounded-md" required/>
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Оставить
                комментарий
            </button>
        </form>
    </div>
</div>
