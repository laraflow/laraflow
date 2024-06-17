<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\IndexUserRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Http\Resources\Auth\UserCollection;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Laraflow\ApiCrud\Exceptions\DeleteOperationException;
use Laraflow\ApiCrud\Exceptions\StoreOperationException;
use Laraflow\ApiCrud\Exceptions\UpdateOperationException;

/**
 * Class UserController
 * @package App\Http\Controllers\Auth
 *
 * @lrd:start
 * This class handle create, preview, update, delete & restore
 * operation related to User
 * @lrd:end
 *
 */
class UserController extends Controller
{
    /**
     * Return a list view of the *User* resource.
     *
     * @param IndexUserRequest $request
     * @return Response
     */
    public function index(IndexUserRequest $request): Response
    {
        $inputs = $request->validated();

        return render('User/Index', compact('inputs'));
    }

    /**
     * Return a *User* resource as collection or paginate.
     * ```paginate=false``` returns all resource as collection
     *
     * @param IndexUserRequest $request
     * @return UserCollection|JsonResponse
     */
    public function search(IndexUserRequest $request): UserCollection|JsonResponse
    {
        try {
            $inputs = $request->validated();

            $users = User::filter($inputs)
                ->orderBy($request->input('sort', 'id'), $request->input('dir', 'asc'));

            if ($request->input('paginate', true)) {
                $users = $users->paginate($request->input('per_page'));
            } else {
                $users = $users->get();
            }

            return new UserCollection($users);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a create view of *User* resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return render('User/Create');
    }

    /**
     * Create a new *User* resource in storage.
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     * @throws StoreOperationException
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        try {
            $inputs = $request->validated();

            $user = User::create($inputs);

            if (!$user) {
                throw (new StoreOperationException)->setModel(User::class);
            }

            return response()->created([
                'message' => __('api-crud::messages.resource.created', ['model' => 'User']),
                'id' => $user->getKey()
            ]);

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Return a show view of *User* resource found by id.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user): Response
    {
        $user = new UserResource($user);

        return render('User/Show', compact('user'));
    }

    /**
     * Return a edit page *User* resource found by id.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user): Response
    {
        $user = new UserResource($user);

        return render('User/Edit', compact('user'));
    }

    /**
     * Update a specified *User* resource using id.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return JsonResponse
     * @throws UpdateOperationException
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        try {

            $inputs = $request->validated();

            if (!$user->update($inputs)) {

                throw (new UpdateOperationException)->setModel(User::class, $user->getKey());
            }

            return response()->updated(__('api-crud::messages.resource.updated', ['model' => 'User']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }

    /**
     * Soft delete a specified *User* resource using id.
     *
     * @param User $user
     * @return JsonResponse
     * @throws DeleteOperationException
     */
    public function destroy(User $user): JsonResponse
    {
        try {

            if (!$user->delete()) {

                throw (new DeleteOperationException())->setModel(User::class, $user->getKey());
            }

            return response()->deleted(__('api-crud::messages.resource.deleted', ['model' => 'User']));

        } catch (Exception $exception) {

            return response()->failed($exception->getMessage());
        }
    }
}
