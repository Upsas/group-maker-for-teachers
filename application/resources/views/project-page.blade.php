<x-app-layout>
@livewire('flash-message')
@if (session()->has('message'))
    <div id="flash-message" class="font-mono px-6 py-4 border-0  rounded-md relative w-5/12 mx-auto mt-6 mb-4
    bg-green-400">
        <span class="inline-block align-middle mr-4">
    {{session('message')}}
  </span>
        <button id="flash-message-button" class="absolute hover:opacity-50 bg-transparent text-2xl font-semibold
        leading-none right-0 top-0
        mt-4
        mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
        @push('js')
            <script>
                const flashMessage = document.getElementById('flash-message');
                flashMessage.style.display = 'block';
                document.getElementById('flash-message-button').addEventListener('click', () => {
                    flashMessage.style.display = 'none';
                })
                    setTimeout(() => {flashMessage.style.display = 'none'}, 5000);
            </script>
        @endpush
@endif

    <div class="text-gray-800 flex items-center justify-center flex-col">
        <h1 class="mb-4 mt-5 text-3xl font-bold">{{__('Project status page')}}</h1>
        @livewire('project-info-table', [$project])
        <h1 class="font-bold text-3xl my-4">{{__('Students')}}</h1>

        @livewire('students-info-table', [$project])

        <h1 class="font-bold text-3xl my-4">{{__('Groups')}}</h1>
            @livewire('groups-table', [$project])

    </div>

</x-app-layout>
