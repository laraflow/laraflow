<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\Auth\PermissionCollection;
use App\Http\Resources\Auth\PermissionResource;
use App\Models\Permission;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Laraflow\ApiCrud\Exceptions\DeleteOperationException;
use Laraflow\ApiCrud\Exceptions\StoreOperationException;
use Laraflow\ApiCrud\Exceptions\UpdateOperationException;

/**
 * Class PermissionController
 * @package App\Http\Controllers
 *
 * @lrd:start
 * This class handle create, preview, update, delete & restore
 * operation related to Permission
 * @lrd:end
 *
 */
class PermissionController extends Controller
{
    /**
     * Return a list view of the *Permission* resource.
     *
     * @param \App\Http\Requests\IndexPermissionRequest $request
     * @return Response
     */
    public function index(IndexPermissionRequest $request): Response
    {
        $inputs = $request->validated();

        return render('Permission/Index', compact('inputs'));
    }

    /**
     * Return a *Permission* resource as collection or paginate.
     * ```paginate=false``` returns all resource as collection
     *
     * @param \App\Http\Requests\IndexPermissionRequest $request
     * @return PermissionCollection|JsonResponse
     */
    public function search(IndexPermissionRequest $request): PermissionCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $permissions = Permission::filter($inputs)
            ->orderBy($request->input('sort', 'id'), $request->input('dir', 'asc'));

           if($request->input('paginate', true)) {
                $permissions = $permissions->paginate($request->input('per_page'));
           } else {
                $permissions = $permissions->get();
           }

            return new PermissionCollection($permissions);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a create view of *Permission* resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return render('Permission/Create');
    }

    /**
     * Create a new *Permission* resource in storage.
     *
     * @param \App\Http\Requests\StorePermissionRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StorePermissionRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $permission = Permission::create($inputs);

            if (!$permission) {
                throw (new StoreOperationException)->setModel(Permission::class);
            }

            return response()->created([
                'message' => __('api-crud::messages.resource.created', ['model' => 'Permission']),
                'id' => $permission->getKey()
             ]);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a show view of *Permission* resource found by id.
     *
     * @param Permission $permission
     * @return Response
     */
    public function show(Permission $permission): Response
    {
        $permission = new PermissionResource($permission);

        return render('Permission/Show', compact('permission'));
    }

    /**
     * Return a edit page *Permission* resource found by id.
     *
     * @param Permission $permission
     * @return Response
     */
    public function edit(Permission $permission): Response
    {
        $permission = new PermissionResource($permission);

        return render('Permission/Edit', compact('permission'));
    }

    /**
     * Update a specified *Permission* resource using id.
     *
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return JsonResponse
     * @throws UpdateOperationException
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): JsonResponse
    {
        try {

            $inputs = $request->validated();

            if (!$permission->update($inputs)) {

                throw (new UpdateOperationException)->setModel(Permission::class, $permission->getKey());
            }

            return response()->updated(__('api-crud::messages.resource.updated', ['model' => 'Permission']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Soft delete a specified *Permission* resource using id.
     *
     * @param Permission $permission
     * @return JsonResponse
     * @throws DeleteOperationException
     */
    public function destroy(Permission $permission): JsonResponse
    {
        try {

            if (!$permission->delete()) {

                throw (new DeleteOperationException())->setModel(Permission::class, $permission->getKey());
            }

            return response()->deleted(__('api-crud::messages.resource.deleted', ['model' => 'Permission']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }
}
