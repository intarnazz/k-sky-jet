<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $service->name }}</h1>
        <p class="text-gray-500">{{ $service->views }} просмотров</p>
    </div>

    @include('components.button.back')

    <div class="flex flex-col md:flex-row">
        <!-- Галерея изображений -->
        <div class="md:w-1/2 mb-6 md:mb-0">
            <div class="grid grid-cols-2 gap-4">
                @foreach($service->images as $image)
                    <img src="{{ route('image', ['image' => $image->id]) }}" alt="Изображение услуги"
                         class="w-full h-32 object-cover rounded-md">
                @endforeach
            </div>
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
