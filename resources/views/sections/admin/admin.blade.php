<div class="container mx-auto px-4 py-8">
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
            </tr>
            </thead>
            <tbody>
            @foreach ($ways as $way)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $way->route }}</td>
                    <td class="px-4 py-2 border-b">{{ $way->bookings_count }}</td>
                    <td class="px-4 py-2 border-b">{{ number_format($way->bookings_avg_total_price, 2, ',', ' ') }}₽
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
