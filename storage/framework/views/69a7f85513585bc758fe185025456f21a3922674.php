<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('flash-message')->html();
} elseif ($_instance->childHasBeenRendered('DYDaPxF')) {
    $componentId = $_instance->getRenderedChildComponentId('DYDaPxF');
    $componentTag = $_instance->getRenderedChildComponentTagName('DYDaPxF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DYDaPxF');
} else {
    $response = \Livewire\Livewire::mount('flash-message');
    $html = $response->html();
    $_instance->logRenderedChild('DYDaPxF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php if(session()->has('message')): ?>
    <div id="flash-message" class="font-mono px-6 py-4 border-0  rounded-md relative w-5/12 mx-auto mt-6 mb-4
    bg-green-400">
        <span class="inline-block align-middle mr-4">
    <?php echo e(session('message')); ?>

  </span>
        <button id="flash-message-button" class="absolute hover:opacity-50 bg-transparent text-2xl font-semibold
        leading-none right-0 top-0
        mt-4
        mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
        <?php $__env->startPush('js'); ?>
            <script>
                const flashMessage = document.getElementById('flash-message');
                flashMessage.style.display = 'block';
                document.getElementById('flash-message-button').addEventListener('click', () => {
                    flashMessage.style.display = 'none';
                })
                    setTimeout(() => {flashMessage.style.display = 'none'}, 5000);
            </script>
        <?php $__env->stopPush(); ?>
<?php endif; ?>

    <div class="text-gray-800 flex items-center justify-center flex-col">
        <h1 class="mb-4 mt-5 text-3xl font-bold"><?php echo e(__('Project status page')); ?></h1>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('project-info-table', [$project])->html();
} elseif ($_instance->childHasBeenRendered('LMvRDnJ')) {
    $componentId = $_instance->getRenderedChildComponentId('LMvRDnJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('LMvRDnJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LMvRDnJ');
} else {
    $response = \Livewire\Livewire::mount('project-info-table', [$project]);
    $html = $response->html();
    $_instance->logRenderedChild('LMvRDnJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <h1 class="font-bold text-3xl my-4"><?php echo e(__('Students')); ?></h1>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('students-info-table', [$project])->html();
} elseif ($_instance->childHasBeenRendered('LfQdGda')) {
    $componentId = $_instance->getRenderedChildComponentId('LfQdGda');
    $componentTag = $_instance->getRenderedChildComponentTagName('LfQdGda');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LfQdGda');
} else {
    $response = \Livewire\Livewire::mount('students-info-table', [$project]);
    $html = $response->html();
    $_instance->logRenderedChild('LfQdGda', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <h1 class="font-bold text-3xl my-4"><?php echo e(__('Groups')); ?></h1>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('groups-table', [$project])->html();
} elseif ($_instance->childHasBeenRendered('PmHPNj1')) {
    $componentId = $_instance->getRenderedChildComponentId('PmHPNj1');
    $componentTag = $_instance->getRenderedChildComponentTagName('PmHPNj1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PmHPNj1');
} else {
    $response = \Livewire\Livewire::mount('groups-table', [$project]);
    $html = $response->html();
    $_instance->logRenderedChild('PmHPNj1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
    <script>
        const refreshData = function() {
            setTimeout(() => {
                refreshData();
                Livewire.emit('renderStudentTable');
                Livewire.emit('refreshProjectInfoTable');
                Livewire.emit('renderGroupTables');
            }, 10000);
        }
        refreshData();
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/project-page.blade.php ENDPATH**/ ?>