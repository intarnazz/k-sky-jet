<div class="container mx-auto px-4 py-8">
    <!-- Статистика по бронированиям -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Статистика по бронированиям</h2>

        <p><strong>Количество активных броней:</strong> {{ $activeBookingsCount }}</p>
        <p><strong>Средний чек:</strong> {{ number_format($averagePrice, 2, ',', ' ') }} ₽</p>
    </div>

    <!-- Столбиковый график -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">График бронирований</h2>

        <div class="space-y-4">
            @foreach ($ways as $way)
                <div class="flex items-center space-x-4">
                    <div class="w-1/4 text-gray-700">{{ $way->route }}</div>
                    <div class="relative w-full h-6 bg-gray-200 rounded-lg">
                        <div class="absolute top-0 left-0 h-full bg-blue-500 rounded-lg"
                             style="width: {{ $maxBookingsCount > 0 ? ($way->bookings_count / $maxBookingsCount) * 100 : 0 }}%"></div>
                    </div>
                    <div class="w-1/4 text-center text-gray-700">
                        {{ $way->bookings_count }} бронирований
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Список рейсов с количеством бронирований -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Ваши рейсы</h2>

        <table class="min-w-full table-auto">
            <thead>
            <tr>
                <th class="px-4 py-2 border-b">Рейс</th>
                <th class="px-4 py-2 border-b">Количество бронирований</th>
                <th class="px-4 py-2 border-b">Средний чек</th>
                <th class="px-4 py-2 border-b">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ways as $way)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $way->route }}</td>
                    <td class="px-4 py-2 border-b">{{ $way->bookings_count }}</td>
                    <td class="px-4 py-2 border-b">{{ number_format($way->bookings_avg_total_price, 2, ',', ' ') }}₽
                    </td>
                    <td class="px-4 py-2 border-b">
                        <button class="text-blue-500 hover:underline edit-button" data-id="{{ $way->id }}">
                            Редактировать
                        </button>
                        <form action="{{ route('admin.way.delete', $way->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                        </form>
                    </td>
                </tr>

                <!-- Форма для редактирования рейса, скрыта по умолчанию -->
                <tr id="edit-form-{{ $way->id }}" class="edit-form hidden">
                    <td colspan="4" class="px-4 py-2 border-b bg-gray-100">
                        <form action="{{ route('admin.way.patch', $way->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="route" class="block text-sm font-medium text-gray-700">Маршрут</label>
                                <input type="text" name="route" value="{{ $way->route }}" id="route"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>

                            <div class="mb-4">
                                <label for="class" class="block text-sm font-medium text-gray-700">Класс</label>
                                <input type="text" name="class" value="{{ $way->class }}" id="class"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Цена</label>
                                <input type="number" name="price" value="{{ $way->price }}" id="price"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>

                            <div class="mb-4">
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700">Описание</label>
                                <textarea name="description" id="description" rows="4"
                                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md"
                                          required>{{ $way->description }}</textarea>
                            </div>

                            <!-- Добавлены поля для времени отправления и прибытия -->
                            <div class="mb-4">
                                <label for="departure_time" class="block text-sm font-medium text-gray-700">Время
                                    отправления</label>
                                <input type="datetime-local" name="departure_time"
                                       value="{{ \Carbon\Carbon::parse($way->departure_time)->format('Y-m-d\TH:i') }}"
                                       id="departure_time"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>

                            <div class="mb-4">
                                <label for="arrival_time" class="block text-sm font-medium text-gray-700">Время
                                    прибытия</label>
                                <input type="datetime-local" name="arrival_time"
                                       value="{{ \Carbon\Carbon::parse($way->arrival_time)->format('Y-m-d\TH:i') }}"
                                       id="arrival_time"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Фото</label>
                                <input type="file" name="image" id="image"
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md"
                                       accept="image/*">
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                Сохранить изменения
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Форма для добавления нового рейса -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Добавить новый рейс</h2>
        <form action="{{ route('admin.way.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="route" class="block text-sm font-medium text-gray-700">Маршрут</label>
                <input type="text" name="route" id="route"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="class" class="block text-sm font-medium text-gray-700">Класс</label>
                <input type="text" name="class" id="class"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Цена</label>
                <input type="number" name="price" id="price"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>

            <!-- Добавлены поля для времени отправления и прибытия -->
            <div class="mb-4">
                <label for="departure_time" class="block text-sm font-medium text-gray-700">Время отправления</label>
                <input type="datetime-local" name="departure_time" id="departure_time"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="arrival_time" class="block text-sm font-medium text-gray-700">Время прибытия</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Фото</label>
                <input type="file" name="image" id="image"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" accept="image/*">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Добавить рейс
            </button>
        </form>
    </div>


</div>

<script>
    // Открытие и закрытие формы редактирования
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const form = document.getElementById(`edit-form-${id}`);
            form.classList.toggle('hidden');  // Показать или скрыть форму редактирования
        });
    });
</script>
