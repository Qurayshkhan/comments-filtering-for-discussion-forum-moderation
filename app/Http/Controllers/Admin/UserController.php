<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannedUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('userStatus');
    }
    public function users()
    {
        $users = User::whereIn('role', ['normal_user', 'moderators'])->with('userBand')->get();
        return view('pages.admin.users.users', compact('users'));
    }

    public function addBan(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'start_ban' => 'required',
            'end_ban' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $ban = BannedUser::where('user_id', $request->user_id)->first();
        if (!$ban) {
            $ban = new BannedUser();
            $ban->user_id = $request->user_id;
        }
        $ban->ban_start = $request->start_ban;
        $ban->ban_end = $request->end_ban;
        $ban->save();
        return redirect()->back()->with('status', 'Add ban successfully');
    }

    public function removeBan($userId)
    {
        $ban = BannedUser::where('user_id', $userId)->first();
        if ($ban) {
            $ban->delete();
        }
        return redirect()->back()->with('status', 'Remove ban on user successfully');
    }

    public function statusChange($userId)
    {
        $user = User::find($userId);
        if ($user->status == 'pending') {
            $user->status = 'approved';
        } else {
            $user->status = 'pending';
        }
        $user->save();

        return redirect()->back()->with('status', 'Status changes successfully');
    }
    public function storeModerator(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('status', 'Moderator add successfully');
    }
}
