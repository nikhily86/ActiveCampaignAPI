<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Data;

class activeController extends Controller
{
    // function add(Request $request)
    // {

    //     $data = new Data;
    //     $data->fname = $request->fname;
    //     $data->lname = $request->lname;
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;
    //     $result = $data->save();
    //     if($result)
    //     {
    //       return ["Result" => "Success"];
    //     }
    //     else
    //     {
    //       return ["Result" => "Operation Failed"];
    //     }
    // }

    // function update(Request $request, $id)
    // {

    //    $data = Data::find($id);
    //    if(is_null($data)){
    //     return response(["Result" => "Operation Failed"],404);
    //    }
    //    else{
    //     $data->update($request->all());
    //     return response()->json($data,200);
    //    }
    
    // }

    // function delete(Request $request, $id)
    // {
    //     $data = Data::find($id);
    //     if(is_null($data)){
    //       return response(["Result" => "Operation Failed"],404);
    //     }
    //     else {
    //         $data->delete();
    //         return response()->json(null ,204);
    //     }
    // }

    // function getdata()
    // {
    //   return Data::all();
    // }

    // function for Getting All data From Api

    function getData()
    {
      $response = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_view',
        'Content-Type' => 'application/json'
      ])->get("https://vkaps13097.api-us1.com/api/3/contacts");

      $status = $response->status(); // Get Status Code

      $results = $response->json();  // Get Response

      return view ('display', ['result'=>$results]);
    }

    // function for Adding Form Data to API

    function addData(Request $request)
    {
      $data = $request->all();

       $arr = array(
        'email'=>$data['email'],
        'firstName'=>$data['firstname'],
        'lastName'=>$data['lastname'],
        'phone'=>$data['phone']
       );

       $result = ["contact" => $arr];

      $response = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_add',
        'Content-Type' => 'application/json'
      ])->post('https://vkaps13097.api-us1.com/api/3/contacts', $result);
      $status = $response->status();

      if($status >= 200 && $status <300)
      {
        $response = Http::withHeaders([
          'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
          'api_action'   => 'contact_view',
          'Content-Type' => 'application/json'
        ])->get("https://vkaps13097.api-us1.com/api/3/contacts");
  
        $status = $response->status(); // Get Status Code
  
        $results = $response->json();  // Get Response
  
        return view ('display', ['result'=>$results]);
      }
      if($status >= 400)
      {
        print_r("Failed or Duplicate Entry");
      }
    }

    // Function for Going to Update Page with relevant Data

    function update($id)
    {
      // print_r($id); die;
      $response = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_view',
        'Content-Type' => 'application/json'
      ])->get("https://vkaps13097.api-us1.com/api/3/contacts/$id");
      $results = $response->json();
      // print_r($results['contact']['email']); die;
      $res = $results['contact']; 
      $cid = $id;
      // print_r($res); die;
      return view ('update', ['result'=> $res],['id' => $cid]);
    }

    // Function for Update Existing Data

    function updateData(Request $request)
    {
      $data = $request->all();
      $id = $data['id'];
       $arr = array(
         'id'=>$data['id'],
        'email'=>$data['email'],
        'firstName'=>$data['firstname'],
        'lastName'=>$data['lastname'],
        'phone'=>$data['phone']
       );

       $result = ["contact" => $arr];

      $response = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_edit',
        'Content-Type' => 'application/json'
      ])->put("https://vkaps13097.api-us1.com/api/3/contacts/$id", $result);

      $status = $response->status();

      if($status >= 200 && $status <300)
      {
        $response = Http::withHeaders([
          'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
          'api_action'   => 'contact_view',
          'Content-Type' => 'application/json'
        ])->get("https://vkaps13097.api-us1.com/api/3/contacts");
  
        $status = $response->status(); // Get Status Code
  
        $results = $response->json();  // Get Response
  
        return view ('display', ['result'=>$results]);
      }
      if($status >= 400)
      {
        print_r("Failed ");
      }
    }

    // Function for Deleteing Data

    function deleteData($id)
    {
      $response1 = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_delete',
        'Content-Type' => 'application/json'
      ])->delete("https://vkaps13097.api-us1.com/api/3/contacts/$id");

      $response = Http::withHeaders([
        'Api-Token' => '8e84dd1743fe4397954da16e76cb64acaaa4d368f5d9ffbc9c190ae6b0e6fd668a64e7fd',
        'api_action'   => 'contact_view',
        'Content-Type' => 'application/json'
      ])->get("https://vkaps13097.api-us1.com/api/3/contacts");

      $results = $response->json();

      return view ('display', ['result'=>$results]);
    }
}
