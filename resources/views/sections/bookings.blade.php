<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Статистика по бронированиям</h2>

        @php
            // Рассчитываем количество активных бронирований
            $activeBookingsCount = $bookings->where('status', 'active')->count();

            // Рассчитываем средний чек
            $averagePrice = $bookings->avg('total_price');
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
                <p><strong>Статус:</strong> {{ ucfirst($booking->status) }}</p>
                <p><strong>Цена:</strong> {{ number_format($booking->total_price, 0, ',', ' ') }} ₽</p>
            </div>
        @empty
            <p>У вас нет бронирований.</p>
        @endforelse
    </div>
</div>
