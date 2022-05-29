<div class="grid grid-rows-1 sm:grid-cols-2 lg:w-5/12" id="groups">
    <?php $__empty_1 = true; $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="w-full p-6 font-mono">
            <div class=" w-full mb-2 overflow-hidden rounded-lg shadow-lg">
                <div class="overflow-x-auto">
                    <?php
                        $students = $group->students()->get()->toArray();
                        $studentsIds = [];
                    ?>
                    <table class="w-full">
                        <thead class="">
                        <tr class="text-md h-16 font-semibold tracking-wide text-left text-gray-900 bg-gray-300
                        uppercase
                    border-b border-gray-300">
                            <th class="px-4 py-3  text-center sm:w-2/5"><?php echo e("Group #"); ?><?php echo e($group->group_index); ?>

                            <?php if(count($students) === $project->students_per_group): ?>
                            <p class="text-xs">(<?php echo e(__('Group is full')); ?>)</p>
                            <?php endif; ?>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">

                        <?php for($i = 0; $i < $project->students_per_group; $i++): ?>
                            <?php if(array_key_exists($i, $students)): ?>
                                <?php
                                    $studentsIds[] = $students[$i]['id'];
                                ?>

                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border border-gray-300">
                                        <div class="h-10 flex justify-center items-center w-full">
                                            <p class="font-semibold text-black text-center  relative h-10 w-full">
                                                <span class="flex justify-center
                                                h-10 items-center"><?php echo e($students[$i]['full_name']); ?></span>
                                                <button
                                                        class="hover:opacity-50 bg-transparent text-2xl
                                                        font-semibold
                                                        top-0 right-0
                                                        h-full
                                                        leading-none
                                                        absolute
                                                        outline-none focus:outline-none"
                                                        wire:click="unselect('<?php echo e($students[$i]['full_name']); ?>',
                                                        <?php echo e($group->id); ?>)">
                                                    <span>×</span>
                                                </button>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr  class="text-gray-700">
                                    <td class="px-4 py-3 h-10 border border-gray-300">
                                        <div class="h-10 text-sm">
                                            <select
                                                wire:model="selectedStudent"
                                                wire:change="selected(<?php echo e($group->id); ?>)"
                                                class="text-sm sm:text-base text-center w-full"
                                                name="student">
                                                <option value="" selected disabled hidden>Assign student</option>
                                                <?php $__empty_2 = true; $__currentLoopData = $allStudents->filter(function($value) use ($studentsIds)
                                    {return !in_array($value->id, $studentsIds);})->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <option value="<?php echo e($student->full_name); ?>">
                                                        <?php echo e($student->full_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php echo e(__('Something went wrong')); ?>

    <?php endif; ?>

</div>
<?php /**PATH /var/www/html/resources/views/livewire/groups-table.blade.php ENDPATH**/ ?>