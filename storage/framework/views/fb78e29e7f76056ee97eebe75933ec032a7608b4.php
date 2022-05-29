<div class="md:w-2/5 p-6 font-mono">
    <div class=" mb-2 overflow-hidden rounded-lg shadow-lg">
        <div class=" overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase
                    border-b border-gray-300">
                    <th class="px-4 py-3 w-1/2"><?php echo e(__('Project Title')); ?></th>
                    <th class="px-4 py-3 w-1/5"><?php echo e(__('Number of groups')); ?></th>
                    <th class="px-4 py-3 w-1/6"><?php echo e(__('Students per group')); ?></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr class="text-gray-700">
                    <td class="px-4 py-3 border border-gray-300">
                        <div>
                            <p class="font-semibold text-black"><?php echo e($project->name); ?></p>
                        </div>

                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300"><?php echo e($project->groups); ?></td>
                    <td class="px-4 py-3 text-ms font-semibold border border-gray-300">
                        <?php echo e($project->students_per_group); ?>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/project-info-table.blade.php ENDPATH**/ ?>