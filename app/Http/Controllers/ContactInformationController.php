<?php

namespace App\Http\Controllers;

class ContactInformationController extends Controller
{
  public function getContact($teamId)
  {
    $contact = getRequest("http://sistema.mfl.com.mx/api/v2/TeamsPageInformation?teamId=$teamId");

    return view('contact')->with([
      'page' => 'contactPage',
      'games' => $contact->latestScores,
      'contact' => $contact->data,
    ]);
  }
}
