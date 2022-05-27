<div class="sm:w-3/5 w-full p-6 font-mono">
    <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
        <div class=" overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                    <th class="px-4 py-3 sm:w-2/5">{{__('Name')}}</th>
                    <th class="px-4 py-3 sm:w-1/5">{{__('Group')}}</th>
                    <th class="px-4 py-3 sm:w-1/5">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @php
                $paginatedStudents = $project->students()->paginate(10);
                @endphp
                @forelse($paginatedStudents as $student)

                    <tr class="text-gray-700">
                    <td class="px-4 py-3 border border-gray-300">
                        <div>
                            <p class="font-semibold text-black">{{$student->full_name}}</p>
                        </div>
                    </td>

                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                        {{($student->groups()->where('project_id', $project->id)->first() !== null) ? "Group #" . $student->groups()->first()
                        ->group_index : '-' }}
                        </td>

                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                        Delete
                    </td>
                </tr>
                @empty
                    <tr class="text-gray-700">
                        <td colspan="3" class="text-center px-4 py-3 border border-gray-300">
                                {{__('No students were found')}}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{$paginatedStudents->links()}}

        <button id="btn-add-student" type="button" class="bg-neutral-400 py-2 mt-2
                text-gray-100  px-3
                rounded-md hover:opacity-75"><span
                class="pr-1px">&#10009;
                    </span>{{__('Add new student')}}</button>

    @livewire('add-student-form', [$project])
</div>

