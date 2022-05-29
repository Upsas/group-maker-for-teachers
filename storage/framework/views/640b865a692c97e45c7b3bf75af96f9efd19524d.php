<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>">

        <title>Group Maker For Teachers</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('navigation')->html();
} elseif ($_instance->childHasBeenRendered('HVke3iA')) {
    $componentId = $_instance->getRenderedChildComponentId('HVke3iA');
    $componentTag = $_instance->getRenderedChildComponentTagName('HVke3iA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HVke3iA');
} else {
    $response = \Livewire\Livewire::mount('navigation');
    $html = $response->html();
    $_instance->logRenderedChild('HVke3iA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>

        </div>
        <script>
            function toggleModal() {
                document.getElementById('modal').classList.toggle('hidden')
            }
        </script>
        <?php echo $__env->yieldPushContent('js'); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>