<?php

namespace App\Http\Controllers\News;

use App\Domain\News\Actions\StoreNewAction;
use App\Domain\News\Actions\UpdateNewAction;
use App\Domain\News\DTO\StoreNewDTO;
use App\Domain\News\DTO\UpdateNewDTO;
use App\Domain\News\Models\Novelty;
use App\Domain\News\Repositories\NewRepository;
use App\Domain\News\Requests\StoreNewRequest;
use App\Domain\News\Requests\UpdateNewRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class NewController extends Controller
{
    /**
     * @var mixed|NewRepository
     */
    public mixed $novelties;

    /**
     * @param NewRepository $newRepository
     */
    public function __construct(NewRepository $newRepository)
    {
        $this->novelties = $newRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.news.index', [
            'novelties' => $this->novelties->paginate()
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewRequest $request, StoreNewAction $action)
    {
        try {
            $request->validated();
        } catch (ValidationException $validationException) {
            return redirect()->back();
        }

        try {
            $dto = StoreNewDTO::fromArray($request->validated());
            $action->execute($dto);
            return redirect()->route('novelties.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Novelty $novelty)
    {
        return view('dashboard.news.show', [
            'novelty' => $novelty
        ]);
    }

    /**
     * @param Novelty $novelty
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Novelty $novelty)
    {
        return view('dashboard.news.edit', [
            'novelty' => $novelty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewRequest $request, Novelty $novelty, UpdateNewAction $action)
    {
        try {
            $request->validated();
        } catch (ValidationException $validationException) {
            return response()
                ->json([
                    'status' => false,
                    'message' => $validationException->getMessage()
                ]);
        }

        try {
            $request->merge([
                'novelty' => $novelty
            ]);
            $dto = UpdateNewDTO::fromArray($request->all());
            $action->execute($dto);

            return redirect()->route('novelties.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novelty $novelty)
    {
        File::delete('storage/files/novelties/images/' . $novelty->image);
        $novelty->delete();

        return redirect()->back();
    }

//--------------------------------------------------------------- API ----------------------------------------------------------------

    /**
     * Display the specified resource.
     */
    public function showNew($novelty)
    {
        return response()
            ->json([
                'status' => true,
                'data' => Novelty::query()
                    ->find($novelty)
            ]);
    }

//--------------------------------------------------------------- E'lonlar TYPE=1 ----------------------------------------------------------------

    public function getNew()
    {
        return $this->novelties->getNew();
    }
//--------------------------------------------------------------- End e'lonlar  -------------------------------------------------------------------

//--------------------------------------------------------------- Yangiliklar TYPE = 2  -----------------------------------------------------------

    public function getEvent()
    {
        return $this->novelties->getEvent();
    }

//--------------------------------------------------------------- Yangiliklar TYPE = 2  -----------------------------------------------------------
}
