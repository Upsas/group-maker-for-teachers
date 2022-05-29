<?php foreach($attributes->onlyProps(['width' => '80px', 'height' => '100px']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['width' => '80px', 'height' => '100px']); ?>
<?php foreach (array_filter((['width' => '80px', 'height' => '100px']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<svg width="<?php echo e($width); ?>" height="<?php echo e($height); ?>" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="9" y="2" width="6" height="6" rx="1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M4 18V14C4 13.4477 4.44772 13 5 13H19C19.5523 13 20 13.4477 20 14V18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <circle cx="4" cy="20" r="2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <circle cx="20" cy="20" r="2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <circle cx="12" cy="20" r="2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12 8V18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
<?php /**PATH C:\Users\deivi\Desktop\nfq-task\application\resources\views/components/application-logo.blade.php ENDPATH**/ ?>