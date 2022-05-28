<?php

namespace App\Http\Livewire;

use App\Http\Controllers\API\StudentController;
use App\Models\Project;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddStudentForm extends Component
{
    public $hiddenStudentForm = 'hidden';
    public $full_name;
    public Project $project;

    public function mount(Project $project): void
    {
        $this->project = $project;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.add-student-form');
    }

    public function storeStudent()
    {
        $this->hiddenStudentForm = '';

        $response = $this->storeAPIRequest();

        if ($response->status() !== StudentController::CREATE_STATUS_CODE) {
            $this->addError('full_name', $response->json()['message']);
        } else {
            $this->emit('renderFlashMessage', 'Student added successfully');
            $this->resetErrorBag('full_name');
            $this->emit('renderStudentTable');
            $this->emit('renderGroupTables');
            $this->resetExcept('project');
        }
    }

    private function storeAPIRequest(): PromiseInterface|Response
    {
        //        If request do'http://192.168.208.1/api/student/store' ipconfig
        return Http::acceptJson()->withToken((Auth::user())
            ->createToken('sanctumValidationToken')->plainTextToken)
            ->asForm()
            ->post('http://192.168.0.175/api/student/store', [
                'project_id' => $this->project->id,
                'full_name' => $this->full_name,
            ]);
    }
}
