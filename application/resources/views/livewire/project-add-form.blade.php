<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-600 opacity-50">
            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="mt-10 inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform
         transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true"
             aria-labelledby="modal-headline">
            <div class="container mx-auto">
                <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700">{{__('Add project')}}</h1>
                        <p class="text-gray-400 mb-3">{{__('Fill up the form below to add a project.')}}</p>
                    </div>
                    <form action="" method="POST">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm text-gray-600"
                            >{{__('Title')}}</label
                            >
                            <input
                                type="text"
                                name="title"
                                placeholder="Egg drop project"
                                required
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            />
                        </div>
                        <div class="flex flex-col sm:flex-row items-center mb-5 sm:space-x-5">
                            <div class="w-full sm:w-1/2">
                                <label for="email" class="block mb-2 text-sm text-gray-600"
                                >{{__('Groups number')}}</label
                                >
                                <input
                                    type="number"
                                    name="groups"
                                    placeholder="2"
                                    required
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md
                                    focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                />
                            </div>
                            <div class="w-full sm:w-1/2 mt-2 sm:mt-0">
                                <label for="email"
                                       class=" mb-2 text-sm text-gray-600">{{__('Students per group')}}</label>
                                <input
                                    type="number"
                                    name="students_per_group"
                                    placeholder="2"
                                    required
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md
                                    focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                        onclick="toggleModal()"><i class="fas fa-times"></i> Cancel
                </button>
                <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i
                        class="fas fa-plus"></i> Create
                </button>
            </div>
        </div>
    </div>
</div>

