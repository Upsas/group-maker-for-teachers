<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 <?php echo e($displayModalStyle); ?>" id="delete-modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-600 opacity-50">
            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="mt-10 inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform
         transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true"
             aria-labelledby="modal-headline">
            <div class="container border-b-0 mx-auto">
                <div class="max-w-xl p-5 mb-2 mx-auto my-10 bg-white rounded-md">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700"><?php echo e(__('Are you sure?')); ?></h1>
                        <p class="text-gray-400 mb-3"><?php echo e(__('Do you really want to delete a student?')); ?></p>
                    </div>
                    <div class="px-4 pt-4 mt-4 text-center">
                        <button id="btn-close-delete-modal"
                                type="button"
                                class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2">
                                Cancel
                        </button>
                        <button id="btn-delete-student"
                                type="submit"
                                wire:click = "delete()"
                                class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700 mr-2">
                            Delete
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('js'); ?>
    <script>
        const deleteModal =  document.getElementById('delete-modal');
        document.getElementById('btn-close-delete-modal').addEventListener('click', () => {
            deleteModal.style.display = 'none';
        })
    </script>
<?php $__env->stopPush(); ?>


<?php /**PATH /var/www/html/resources/views/livewire/delete-modal.blade.php ENDPATH**/ ?>