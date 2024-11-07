<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Редактирование пользователя') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="{{ route('users.update', $users->id) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div>
              <x-input-label for="name" :value="__('Имя пользователя')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $users->name)" required autofocus autocomplete="name" />
            </div>

            <div>
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $users->email)" required autocomplete="email" />
            </div>

            <div>
              <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Роль') }}</p>
              <select for="role_id" name="role_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                wire:model="User">
                <option disabled value="">Выберите роль...</option>

                @foreach ($roles as $role)
          <option value={{ $role->id }}>{{ $role->name }}</option>
        @endforeach
              </select>
            </div>

            <div>
              <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Подразделения') }}</p>

              <div class="flex items-center mb-4 mt-2">

                @foreach ($divisions as $division)
          <input id="division-{{ $division->id }}" type="checkbox" value={{ $division->id }}  @if(in_array($division->id, $userDivisions)) checked @endif name="divisions[]"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="division-{{ $division->id }}"
            class="mr-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $division->name }}</label>
        @endforeach
              </div>
            </div>

            <div>
              <x-input-label for="password" :value="__('Пароль')" />
              <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
            </div>
            <x-primary-button class="mt-4">{{ __('Сохранить') }}</x-primary-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>