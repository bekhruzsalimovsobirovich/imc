<?php

namespace App\Http\Controllers\Faculties;

use App\Domain\Faculties\Actions\StoreFacultyAction;
use App\Domain\Faculties\Actions\UpdateFacultyAction;
use App\Domain\Faculties\DTO\StoreFacultyDTO;
use App\Domain\Faculties\DTO\UpdateFacultyDTO;
use App\Domain\Faculties\Models\Faculty;
use App\Domain\Faculties\Repositories\FacultyRepository;
use App\Domain\Faculties\Requests\StoreFacultyRequest;
use App\Domain\Faculties\Requests\UpdateFacultyRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class FacultyController extends Controller
{
    /**
     * @var mixed|FacultyRepository
     */
    public mixed $faculties;

    /**
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->faculties = $facultyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.faculties.index', [
            'faculties' => $this->faculties->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request, StoreFacultyAction $action)
    {
        try {
            $request->validated();
        } catch (ValidationException $validationException) {
            return redirect()->back();
        }

        try {
            $dto = StoreFacultyDTO::fromArray($request->validated());
            $action->execute($dto);
            return redirect()->route('faculties.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return view('dashboard.faculties.show', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('dashboard.faculties.edit', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty, UpdateFacultyAction $action)
    {
        try {
            $request->validated();
        } catch (ValidationException $validationException) {
            return redirect()->back();
        }

        try {
            $request->merge([
                'faculty' => $faculty
            ]);
            $dto = UpdateFacultyDTO::fromArray($request->all());
            $action->execute($dto);
            return redirect()->route('faculties.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        File::delete('storage/files/faculties/images/' . $faculty->image);
        $faculty->delete();

        return redirect()->back();
    }

//    API

    public function getPaginate()
    {
        return response()
            ->json([
                'status' => true,
                'data' => $this->faculties->paginate()
            ]);
    }
}
