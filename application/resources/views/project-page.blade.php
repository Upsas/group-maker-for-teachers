<x-app-layout>
    <div class="text-gray-800 flex items-center justify-center flex-col">
        <h1 class="mb-4 mt-5 text-3xl font-bold">{{__('Project status page')}}</h1>
        @livewire('project-info-table', [$project])
        <h1 class="font-bold text-3xl my-4">{{__('Students')}}</h1>

        @livewire('students-info-table', [$project])

        <h1 class="font-bold text-3xl my-4">{{__('Groups')}}</h1>
        <div class="grid grid-rows-1 sm:grid-cols-2 lg:w-5/12">
            @livewire('groups-table', [$project])
        </div>
    </div>
</x-app-layout>
