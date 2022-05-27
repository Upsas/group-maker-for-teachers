<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Repositories\StudentRepository;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public const CREATE_STATUS_CODE = 201;
    public function __construct(private StudentRepository $studentRepo)
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StudentStoreRequest $request
     * @return Response
     */
    public function store(StudentStoreRequest $request): Response
    {
        $addedModel = $this->studentRepo->createStudentWithProject($request->validated());

        return response(
            ['message' => 'student was successfully added', 'student' => $addedModel],
            self::CREATE_STATUS_CODE
        );
    }
}
