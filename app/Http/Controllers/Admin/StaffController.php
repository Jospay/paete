<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Staff\CreateStaffAction;
use App\Actions\Staff\UpdateStaffAction;
use App\Actions\User\DeleteUserAction;
use App\Enums\CivilStatus;
use App\Enums\IdType;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\StoreStaffRequest;
use App\Http\Requests\Staff\UpdateStaffRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Scoped to staffValues() so customers (managed separately via
     * CustomerController) never show up here.
     */
    public function index(Request $request): Response
    {
        Gate::authorize('viewAny', [User::class, 'staff']);

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

        $staff = User::query()
            ->role(RoleEnum::staffValues())
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

        return Inertia::render('admin/staff/Index', [
            'staff' => UserResource::collection($staff),

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
        Gate::authorize('create', [User::class, 'staff']);

        return Inertia::render('admin/staff/Create', [
            'roles' => RoleEnum::staffOptions(),
            'civilStatuses' => CivilStatus::options(),
            'idTypes' => IdType::options(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreStaffRequest $request,
        CreateStaffAction $action
    ): RedirectResponse {
        Gate::authorize('create', [User::class, 'staff']);

        $action->execute($request->validated());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Staff created successfully!',
        ]);

        return to_route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $staff): Response
    {
        Gate::authorize('view', $staff);

        return Inertia::render('admin/staff/Show', [
            'staff' => UserResource::make(
                $staff->load('roles')
            ),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff): Response
    {
        Gate::authorize('update', $staff);

        return Inertia::render('admin/staff/Edit', [
            'staff' => UserResource::make($staff->load('roles')),
            'roles' => RoleEnum::staffOptions(),
            'civilStatuses' => CivilStatus::options(),
            'idTypes' => IdType::options(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateStaffRequest $request,
        User $staff,
        UpdateStaffAction $action
    ): RedirectResponse {
        Gate::authorize('update', $staff);

        $action->execute($staff, $request->validated());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Staff updated successfully!',
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        User $staff,
        DeleteUserAction $action
    ): RedirectResponse {
        Gate::authorize('delete', $staff);

        $action->execute($staff);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Staff deleted!',
        ]);

        return back();
    }
}
