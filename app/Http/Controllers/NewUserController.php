<?php



namespace App\Http\Controllers;

use App\Models\NewUser;
use App\Models\Pharmacy_user;
use App\Models\prescription_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewUserController extends Controller
{
    public function store(Request $request)
    {

        $hash_password = md5($request->password);

        //NewUser::create($request->all());

        NewUser::create([
            // 'user_id'=>auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'dob' => $request->dob,
            'password' => $hash_password

        ]);

        return view('user_login');
    }

    public function login(Request $request)
    {

        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('new_users')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();


        if ($result == !null) {


            $loged_user_name = $result->name;
            $loged_user_id = $result->id;



            $data = [
                'loged_user_name' => $loged_user_name,
                'loged_user_id' => $loged_user_id,
            ];

            //dd($data);

            return redirect()->route('user_dashboard')->with('data', $data);
        } else {

            return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
        }

        return view('user_login');
    }

    public function user_dashboard_view()
    {
        return view('user_dashboard');
    }

    public function submit_prescription(Request $request)
    {


        $image = array();

        if ($files = $request->file('images')) {

            foreach ($files as $file) {

                $image_name = md5(rand(1000, 10000));
                //dd($image_name);
                $ext = strtolower($file->getClientOriginalExtension());

                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/precription_images/';

                $image_url = $upload_path . $image_full_name;

                $file->move($upload_path, $image_full_name);

                $image[] = $image_url;
            }
        }




        prescription_detail::create([

            'user_id' => $request->user_id,
            'image' => implode('|', $image),
            'note' => $request->note,
            'deliver_address' => $request->delivery_address,
            'deliver_time_slot' => $request->delivery_time,


        ]);

        //========================mail send code here=========================
        return view('thank_prescriptions');
    }
}



//=========================
// use App\Models\User;

// $user = User::where('email', $email)
//     ->where('password', $password)
//     ->first();