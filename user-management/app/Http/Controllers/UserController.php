<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * 顯示所有用戶（支持過濾和分頁）
     */
    public function index(Request $request)
    {
        $query = User::query();

        // 過濾狀態
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // 分頁
        $users = $query->paginate(10);

        return UserResource::collection($users);
    }

    /**
     * 創建新用戶
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        // 密碼哈希處理
        $validatedData['password'] = Hash::make($validatedData['password']);

        // 創建用戶
        $user = User::create($validatedData);

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * 顯示單個用戶資料
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * 更新用戶資料
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();

        // 只更新 email 和 phone_number
        $user->update($validatedData);

        return new UserResource($user);
    }

    /**
     * 刪除用戶（軟刪除）
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    /**
     * 批量刪除用戶
     */
    public function bulkDelete(Request $request)
    {
        $userIds = $request->input('user_ids', []);

        if (empty($userIds)) {
            return response()->json(['message' => 'No user IDs provided.'], 400);
        }

        User::whereIn('id', $userIds)->delete();

        return response()->json(['message' => 'Users deleted successfully.'], 200);
    }
}
