<div class="sm:w-3/5 w-full p-6 font-mono">
    <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
        <div class=" overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                    <th class="px-4 py-3 sm:w-2/5"><?php echo e(__('Name')); ?></th>
                    <th class="px-4 py-3 sm:w-1/5"><?php echo e(__('Group')); ?></th>
                    <th class="px-4 py-3 sm:w-1/5"><?php echo e(__('Action')); ?></th>
                </tr>
                </thead>
                <tbody class="bg-white text-md">
                <?php
                $paginatedStudents = $project->students()->paginate(10);
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $paginatedStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="text-gray-700">
                    <td class="px-4 py-2 border border-gray-300">
                        <div>
                            <p class="font-semibold text-black"><?php echo e($student->full_name); ?></p>
                        </div>
                    </td>

                    <td class="px-4 py-2 text-ms font-semibold border border-gray-300">
                        <?php echo e(($student->groups()->where('project_id', $project->id)->first() !== null) ? "Group #" . $student->groups()->first()
                        ->group_index : '-'); ?>

                        </td>

                    <td class="px-4 py-2 text-ms font-semibold border border-gray-300">
                       <button class="text-ms font-semibold font-mono"
                               type="button" wire:click="$emit('openDeleteModal', <?php echo e($student->id); ?>)"> Delete</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="text-gray-700">
                        <td colspan="3" class="text-center px-4 py-3 border border-gray-300">
                                <?php echo e(__('No students were found')); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo e($paginatedStudents->links()); ?>


        <button id="btn-add-student" type="button" class="bg-neutral-400 py-2 mt-2
                text-gray-100  px-3
                rounded-md hover:opacity-75"><span
                class="pr-1px">&#10009;
                    </span><?php echo e(__('Add new student')); ?></button>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('delete-modal')->html();
} elseif ($_instance->childHasBeenRendered('l796785143-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l796785143-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l796785143-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l796785143-0');
} else {
    $response = \Livewire\Livewire::mount('delete-modal');
    $html = $response->html();
    $_instance->logRenderedChild('l796785143-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-student-form', [$project])->html();
} elseif ($_instance->childHasBeenRendered('l796785143-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l796785143-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l796785143-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l796785143-1');
} else {
    $response = \Livewire\Livewire::mount('add-student-form', [$project]);
    $html = $response->html();
    $_instance->logRenderedChild('l796785143-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/students-info-table.blade.php ENDPATH**/ ?>