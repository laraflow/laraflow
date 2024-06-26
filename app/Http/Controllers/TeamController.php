<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\Auth\TeamCollection;
use App\Http\Resources\Auth\TeamResource;
use App\Models\Team;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Laraflow\ApiCrud\Exceptions\DeleteOperationException;
use Laraflow\ApiCrud\Exceptions\StoreOperationException;
use Laraflow\ApiCrud\Exceptions\UpdateOperationException;

/**
 * Class TeamController
 * @package App\Http\Controllers
 *
 * @lrd:start
 * This class handle create, preview, update, delete & restore
 * operation related to Team
 * @lrd:end
 *
 */
class TeamController extends Controller
{
    /**
     * Return a list view of the *Team* resource.
     *
     * @param IndexTeamRequest $request
     * @return Response
     */
    public function index(IndexTeamRequest $request): Response
    {
        $inputs = $request->validated();

        return render('Team/Index', compact('inputs'));
    }

    /**
     * Return a *Team* resource as collection or paginate.
     * ```paginate=false``` returns all resource as collection
     *
     * @param IndexTeamRequest $request
     * @return \App\Http\Resources\Auth\TeamCollection|JsonResponse
     */
    public function search(IndexTeamRequest $request): TeamCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $teams = Team::filter($inputs)
            ->orderBy($request->input('sort', 'id'), $request->input('dir', 'asc'));

           if($request->input('paginate', true)) {
                $teams = $teams->paginate($request->input('per_page'));
           } else {
                $teams = $teams->get();
           }

            return new TeamCollection($teams);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a create view of *Team* resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return render('Team/Create');
    }

    /**
     * Create a new *Team* resource in storage.
     *
     * @param \App\Http\Requests\StoreTeamRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StoreTeamRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $team = Team::create($inputs);

            if (!$team) {
                throw (new StoreOperationException)->setModel(Team::class);
            }

            return response()->created([
                'message' => __('api-crud::messages.resource.created', ['model' => 'Team']),
                'id' => $team->getKey()
             ]);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a show view of *Team* resource found by id.
     *
     * @param Team $team
     * @return Response
     */
    public function show(Team $team): Response
    {
        $team = new TeamResource($team);

        return render('Team/Show', compact('team'));
    }

    /**
     * Return a edit page *Team* resource found by id.
     *
     * @param Team $team
     * @return Response
     */
    public function edit(Team $team): Response
    {
        $team = new TeamResource($team);

        return render('Team/Edit', compact('team'));
    }

    /**
     * Update a specified *Team* resource using id.
     *
     * @param UpdateTeamRequest $request
     * @param Team $team
     * @return JsonResponse
     * @throws UpdateOperationException
     */
    public function update(UpdateTeamRequest $request, Team $team): JsonResponse
    {
        try {

            $inputs = $request->validated();

            if (!$team->update($inputs)) {

                throw (new UpdateOperationException)->setModel(Team::class, $team->getKey());
            }

            return response()->updated(__('api-crud::messages.resource.updated', ['model' => 'Team']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Soft delete a specified *Team* resource using id.
     *
     * @param Team $team
     * @return JsonResponse
     * @throws DeleteOperationException
     */
    public function destroy(Team $team): JsonResponse
    {
        try {

            if (!$team->delete()) {

                throw (new DeleteOperationException())->setModel(Team::class, $team->getKey());
            }

            return response()->deleted(__('api-crud::messages.resource.deleted', ['model' => 'Team']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }
}
