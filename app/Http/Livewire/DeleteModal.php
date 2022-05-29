<?php

namespace App\Http\Livewire;

use App\Repositories\StudentRepository;
use Livewire\Component;

class DeleteModal extends Component
{
    protected $listeners = ['openDeleteModal'];
    public $displayModalStyle = 'hidden';
    public $studentId;
    public function render()
    {
        return view('livewire.delete-modal');
    }

    public function delete(StudentRepository $studentRepo)
    {
        $studentRepo->delete($this->studentId);
        $this->emit('renderGroupTables');
        $this->emit('renderStudentTable');
        $this->emit('renderFlashMessage', 'Student deleted successfully.', 'bg-red-500');
        $this->reset();
    }

    public function openDeleteModal(int $studentId)
    {
        $this->studentId = $studentId;
        $this->displayModalStyle = '';
    }
}
