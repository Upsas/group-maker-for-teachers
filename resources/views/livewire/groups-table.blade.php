<div class="grid grid-rows-1 sm:grid-cols-2 lg:w-5/12" id="groups">
    @forelse ($groups as $group)
        <div class="w-full p-6 font-mono">
            <div class=" w-full mb-2 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    @php
                        $students = $group->students()->get()->toArray();
                        $studentsIds = [];
                    @endphp
                    <table class="w-full">
                        <thead class="">
                        <tr class="text-md h-16 font-semibold tracking-wide text-left text-gray-900 bg-gray-300
                        uppercase
                    border-b border-gray-300">
                            <th class="px-4 py-3  text-center sm:w-2/5">{{"Group #" }}{{$group->group_index}}
                            @if(count($students) === $project->students_per_group)
                            <p class="text-xs">({{__('Group is full')}})</p>
                            @endif
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">

                        @for ($i = 0; $i < $project->students_per_group; $i++)
                            @if(array_key_exists($i, $students))
                                @php
                                    $studentsIds[] = $students[$i]['id'];
                                @endphp

                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border border-gray-300">
                                        <div class="h-10 flex justify-center items-center w-full">
                                            <p class="font-semibold text-black text-center  relative h-10 w-full">
                                                <span class="flex justify-center
                                                h-10 items-center">{{$students[$i]['full_name']}}</span>
                                                <button
                                                        class="hover:opacity-50 bg-transparent text-2xl
                                                        font-semibold
                                                        top-0 right-0
                                                        h-full
                                                        leading-none
                                                        absolute
                                                        outline-none focus:outline-none"
                                                        wire:click="unselect('{{$students[$i]['full_name']}}',
                                                        {{$group->id}})">
                                                    <span>×</span>
                                                </button>
                                            </p>
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
                                                @forelse($allStudents->filter(function($value) use ($studentsIds)
                                    {return !in_array($value->id, $studentsIds);})->all() as  $student)
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
