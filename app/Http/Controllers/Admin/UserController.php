<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Actions\User\CreateUserAction;
use App\Actions\User\DeleteUserAction;
use App\Actions\User\UpdateUserAction;
use App\Enums\CivilStatus;
use App\Enums\IdType;
use App\Enums\RoleEnum;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        Gate::authorize('viewAny', User::class);

        $allowedSorts = [
            'first_name',
            'last_name',
            'email',
            'created_at',
        ];

        $sort = $request->string('sort')->value();

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'created_at';
        }

        $direction = $request->string('direction')->value() === 'asc'
            ? 'asc'
            : 'desc';

        $users = User::query()
            ->with('roles')
            ->when(
                $request->filled('search'),
                function ($query) use ($request) {
                    $search = $request->string('search');

                    $query->where(function ($query) use ($search) {
                        $query
                            ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
                }
            )
            ->orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('admin/users/Index', [
            'users' => UserResource::collection($users),

            'filters' => [
                'search' => $request->string('search')->value(),
            ],

            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        Gate::authorize('create', User::class);

        return Inertia::render('admin/users/Create', [
            'roles' => RoleEnum::staffOptions(),
            'civilStatuses' => CivilStatus::options(),
            'idTypes' => IdType::options(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreUserRequest $request,
        CreateUserAction $action
    ): RedirectResponse {
        Gate::authorize('create', User::class);

        $action->execute($request->validated());

        return to_route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        Gate::authorize('view', $user);

        return Inertia::render('admin/users/Show', [
            'user' => UserResource::make(
                $user->load('roles')
            ),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        Gate::authorize('update', $user);

        return Inertia::render('admin/users/Edit', [
            'user' => UserResource::make($user->load('roles')),
            'roles' => RoleEnum::staffOptions(),
            'civilStatuses' => CivilStatus::options(),
            'idTypes' => IdType::options(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateUserRequest $request,
        User $user,
        UpdateUserAction $action
    ): RedirectResponse {
        Gate::authorize('update', $user);

        $action->execute($user, $request->validated());

        return back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        User $user,
        DeleteUserAction $action
    ): RedirectResponse {
        Gate::authorize('delete', $user);

        $action->execute($user);

        return back()->with('success', 'User deleted.');
    }
}
