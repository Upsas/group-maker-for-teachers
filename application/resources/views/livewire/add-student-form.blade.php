<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 {{$hiddenStudentForm}}" id="student-add-form">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-600 opacity-50">
            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="mt-10 inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform
         transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true"
             aria-labelledby="modal-headline">
            <div class="container border-b-0 mx-auto">
                <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700">{{__('Add student')}}</h1>
                        <p class="text-gray-400 mb-3">{{__('Fill up the form below to add a student.')}}</p>
                    </div>

                    <div wire:loading class="text-center py-20 inline-block w-full">
                        <svg role="status"
                             class="inline w-10  text-center
                    h-10
                    mr-2
                    text-gray-200
                    animate-spin
                    dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                    </div>
                    <form wire:loading.remove wire:submit.prevent="storeStudent" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="full_name" class="block mb-2 text-sm text-gray-600 @error('full_name')
                            text-red-500
                            @enderror"
                            >{{__('Full name')}}</label>
                            <input
                                wire:model.defer="full_name"
                                type="text"
                                id="full_name"
                                name="full_name"
                                placeholder="Thomas Edison"
                                required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300
                                @error('full_name') text-red-500 border-red-500 @enderror"

                            />
                        </div>

                        @if ($errors->has('full_name'))
                            <div>

                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                </div>
            </div>

            <div class="bg-gray-200 px-4 py-3 text-right">
                <button id="student-add-from-close-btn" type="button" class="py-2 px-4 bg-gray-500 text-white rounded
                hover:bg-gray-700 mr-2">Cancel
                </button>
                <button id="btn-add-student" type="submit" class="py-2 px-4 bg-blue-500 text-white rounded
                hover:bg-blue-700
                mr-2">Add
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
      const studentAddForm =  document.getElementById('student-add-form');
        document.getElementById('btn-add-student').addEventListener('click', () => {
        studentAddForm.style.display = 'block';
        })
      document.getElementById('student-add-from-close-btn').addEventListener('click', () => {
          studentAddForm.style.display = 'none';
      })
    </script>
@endpush

