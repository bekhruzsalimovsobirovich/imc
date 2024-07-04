<?php

namespace App\Http\Controllers\Vacancies;

use App\Domain\Vacancies\Actions\StoreVacancyAction;
use App\Domain\Vacancies\DTO\StoreVacancyDTO;
use App\Domain\Vacancies\Models\Vacancy;
use App\Domain\Vacancies\Repositories\VacancyRepository;
use App\Domain\Vacancies\Requests\StoreVacancyRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * @var mixed|VacancyRepository
     */
    public mixed $vacancies;

    /**
     * @param VacancyRepository $vacancyRepository
     */
    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancies = $vacancyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vacancies.index', [
            'vacancies' => $this->vacancies->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request, StoreVacancyAction $action)
    {
        try {
            $request->validated();
            $dto = StoreVacancyDTO::fromArray($request->validated());
            $action->execute($dto);
            return redirect()->route('vacancies.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        return redirect()->back();
    }


//    API

    public function getPaginate()
    {
        return response()
            ->json([
                'status' => true,
                'data' => $this->vacancies->getPaginate()
            ]);
    }
}
