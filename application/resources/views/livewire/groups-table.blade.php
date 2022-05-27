<div class="grid grid-rows-1 sm:grid-cols-2 lg:w-5/12" id="groups">
    @forelse ($groups as $group)
        <div class="w-full p-6 font-mono">
            <div class=" w-full mb-2 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                            <th class="px-4 py-3 text-center sm:w-2/5">{{"Group #" }}{{$group->group_index}}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @php
                            $students = $group->students()->get()->toArray();
                            $studentsIds = [];
                        @endphp
                        @for ($i = 0; $i < $project->students_per_group; $i++)
                            @if(array_key_exists($i, $students))
                                @php
                                    $studentsIds[] = $students[$i]['id'];
                                @endphp
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border border-gray-300">
                                        <div class="h-10 flex justify-center items-center">
                                            <p class="font-semibold text-black text-center">{{$students[$i]['full_name']}}</p>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr  class="text-gray-700">
                                    <td class="px-4 py-3 h-10 border border-gray-300">
                                        <div class="h-10 text-sm">
                                            <select
                                                wire:model="selectedStudent"
                                                wire:change="selected({{$group->id}})"
                                                class="text-sm sm:text-base text-center w-full"
                                                name="student">
                                                <option value="" selected disabled hidden>Assign student</option>
                                                @forelse($project->students()->whereNotIn('students.id',$studentsIds)
                                                ->get() as $student)
                                                    <option value="{{$student->full_name}}">
                                                        {{ $student->full_name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        {{__('Something went wrong')}}
    @endforelse

</div>
