<div class="md:w-2/5 p-6 font-mono">
    <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
        <div class=" overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                    <th class="px-4 py-3 w-1/2">{{__('Project Title')}}</th>
                    <th class="px-4 py-3 w-1/5">{{__('Number of groups')}}</th>
                    <th class="px-4 py-3 w-1/6">{{__('Students per group')}}</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr class="text-gray-700">
                    <td class="px-4 py-3 border border-gray-300">
                        <div>
                            <p class="font-semibold text-black">{{$project->name}}</p>
                        </div>

                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300">{{$project->groups}}</td>
                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                        {{$project->students_per_group}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

