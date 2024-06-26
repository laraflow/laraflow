<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\Auth\RoleCollection;
use App\Http\Resources\Auth\RoleResource;
use App\Models\Role;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Laraflow\ApiCrud\Exceptions\DeleteOperationException;
use Laraflow\ApiCrud\Exceptions\StoreOperationException;
use Laraflow\ApiCrud\Exceptions\UpdateOperationException;

/**
 * Class RoleController
 * @package App\Http\Controllers
 *
 * @lrd:start
 * This class handle create, preview, update, delete & restore
 * operation related to Role
 * @lrd:end
 *
 */
class RoleController extends Controller
{
    /**
     * Return a list view of the *Role* resource.
     *
     * @param IndexRoleRequest $request
     * @return Response
     */
    public function index(IndexRoleRequest $request): Response
    {
        $inputs = $request->validated();

        return render('Role/Index', compact('inputs'));
    }

    /**
     * Return a *Role* resource as collection or paginate.
     * ```paginate=false``` returns all resource as collection
     *
     * @param IndexRoleRequest $request
     * @return RoleCollection|JsonResponse
     */
    public function search(IndexRoleRequest $request): RoleCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $roles = Role::filter($inputs)
            ->orderBy($request->input('sort', 'id'), $request->input('dir', 'asc'));

           if($request->input('paginate', true)) {
                $roles = $roles->paginate($request->input('per_page'));
           } else {
                $roles = $roles->get();
           }

            return new RoleCollection($roles);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a create view of *Role* resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return render('Role/Create');
    }

    /**
     * Create a new *Role* resource in storage.
     *
     * @param \App\Http\Requests\StoreRoleRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $role = Role::create($inputs);

            if (!$role) {
                throw (new StoreOperationException)->setModel(Role::class);
            }

            return response()->created([
                'message' => __('api-crud::messages.resource.created', ['model' => 'Role']),
                'id' => $role->getKey()
             ]);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a show view of *Role* resource found by id.
     *
     * @param Role $role
     * @return Response
     */
    public function show(Role $role): Response
    {
        $role = new RoleResource($role);

        return render('Role/Show', compact('role'));
    }

    /**
     * Return a edit page *Role* resource found by id.
     *
     * @param Role $role
     * @return Response
     */
    public function edit(Role $role): Response
    {
        $role = new RoleResource($role);

        return render('Role/Edit', compact('role'));
    }

    /**
     * Update a specified *Role* resource using id.
     *
     * @param \App\Http\Requests\UpdateRoleRequest $request
     * @param Role $role
     * @return JsonResponse
     * @throws UpdateOperationException
     */
    public function update(UpdateRoleRequest $request, Role $role): JsonResponse
    {
        try {

            $inputs = $request->validated();

            if (!$role->update($inputs)) {

                throw (new UpdateOperationException)->setModel(Role::class, $role->getKey());
            }

            return response()->updated(__('api-crud::messages.resource.updated', ['model' => 'Role']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Soft delete a specified *Role* resource using id.
     *
     * @param Role $role
     * @return JsonResponse
     * @throws DeleteOperationException
     */
    public function destroy(Role $role): JsonResponse
    {
        try {

            if (!$role->delete()) {

                throw (new DeleteOperationException())->setModel(Role::class, $role->getKey());
            }

            return response()->deleted(__('api-crud::messages.resource.deleted', ['model' => 'Role']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }
}
