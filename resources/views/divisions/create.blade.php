<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Создание подразделения') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="{{ route('divisions.store') }}" method="POST" class="mt-6 space-y-6">
            @csrf
            <div>
              <x-input-label for="name" :value="__('Название')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            </div>

            <div>
              <x-input-label for="description" :value="__('Описание')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('description')"
                required autofocus />
            </div>

            <select for="records" name="records" multiple
              class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
              wire:model="Record">
              <option disabled value="">Выберите записи ...</option>
              @foreach ($divisions as $division)
          <option value={{ $division->id}}>{{ $division->name }}</option>
        @endforeach
            </select>

            <x-primary-button class="mt-4">{{ __('Создать') }}</x-primary-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>