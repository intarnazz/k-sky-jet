<h2 class="text-3xl font-semibold text-gray-900 mb-6">Услуги</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach($services as $service)
        <a href="{{ route('service', ['service'=>$service->id]) }}" class="border p-4 rounded-lg shadow-md mb-4">
            @if($service->images)
                <img src="{{ route('image', ['image' => $service->images[0]->id]) }}" alt="Изображение услуги"
                     class="w-full h-48 object-cover rounded-md mb-3">
            @endif
            <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
            <p class="text-gray-600">{{ $service->description }}</p>
            <p><strong>Просмотры:</strong> {{ $service->views }}</p>
            <p><strong>Тип:</strong> {{ $service->type }}</p>
            <p class="text-lg font-bold">Цена: {{ number_format($service->price, 0, ',', ' ') }} ₽</p>
        </a>
    @endforeach
</div>

