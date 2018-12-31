<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;

class EnsureRoleSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 1. 如果用户已经登录
        // 2. 并且已经认证 Email
        // 3. 并且还没有角色
        // 4. 且访问的不是 role 选择相关 URL 或者退出的 URL
        if ($request->user() &&
            $request->user()->hasVerifiedEmail() &&
            ! $request->user()->hasAnyRole(Role::all()) &&
            ! $request->is('select_role', 'students', 'colleges', 'logout')) {
            // 根据客户端返回对应的内容
            return $request->expectsJson()
                        ? abort(403, 'You have to select a role.')
                        : redirect()->route('role.select');
        }
        return $next($request);
    }
}
