<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Customer\UpdateCustomerAction;
use App\Actions\User\DeleteUserAction;
use App\Enums\CivilStatus;
use App\Enums\IdType;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class CustomerController extends Controller
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

        $customers = User::query()
            ->role(RoleEnum::CUSTOMER->value)
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

        return Inertia::render('admin/customers/Index', [
            'customers' => UserResource::collection($customers),

            'filters' => [
                'search' => $request->string('search')->value(),
            ],

            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer): Response
    {
        Gate::authorize('view', $customer);

        return Inertia::render('admin/customers/Show', [
            'customer' => UserResource::make(
                $customer->load('roles')
            ),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer): Response
    {
        Gate::authorize('update', $customer);

        return Inertia::render('admin/customers/Edit', [
            'customer' => UserResource::make($customer->load('roles')),
            'civilStatuses' => CivilStatus::options(),
            'idTypes' => IdType::options(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCustomerRequest $request,
        User $customer,
        UpdateCustomerAction $action
    ): RedirectResponse {
        Gate::authorize('update', $customer);

        $action->execute($customer, $request->validated());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Customer updated successfully!',
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        User $customer,
        DeleteUserAction $action
    ): RedirectResponse {
        Gate::authorize('delete', $customer);

        $action->execute($customer);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Customer deleted!',
        ]);

        return back();
    }
}
