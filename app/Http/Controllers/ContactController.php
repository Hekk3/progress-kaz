<?php


namespace App\Http\Controllers;


use App\Address;
use App\Helpers\TranslatesCollection;
use App\Requisite;

class ContactController extends Controller
{
    public function index(){

        $address = Address::getContent();
        $requisite = Requisite::getContent();

        TranslatesCollection::translate($address, app()->getLocale());
        TranslatesCollection::translate($requisite, app()->getLocale());

        return view('contact.index', compact('address', 'requisite'));
    }
}