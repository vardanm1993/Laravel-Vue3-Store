<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Group $group): RedirectResponse
    {
        $data = $request->validated();
        $group->update($data);

        return redirect()->route('group.show', compact('group'));
    }
}
