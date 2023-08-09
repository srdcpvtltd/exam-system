<?php

namespace App\Http\Controllers\Prospect;

use App\Helpers\PaymentGateway;
use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use App\Models\PaymentHistory;
use App\Models\StudentAcademicQualification;
use App\Models\StudentDocument;
use App\Models\StudentProfile;
use App\Models\StudentProfileAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        return view('prospect.dashboard.index_testing');
    }
    public function studentProfileUpdate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        Auth::user()->update([
            'steps' => Auth::user()->steps + 1
        ]);
        toastr()->success('Student Profile Updated successfully');
        return redirect()->back(); 
    }
    public function studentProfileCreate(Request $request)
    {
        $studentProfile = StudentProfile::create($request->all());
        foreach($request->premise_name as $key => $premise_name)
        {
            if($request->same_as_temparory && $key == 1)
            {
                $country_id = $request->country_id[0];
                $state_id = $request->state_id[0];
            }else{
                $country_id = $request->country_id[$key];
                $state_id = $request->state_id[$key];
            }
            StudentProfileAddress::create([
                'premise_name' => @$premise_name,
                'plot_no' => @$request->plot_no[$key],
                'type' => @$request->type[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station' => @$request->police_station[$key],
                'country_id' => @$country_id,
                'state_id' => @$state_id,
                'pin' => @$request->pin[$key],
                'student_profile_id' => @$studentProfile->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        foreach($request->name_of_exam as $index => $name_of_exam)
        {
            StudentAcademicQualification::create([
                'name_of_exam' => @$name_of_exam,
                'name_of_board' => @$request->name_of_board[$index],
                'attended_school' => @$request->attended_school[$index],
                'passing_year' => @$request->passing_year[$index],
                'total_marks' => @$request->total_marks[$index],
                'marks' => @$request->marks[$index],
                'percentage' => @$request->percentage[$index],
                'user_id' => Auth::user()->id,
            ]);
        }
        $files = $request->file('document');
        foreach($request->document_category_id as $category_index => $document_category_id)
        {
            if(array_key_exists($category_index, $files))
            {
                if($document_category_id == '1' || $document_category_id == '2' || $document_category_id == '3' )
                {
                    if($files[$category_index]->extension() == 'png' || $files[$category_index]->extension() == 'jpeg' || $files[$category_index]->extension() == 'jpg' )
                    {
                        StudentDocument::create([
                            'document_category_id' => @$document_category_id,
                            'document' => @$request->document[$category_index],
                            'user_id' => Auth::user()->id,
                        ]);
                    }

                }else{
                    if($files[$category_index]->extension() == 'pdf')
                    {
                        StudentDocument::create([
                            'document_category_id' => @$document_category_id,
                            'document' => @$request->document[$category_index],
                            'user_id' => Auth::user()->id,
                        ]);
                    }

                }
            }
        }
        PaymentGateway::proccess();
        toastr()->success('Student Application Store successfully');
        return redirect()->route('prospect.payment.process'); 
    }
    // public function studentProfileCreate(Request $request)
    // {
    //     StudentProfile::create($request->all());
    //     Auth::user()->update([
    //         'steps' => Auth::user()->steps + 1
    //     ]);
    //     toastr()->success('Student Application Store successfully');
    //     return redirect()->back(); 
    // }
    public function studentAddressUpdate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        foreach($request->address_id as $key => $address_id)
        {
            $studentAddress = StudentProfileAddress::find($address_id);
            $studentAddress->update([
                'premise_name' => @$request->premise_name[$key],
                'plot_no' => @$request->plot_no[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station' => @$request->police_station[$key],
                'country_id' => @$request->country_id[$key],
                'state_id' => @$request->state_id[$key],
                'pin' => @$request->pin[$key],
            ]);
        }
        Auth::user()->update([
            'steps' => Auth::user()->steps + 1
        ]);
        toastr()->success('Student Profile Address Updated successfully');
        return redirect()->back(); 
    }
    public function studentAddressCreate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        foreach($request->premise_name as $key => $premise_name)
        {
            if($request->same_as_temparory && $key == 1)
            {
                $country_id = $request->country_id[0];
                $state_id = $request->state_id[0];
            }else{
                $country_id = $request->country_id[$key];
                $state_id = $request->state_id[$key];
            }
            StudentProfileAddress::create([
                'premise_name' => @$premise_name,
                'plot_no' => @$request->plot_no[$key],
                'type' => @$request->type[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station' => @$request->police_station[$key],
                'country_id' => @$country_id,
                'state_id' => @$state_id,
                'pin' => @$request->pin[$key],
                'student_profile_id' => @$studentProfile->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        Auth::user()->update([
            'steps' => Auth::user()->steps + 1
        ]);
        toastr()->success('Student Profile Address Stored successfully');
        return redirect()->back(); 
    }
    public function studentQualificationCreate(Request $request)
    {
        foreach($request->name_of_exam as $index => $name_of_exam)
        {
            StudentAcademicQualification::create([
                'name_of_exam' => @$name_of_exam,
                'name_of_board' => @$request->name_of_board[$index],
                'attended_school' => @$request->attended_school[$index],
                'passing_year' => @$request->passing_year[$index],
                'total_marks' => @$request->total_marks[$index],
                'marks' => @$request->marks[$index],
                'percentage' => @$request->percentage[$index],
                'user_id' => Auth::user()->id,
            ]);
        }
        Auth::user()->update([
            'steps' => Auth::user()->steps + 1
        ]);
        toastr()->success('Student Qualification Stored successfully');
        return redirect()->back(); 
    }
    public function studentQualificationUpdate(Request $request)
    {
        foreach($request->name_of_exam as $index => $name_of_exam)
        {
            if($request->qualification_id[$index])
            { 
                $qualification = StudentAcademicQualification::find($request->qualification_id[$index]);
                $qualification->update([
                    'name_of_exam' => @$name_of_exam,
                    'name_of_board' => @$request->name_of_board[$index],
                    'attended_school' => @$request->attended_school[$index],
                    'passing_year' => @$request->passing_year[$index],
                    'total_marks' => @$request->total_marks[$index],
                    'marks' => @$request->marks[$index],
                    'percentage' => @$request->percentage[$index],
                ]);

            }else{    
                StudentAcademicQualification::create([
                    'name_of_exam' => @$name_of_exam,
                    'name_of_board' => @$request->name_of_board[$index],
                    'attended_school' => @$request->attended_school[$index],
                    'passing_year' => @$request->passing_year[$index],
                    'total_marks' => @$request->total_marks[$index],
                    'marks' => @$request->marks[$index],
                    'percentage' => @$request->percentage[$index],
                    'user_id' => Auth::user()->id,
                ]);
            }
        }
        Auth::user()->update([
            'steps' => Auth::user()->steps + 1
        ]);
        toastr()->success('Student Qualification Stored successfully');
        return redirect()->back(); 
    }
    public function studentDocumentCreate(Request $request)
    {
        try{
            $files = $request->file('document');
            foreach($request->document_category_id as $index => $document_category_id)
            {
                if(array_key_exists($index, $files))
                {
                    if($document_category_id == '1' || $document_category_id == '2' || $document_category_id == '3' )
                    {
                       if($files[$index]->extension() != 'png' && $files[$index]->extension() != 'jpeg' && $files[$index]->extension() != 'jpg' )
                       {
                            toastr()->error("The document must be image type");
                            return back();
                       }
    
                    }else{
                        if($files[$index]->extension() != 'pdf')
                        {
                            toastr()->error("The document must be pdf type");
                            return back();
                        }
    
                    }
                }
            }
            foreach($request->document_category_id as $category_index => $document_category_id)
            {
                if(array_key_exists($category_index, $files))
                {
                    StudentDocument::create([
                        'document_category_id' => @$document_category_id,
                        'document' => @$request->document[$category_index],
                        'user_id' => Auth::user()->id,
                    ]);
                }
            }
            Auth::user()->update([
                'steps' => Auth::user()->steps + 1
            ]);
            toastr()->success('Student Document Stored successfully');
            return redirect()->route('prospect.payment.process'); 
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function studentDocumentUpdate(Request $request)
    {
        try{
            $files = $request->file('document');
            foreach($request->document_category_id as $index => $document_category_id)
            {
                if(array_key_exists($index, $files))
                {
                    if($document_category_id == '1' || $document_category_id == '2' || $document_category_id == '3' )
                    {
                       if($files[$index]->extension() != 'png' && $files[$index]->extension() != 'jpeg' && $files[$index]->extension() != 'jpg' )
                       {
                            toastr()->error("The document must be image type");
                            return back();
                       }
    
                    }else{
                        if($files[$index]->extension() != 'pdf')
                        {
                            toastr()->error("The document must be pdf type");
                            return back();
                        }
    
                    }
                }
            }
            foreach($request->document_category_id as $category_index => $document_category_id)
            {
                if(array_key_exists($category_index, $files))
                {
                    $category = DocumentCategory::find($document_category_id);
                    if($category->document())
                    {
                        $document = $category->document();
                        $document->update([
                            'document_category_id' => @$document_category_id,
                            'document' => @$request->document[$category_index],
                            'user_id' => Auth::user()->id,
                        ]);
                    }else{
                        StudentDocument::create([
                            'document_category_id' => @$document_category_id,
                            'document' => @$request->document[$category_index],
                            'user_id' => Auth::user()->id,
                        ]);
                    }
                }
                    
            }
            Auth::user()->update([
                'steps' => Auth::user()->steps + 1
            ]);
            toastr()->success('Information Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function downloadFile($id)
    {
        $document = StudentDocument::find($id);
        $files = public_path(). "$document->document";
        return Response::download($files);
    }
    public function getQualificationFields(Request $request)
    {
        $key = $request->key;
        $html = view('prospect.dashboard.partials.academic_qualification_fields', compact('key'))->render();
        return response([
            'html' => $html,
        ], 200);
    }
    public function getBackSteps()
    {
        
        Auth::user()->update([
            'steps' => Auth::user()->steps - 1
        ]);
        return response([
            'success' => true,
        ], 200);
    }

    public function generateApllicationForm(Request $request){
        // retreive all records from db
        $pdf = PDF::loadView('prospect.application.pdf_form');
        // download PDF file with download method
        return $pdf->stream(Auth::user()->name.'.pdf');
    }
    
    public function payment_callback(Request $request){
        $merchant_id = config('services.razor_pay.merchant_id');
        $merchant_sub_id = config('services.razor_pay.merchant_sub_id');
        $sign_key = config('services.razor_pay.sign_key');
        $encryption_key = hash('sha256', config('services.razor_pay.encryption_key'), true);
        $encryption_iv = config('services.razor_pay.encryption_iv');

        $responsejson = $request->resjson;
        Log::info("txninit response received : ".$responsejson);
        $decodedVal = json_decode($responsejson);
        $retData = $decodedVal->data;
        $res = PaymentGateway::pkcs5_unpad(openssl_decrypt ( base64_decode($retData) , 'AES-256-CBC' , $encryption_key ,OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $encryption_iv));
        Log::info(" txninit service response after decryption: ".$res);
        $decodedData = json_decode($res);
        if(property_exists($decodedData,"errorcd")){
            $errorcd = $decodedData->errorcd;
        }
        
        if(isset($errorcd) && $errorcd != NULL){
            Log::error("Server error ! Please contact your website Administrator! Error Code : ".$errorcd);
        }else{
            $trackid = $decodedData->trackid;  //ensure to save in db
            $txnstatus = $decodedData->txnstatus; //ensure to save in db
            $merchanttxnid = $decodedData->merchanttxnid;
            if($trackid!=NULL)
            {
                PaymentHistory::where('user_id',$decodedData->udf1)->update([
                    'track_id'   => $trackid,
                    'status' => $txnstatus,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                if($txnstatus=="SUCCESS"){
                    Log::info("Txn is Successfull !");
                    toastr()->success('Payment Successfull.');
                    return redirect()->route("prospect.dashboard.index");
                }else if($txnstatus=="FAILURE"){
                    Log::info("Txn has failed !");
                    toastr()->error('Transaction Failed.');
                    return redirect()->route("prospect.dashboard.index");
                }else if($txnstatus=="AWAITED"){
                    Log::info("Txn status is awaited ! Please check after some time !");
                    toastr()->info('Transaction status is awaited ! Please check after some time !');
                    return redirect()->route("prospect.dashboard.index");
                }
            }
        }
        toastr()->error('Something Went Wrong.');
        return redirect()->route("prospect.dashboard.index");
    }
}
