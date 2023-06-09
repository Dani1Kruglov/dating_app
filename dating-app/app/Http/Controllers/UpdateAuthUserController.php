<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyPageUpdateRequest;
use App\Models\TagUser;
use App\Models\Users;
use Illuminate\Http\Request;

class UpdateAuthUserController extends Controller
{
    public function __invoke(Users $user, MyPageUpdateRequest $request)
    {

        $data = $request->validated();
        if (!empty($data['tags'])){
            $tags = $data['tags'];
            unset($data['tags']);
            $user->update($data);
            $user->tags()->detach();
            $user->tags()->attach($tags);
        }else{
            $user->update($data);
        }

        return redirect()->route('my.page');
    }
}
