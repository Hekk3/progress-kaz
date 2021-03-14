<?php


namespace App\Http\Controllers;


use App\Address;
use App\Helpers\TranslatesCollection;
use App\Mail\Feedback as FeedbackMail;
use App\Request as Feedback;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index(){

        $address = Address::getContent();
        $managers = Manager::getAll();

        TranslatesCollection::translate($address, app()->getLocale());
        TranslatesCollection::translate($managers, app()->getLocale());

        return view('feedback.index', compact('address', 'managers'));
    }


    public function request(Request $request) {

        $rules = [
            'fio'           => 'required|max:255',
        ];

        if (filter_var($request['phone_email'], FILTER_VALIDATE_EMAIL)){
            $rules['phone_email'] = 'required|max:255|email';
        }else{
            $rules['phone_email'] = 'required|max:255|regex:/(\+77)[0-9]{9}/';
        }

        $rules['message'] = 'required';

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response([
                'status' => 0,
                'error' => $errors->first()
            ], 200);

        }else{
            $model = Feedback::create($request->all());
            Mail::to(setting('site.feedback_email'))->send(new FeedbackMail($model));
            return response([
                'status'    => 1,
                'title'     => trans('texts.Заявка успешно отправлен'),
                'content'   => trans('texts.В ближайшее время мы свяжемся с вами'),
            ], 200);
        }
    }

}