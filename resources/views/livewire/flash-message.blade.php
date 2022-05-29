<div id="flash-message-livewire" class="font-mono px-6 py-4 border-0  rounded-md relative w-5/12 mx-auto mt-6 mb-4
    {{$bgColor}} {{$flashMessageDisplay}}">
        <span class="inline-block align-middle mr-4">
    {{$message}}
  </span>
        <button id="flash-message-button-livewire" class="absolute hover:opacity-50 bg-transparent text-2xl
        font-semibold
        leading-none right-0 top-0
        mt-4
        mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    @if($flashMessageDisplay !== 'hidden')
            <script>
                const flashMessageBody = document.getElementById('flash-message-livewire');
                document.getElementById('flash-message-button-livewire').addEventListener('click', (e) => {
                    e.preventDefault();
                    flashMessageBody.style.display = 'none';
                })


            </script>
    @endif
    </div>
@push('js')
    <script>
        window.addEventListener('renderFlashMessage', () => {
            const flashMessageBody = document.getElementById('flash-message-livewire');
            setTimeout(() => {
                flashMessageBody.style.display = 'none';
            }, 5000);
        })
    </script>

@endpush
