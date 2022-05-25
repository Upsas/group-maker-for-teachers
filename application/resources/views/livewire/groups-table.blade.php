@for ($a = 0; $a < $project->groups; $a++)
    @php
        $students = $project->groups()->first()?->students()->get()->toArray() ?? [];
        $groups = $project->groups()->get()->toArray()
    @endphp
    <div class="w-full p-6 font-mono">
        <div class=" w-full mb-2 overflow-hidden rounded-lg shadow-lg">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                        <th class="px-4 py-3 text-center sm:w-2/5">{{"Group #" }}{{array_key_exists($a, $groups) ?
                        $groups[$a]['group_index'] : ''}}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">

                    @for ($i = 0; $i < $project->students_per_group; $i++)
                        @if(array_key_exists($i, $students))
                        <tr class="text-gray-700">
                        <td class="px-4 py-3 border border-gray-300">
                            <div class="h-10 flex justify-center items-center">
                                <p class="font-semibold text-black text-center">{{$students[$i]['full_name']}}</p>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 h-10 border border-gray-300">
                            <div class=" h-10 text-sm">
                                <select class="text-sm sm:text-base text-center w-full" name="student"
                                        id="student">
                                    <option value="none" selected disabled hidden>Assign student</option>
                                    @forelse($project->students()->get() as $student)
                                    <option value={{$student->full_name}}>{{ $student->full_name }}</option>
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
@endfor
