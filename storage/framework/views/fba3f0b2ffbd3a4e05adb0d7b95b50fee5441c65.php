<div>
    <select
        wire:model="selectedStudent"
        wire:change="selected(<?php echo e($group->id); ?>)"
        class="text-sm sm:text-base text-center w-full"
        name="student"
        id="student">
        <option value="" selected disabled hidden>Assign student</option>
        <?php $__empty_1 = true; $__currentLoopData = $project->students()->whereNotIn('students.id',$studentsIds)
        ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($student->full_name); ?>">
                <?php echo e($student->full_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </select>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/group-assign.blade.php ENDPATH**/ ?>