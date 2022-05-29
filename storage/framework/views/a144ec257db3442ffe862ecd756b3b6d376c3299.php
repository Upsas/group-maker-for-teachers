<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount($name, $params)->html();
} elseif ($_instance->childHasBeenRendered('MnRodAt')) {
    $componentId = $_instance->getRenderedChildComponentId('MnRodAt');
    $componentTag = $_instance->getRenderedChildComponentTagName('MnRodAt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MnRodAt');
} else {
    $response = \Livewire\Livewire::mount($name, $params);
    $html = $response->html();
    $_instance->logRenderedChild('MnRodAt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php /**PATH /var/www/html/vendor/livewire/livewire/src/Testing/../views/mount-component.blade.php ENDPATH**/ ?>