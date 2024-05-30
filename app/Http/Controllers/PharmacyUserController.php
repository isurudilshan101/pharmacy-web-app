<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy_user;
use App\Models\prescription_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendQuotationEmail;
use App\Models\NewUser;
use PharIo\Manifest\Email;

class PharmacyUserController extends Controller
{
    // pharmacy user login

    public function admin_login(Request $request)
    {

        $pha_user_email = $request->email;
        $pha_user_password = $request->password;

        $result = Pharmacy_user::where('pha_user_email', $pha_user_email)
            ->where('pha_user_password', $pha_user_password)
            ->first();

        $prescriptions = prescription_detail::paginate(10);
        // $images_path = explode('|', $prescriptions->image);
        // dd($images_path);


        $prescriptions = prescription_detail::paginate(10);
        // $images_path = [];

        // foreach ($prescriptions as $prescription) {
        //     //   dd($prescription->image);
        //     $images = explode('|', $prescription->image);
        //     // dd($images);
        //     // $images_path = array_merge($images_path, $images);
        // }


        if ($result == !null) {


            $loged_pha_user_name = $result->pha_user_name;
            $loged_pha_user_id = $result->id;

            $data = [
                'loged_pha_user_name' => $loged_pha_user_name,
                'loged_pha_user_id' => $loged_pha_user_id,
            ];

            return view('pha_user_dashboard', compact('data', 'prescriptions'));
        } else {

            return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
        }

        return view('pha_user_login');
    }

    public function view_pha_user_dashboard()
    {
        return view('pha_user_dashboard');
    }

    public function view($user_id)
    {
        $prescription = prescription_detail::where('user_id', $user_id)->first();
        $image_path_array = explode('|', $prescription->image);

        $main_image = $image_path_array[0];
        return view('prescriptions_view', ['prescription' => $prescription, 'images_path' => $image_path_array, 'main_image' => $main_image]);
    }


    public function prescription_bill(Request $request)
    {


        $drug_name = $request->input('drug_name');
        $quantity_input = $request->input('quantity_input');
        $unit_price = 20;
        $total_pay = $quantity_input * $unit_price;


        $data = [
            'drug_name' => $drug_name,
            'quantity_input' => $quantity_input,
            'total_pay' => $total_pay
        ];

        return response()->json($data);



        // Return a response (optional)
        //  return response()->json(['message' => 'Data received successfully']);
    }

    // public function send_quotation(Request $request, $user_id)
    // {
    //     $total_value = $request->input('total_value');

    //     // dd("Total value checking  " . $total_value_check);

    //     // Retrieve the user's email address based on the user_id
    //     $user = NewUser::findOrFail($user_id);

    //     $userEmail = $user->email;
    //     //  dd($userEmail);

    //     // Send the email
    //     Mail::to($userEmail)->send(new SendQuotationEmail());

    //     // Additional logic or response
    // }

    public function send_quotation(Request $request, $user_id){

         
        $quotationData = [
            'total_value' => $request->input('total_value'),
            'user_id'  => $request->input('user_id'),
        ];

        $user = NewUser::findOrFail($user_id);
        
        try {
            Mail::to($user->email)->send(new SendQuotationEmail($quotationData));
        } catch (\Exception $e) {
            // Handle any exceptions if the email sending fails
            return response()->json(['message' => 'Email sending failed'], 500);
        }
        return response()->json(['message' => 'Email sent successfully'], 200);
        // return redirect()->route('welcome');

        // return redirect()->back();
    }

    public function accept(Request $request, $id)
        {
            
            $user = NewUser::findOrFail($id);

           // dd($user);
        
           
        }

    public function reject(Request $request, $id)
        {
             
            $user = NewUser::findOrFail($id);
           // dd($user);
             
        }
    
}