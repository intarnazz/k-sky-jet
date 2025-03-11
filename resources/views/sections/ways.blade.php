<h2 class="text-3xl font-semibold text-gray-900 mb-6">Рейсы</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach($ways as $way)
        <a href="{{ route('way', ['way' => $way->id]) }}" class="border p-4 rounded-lg shadow-md mb-4">
            @if($way->image)
                <img src="{{ route('image', ['image' => $way->image_id]) }}" alt="Маршрут изображение"
                     class="w-full h-48 object-cover rounded-md mb-3">
            @endif
            <h2 class="text-xl font-semibold">{{ $way->route }}</h2>
            <p class="text-gray-600">{{ $way->description }}</p>
            <p><strong>Просмотры:</strong> {{ $way->views }}</p>
            <p><strong>Класс:</strong> {{ ucfirst($way->class) }}</p>
            <p><strong>Дата вылета:</strong> {{ \Carbon\Carbon::parse($way->departure_time)->format('d.m.Y H:i') }}</p>
            <p><strong>Дата прилёта:</strong> {{ \Carbon\Carbon::parse($way->arrival_time)->format('d.m.Y H:i') }}</p>
            <p class="text-lg font-bold">Цена: {{ number_format($way->price, 0, ',', ' ') }} ₽</p>
        </a>
    @endforeach
</div>
