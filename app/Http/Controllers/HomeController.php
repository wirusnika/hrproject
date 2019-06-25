<?php

namespace App\Http\Controllers;

use App\Image;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $userList = User::all();
        $authUserProfileImages = '';
        $imagesAll = Image::all();

        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');
        }

        $userWithImages = User::with('images')->get();
        $usersWithNotification = User::with('notifications');

        return view('profile', compact('authUserProfileImages', 'userList', 'userWithImages', 'usersWithNotification'));
    }


    public function search()
    {

        $search = request('search');
        $result = User::with('images')->where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();

            return view('search', compact('result'));
    }

    public function profile(Request $request)
    {
        $allImages = Image::all();
        $userList = User::all();
        $userWithImages = User::with('images')->get();
        $userWithImagespag = User::with('images')->get();

        $usersWithNotification = User::with('notifications')->get();

        $notifiesWithUsers = Notification::with('users')->get();


        $notifications = Notification::all();


        $forViewAuthUserIdImagesArray = [];
        $forViewAuthUserInsurance_docImagesArray = [];
        $forViewAuthUserContractImagesArray = [];

        $authUserIdImages = Image::all()->where('user_id', Auth::user()->id);

        foreach ($authUserIdImages as $one) {

            if ($one->id_passport != null) {
                $forViewAuthUserIdImagesArray[] = explode(",", $one->id_passport);
            }

            if ($one->contract != null) {
                $forViewAuthUserContractImagesArray[] = explode(",", $one->contract);
            }

            if ($one->insurance_doc != null) {
                $forViewAuthUserInsurance_docImagesArray[] = explode(",", $one->insurance_doc);
            }
        }
        $authUserProfileImages = '';
        $imagesAll = Image::all();


        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        }

        return view('profile',['userWithImages' => User::with('images')->paginate(8)], compact('authUserIdImages', 'userList', 'allImages', 'userWithImages', 'forViewAuthUserIdImagesArray', 'forViewAuthUserContractImagesArray', 'forViewAuthUserInsurance_docImagesArray', 'authUserProfileImages', 'usersWithNotification', 'notifications', 'notifiesWithUsers'));
    }

    public function settings()
    {
        $authUserProfileImages = '';
        $imagesAll = Image::all();


        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        }

        return view('settings', compact('authUserProfileImages'));
    }


    public function drive(Request $request)
    {
        $this->validate($request, [

            'id_passport.*' => 'mimes:jpeg,png,jpg,gif,svg,zip,pdf|max:2048',
            'contract.*' => 'mimes:jpeg,png,jpg,gif,svg,zip,pdf|max:2048',
            'insurance_doc.*' => 'mimes:jpeg,png,jpg,gif,svg,zip,pdf|max:2048',
        ]);


        if ($request->hasfile('id_passport')) {
            $counter = 0;
            foreach ($request->file('id_passport') as $image) {
                $imageName = str_slug(Auth::user()->name)
                    . time()
                    . $counter
                    . '.'
                    . $image->getClientOriginalExtension();

                $image->move(public_path()
                    . '/img/ids/', $imageName);

                $id_passport_data[] = $imageName;
                $counter++;
            }

            $ImageSave = new Image();
            $ImageSave->user_id = Auth::user()->id;

            $string = json_encode($id_passport_data);
            $search = array('"', '[', ']');
            $replaced = str_replace($search, "", $string);

            if (str_contains($replaced, ',')) {

                $result = explode(',', $replaced);
                foreach ($result as $one) {
                    $multiImageSave = new Image();
                    $multiImageSave->user_id = Auth::user()->id;
                    $multiImageSave->id_passport = $one;
                    $multiImageSave->save();
                }

            } else {

                $ImageSave->id_passport = $replaced;
                $ImageSave->save();
            }

        }


        if ($request->hasfile('contract')) {

            $counter = 0;
            foreach ($request->file('contract') as $image) {
                $imageName = str_slug(Auth::user()->name)
                    . '.'
                    . 'contract'
                    . time()
                    . $counter
                    . '.'
                    . $image->getClientOriginalExtension();

                $image->move(public_path()
                    . '/img/contracts/', $imageName);

                $contract_data[] = $imageName;
                $counter++;

            }

            $ImageSave = new Image();
            $ImageSave->user_id = Auth::user()->id;

            $string = json_encode($contract_data);
            $search = array('"', '[', ']');
            $replaced = str_replace($search, "", $string);

            if (str_contains($replaced, ',')) {

                $result = explode(',', $replaced);
                foreach ($result as $one) {
                    $multiImageSave = new Image();
                    $multiImageSave->user_id = Auth::user()->id;
                    $multiImageSave->contract = $one;
                    $multiImageSave->save();
                }

            } else {

                $ImageSave->contract = $replaced;
                $ImageSave->save();
            }
        }


        if ($request->hasfile('insurance_doc')) {
            $counter = 0;
            foreach ($request->file('insurance_doc') as $image) {
                $imageName = str_slug(Auth::user()->name)
                    . '.'
                    . 'insurance_doc'
                    . time()
                    . $counter
                    . '.'
                    . $image->getClientOriginalExtension();

                $image->move(public_path()
                    . '/img/insurance/', $imageName);

                $insurance_doc_data[] = $imageName;
                $counter++;
            }
            $ImageSave = new Image();
            $ImageSave->user_id = Auth::user()->id;

            $string = json_encode($insurance_doc_data);
            $search = array('"', '[', ']');
            $replaced = str_replace($search, "", $string);

            if (str_contains($replaced, ',')) {

                $result = explode(',', $replaced);
                foreach ($result as $one) {
                    $multiImageSave = new Image();
                    $multiImageSave->user_id = Auth::user()->id;
                    $multiImageSave->insurance_doc = $one;
                    $multiImageSave->save();
                }

            } else {

                $ImageSave->insurance_doc = $replaced;
                $ImageSave->save();
            }
        }


        $authUser = Auth::user();
        $AuthUsersAllWithImagesAll = User::with('images')->where('id', Auth::user()->id)->get();


        return view('drive', compact('AuthUsersAllWithImagesAll', 'authUser'));
    }


    public function editDays(Request $request)
    {

        if (request('vocationDays')) {
            $newVocationDays = request('vocationDays');
            $id = request('id');
            $findUser = User::find($id);
            $findUser->vocation_days = $newVocationDays;
            $findUser->save();

            return back();
        }

        if (request('sickDays')) {
            $newSickDays = request('sickDays');
            $id = request('id');
            $findUser = User::find($id);
            $findUser->sick_days = $newSickDays;
            $findUser->save();

            return back();

        }

    }

    public function store(Request $request)

    {
        request()->validate([

            'picture_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',

        ]);

        $imageName = Auth::user()->name . time() . '.' . request()->picture_name->getClientOriginalExtension();
        request()->picture_name->move(public_path('img/profile_imgs'), $imageName);

        $porpertyOne = DB::table('user_images')->where('user_id', Auth::user()->id)->where('picture_name', '!=', null)->pluck('picture_name');


        if (!$porpertyOne->isEmpty()) {
            $authUserProfilePicture = Image::all()->where('picture_name', '!=', null);
            foreach ($authUserProfilePicture as $one) {
                $one->picture_name = $imageName;
                $one->save();
            }
        } else {
            $authUserProfilePicture = new Image();
            $authUserProfilePicture->picture_name = $imageName;
            $authUserProfilePicture->user_id = Auth::user()->id;
            $authUserProfilePicture->save();
        }

        $userWithImages = User::with('images')->get();
        $userImages = image::all()->where('user_id', 'id')->pluck('picture_name');


        $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        $authUserIdImages = image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');
        $userList = User::all();

        return view('profile', compact('authUserIdImages', 'imageName', 'userList', 'userImages', 'userWithImages', 'authUserProfileImages'));


    }

    public function manager()
    {

        return view('manager');
    }

    public function postmanager()
    {

        return view('manager');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settingsStore(Request $request)
    {

        request()->validate([

            'picture_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $employee = User::all();

        $authUser = Auth::user();

        if ($request->hasFile('picture_name')) {
            $imageName = Auth::user()->name . time() . '.' . request()->picture_name->getClientOriginalExtension();
            request()->picture_name->move(public_path('img/profile_imgs'), $imageName);


            $porpertyOne = DB::table('user_images')->where('user_id', Auth::user()->id)->where('picture_name', '!=', null)->pluck('picture_name');


            if (!$porpertyOne->isEmpty()) {
                $authUserProfilePicture = Image::all()->where('picture_name', '!=', null);
                foreach ($authUserProfilePicture as $one) {
                    $one->picture_name = $imageName;
                    $one->save();
                }
            } else {
                $authUserProfilePicture = new Image();
                $authUserProfilePicture->picture_name = $imageName;
                $authUserProfilePicture->user_id = Auth::user()->id;
                $authUserProfilePicture->save();
            }

        }

        if (!$request->input('name') == null) {
            $authUser->name = $request->input('name');
        }

        if (!$request->input('address') == null) {
            $authUser->address = $request->input('address');
        }

        if (!$request->input('tel') == null) {
            $authUser->phone = $request->input('tel');
        }
        if (!$request->input('password') == null) {
            $authUser->password = bcrypt($request->input('password'));
        }


        $authUser->save();

        return back();

    }

    public function return()
    {

        return view('return');
    }
}
