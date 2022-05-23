<div class="text-gray-800 flex items-center justify-center flex-col">
    <h1 class="mb-4 mt-5 text-3xl font-bold">{{__('Project status page')}}</h1>
    <section class="md:w-2/5 p-6 font-mono">
        <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
            <div class=" overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                        <th class="px-4 py-3 w-1/2">Project Title</th>
                        <th class="px-4 py-3 w-1/5">Number of groups</th>
                        <th class="px-4 py-3 w-1/6">Students per group</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border border-gray-300">
                            <div>
                                <p class="font-semibold text-black">Mokslo muges tikslo pasiekimas</p>
                            </div>

                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border border-gray-300">22</td>
                        <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                            3
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <h1 class="font-bold text-3xl my-4">Students</h1>

    <section class="sm:w-3/5 w-full p-6 font-mono">
        <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
            <div class=" overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                        <th class="px-4 py-3 sm:w-2/5">Name</th>
                        <th class="px-4 py-3 sm:w-1/5">Group</th>
                        <th class="px-4 py-3 sm:w-1/5">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border border-gray-300">
                                <div>
                                    <p class="font-semibold text-black">Sufyan</p>
                                </div>

                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border border-gray-300">22</td>
                        <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                            Delete
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <button class="mt-2 rounded-md bg-gray-300 px-3 py-1" type="button">{{__('Add new student')}}</button>
    </section>
    <h1 class="font-bold text-3xl my-4">Groups</h1>

    <div class="grid grid-rows-1 sm:grid-cols-2 lg:w-5/12">
    <section class="w-full p-6 font-mono">
        <div class=" w-full mb-2 overflow-hidden rounded-lg shadow-lg">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                        <th class="px-4 py-3 text-center sm:w-2/5">Group #</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border border-gray-300">
                            <div>
                                <p class="font-semibold text-black text-center">Sufyan</p>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border border-gray-300">
                            <div class="h-1/2 text-sm">
                                    <select class="text-sm sm:text-base text-center w-full h-1/2" name="student"
                                            id="student">
                                        <option value="none" selected disabled hidden>Assign student</option>
                                        <option value="student_name">student_name</option>
                                    </select>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
        <section class="w-full p-6 font-mono">
            <div class="w-full mb-2 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                            <th class="px-4 py-3 text-center sm:w-2/5">Group #</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border border-gray-300">
                                <div>
                                    <p class="font-semibold text-black text-center">Sufyan</p>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border border-gray-300">
                                <div class="h-1/2 text-sm">
                                    <select class="text-sm sm:text-base text-center w-full h-1/2" name="student"
                                            id="student">
                                        <option value="none" selected disabled hidden>Assign student</option>
                                        <option value="student_name">student_name</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>

</div>
