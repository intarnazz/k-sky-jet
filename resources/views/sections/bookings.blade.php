<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Статистика по бронированиям</h2>

        @php
            // Проверяем, существует ли переменная $bookings и не пуста ли она
            if(isset($bookings) && $bookings->isNotEmpty()) {
                $activeBookingsCount = $bookings->where('status', 'status')->count();
                $averagePrice = $bookings->avg('total_price');
            } else {
                $activeBookingsCount = 0;
                $averagePrice = 0;
            }
        @endphp


        <p><strong>Количество активных броней:</strong> {{ $activeBookingsCount }}</p>
        <p><strong>Средний чек:</strong> {{ number_format($averagePrice, 2, ',', ' ') }} ₽</p>
    </div>

    <!-- Список бронирований -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Ваши бронирования</h2>

        @forelse($bookings as $booking)
            <div class="border p-4 mb-4 rounded-md shadow-md">
                <p><strong>Номер бронирования:</strong> {{ $booking->id }}</p>
                <p><strong>Дата бронирования:</strong> {{ $booking->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Дата
                        вылета:</strong> {{ $booking->way->departure_time->format('d.m.Y H:i') }}
                </p>
                <p><strong>Статус:</strong> {{ ucfirst($booking->status) }}</p>
                <p><strong>Цена:</strong> {{ number_format($booking->total_price, 0, ',', ' ') }} ₽</p>
                <p><strong>Имя пассажира:</strong> {{ $booking->name ?? 'Не указано' }}</p>
                <p><strong>Телефон:</strong> {{ $booking->phone ?? 'Не указан' }}</p>
                <p><strong>Особые пожелания:</strong> {{ $booking->special_requests ?? 'Не указаны' }}</p>

                <!-- Вывод ссылки на рейс -->
                <p><strong>Рейс:</strong>
                    @if($booking->way)
                        <a href="{{ route('way', $booking->way_id) }}" class="text-blue-500 hover:underline">
                            ссылка на рейс "{{ $booking->way->route }}"
                        </a>
                    @else
                        Не указан
                    @endif
                </p>

                <div class="mt-4 flex space-x-2">
                    <!-- Кнопка редактирования -->
                    <button onclick="toggleEditForm({{ $booking->id }})"
                            class="bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600">
                        Изменить
                    </button>

                    <!-- Форма для отмены бронирования -->
                    <form action="{{ route('booking.delete', $booking->id) }}" method="POST"
                          onsubmit="return confirm('Вы уверены, что хотите отменить бронирование?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600">
                            Отменить
                        </button>
                    </form>
                </div>

                <!-- Форма редактирования (по умолчанию скрыта) -->
                <div id="edit-form-{{ $booking->id }}" class="hidden mt-4 bg-gray-100 p-4 rounded-md">
                    <form action="{{ route('booking.patch', $booking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Имя пассажира -->
                        <div class="mb-4">
                            <label for="name_{{ $booking->id }}" class="block text-gray-700">Имя пассажира:</label>
                            <input type="text" id="name_{{ $booking->id }}" name="name"
                                   class="w-full p-2 border rounded" value="{{ $booking->name }}">
                        </div>

                        <!-- Телефон -->
                        <div class="mb-4">
                            <label for="phone_{{ $booking->id }}" class="block text-gray-700">Телефон:</label>
                            <input type="text" id="phone_{{ $booking->id }}" name="phone"
                                   class="w-full p-2 border rounded" value="{{ $booking->phone }}">
                        </div>

                        <!-- Особые пожелания -->
                        <div class="mb-4">
                            <label for="special_requests_{{ $booking->id }}" class="block text-gray-700">Особые
                                пожелания:</label>
                            <textarea id="special_requests_{{ $booking->id }}" name="special_requests"
                                      class="w-full p-2 border rounded">{{ $booking->special_requests }}</textarea>
                        </div>

                        <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                            Сохранить изменения
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>У вас нет бронирований.</p>
        @endforelse
    </div>
</div>

<!-- Скрипт для показа/скрытия формы -->
<script>
    function toggleEditForm(bookingId) {
        let form = document.getElementById('edit-form-' + bookingId);
        form.classList.toggle('hidden');
    }
</script>
