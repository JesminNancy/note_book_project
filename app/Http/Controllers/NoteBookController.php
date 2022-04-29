<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\NoteBookModel;

class NoteBookController extends Controller
{
    function onInsert(Request $request){
    
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $username= $decoded_array['username'];
        $one= $request->input('one');
       $two= $request->input('two');
        $name= $request->input('name');
        $email= $request->input('email');
        $address= $request->input('address');
        
        $result= NoteBookModel::insert([
            'username'=>$username,
            'phone_number_one'=>$one,
            'phone_number_two'=>$two,
            'name'=>$name,
            'email'=>$email,
            'address'=>$address
            ]);
            
        if($result==true){
            return "Save Success";
        } else{
            return "Data Not Save";
        }   
         
    }
    function onSelect(Request $request){
    
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $username= $decoded_array['username'];
        
        $result= NoteBookModel::where('username',$username)->get();
        return $result;
    }
    function onUpdate(Request $request){
        $id= $request->input('id');
        $name= $request->input('name'); 
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $username= $decoded_array['username']; 
        
        $result= NoteBookModel::where('id',$id)->update(['name'=>$name]);
        
        if($result==true){
            return "Update Success";
        }else{
            return "Update Failed! Try Again";
        }
    }
    function onDelete(Request $request){
        $id= $request->input('id'); 
        $token= $request->input('access_token');
        $key= env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $username= $decoded_array['username']; 
        
        $result= NoteBookModel::where('id',$id)->delete();
        
        if($result==true){
            return "Delete Success";
        }else{
            return "Delete Failed! Try Again";
        }
    }
}
