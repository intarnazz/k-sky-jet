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
</div>
