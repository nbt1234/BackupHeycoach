<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


function create_unique_slug($string = '', $table = '', $field = '', $key = null, $value = null){
        
        $slug = Str::of($string)->slug('-');
        $slug = strtolower($slug);
        
        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key) {
            $params["$key !="] = $value;
        }

        while (DB::table($table)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            }
            $params[$field] = $slug;
        }
        
        return $slug;
}


function GetUserinfo($user_id = '',$field = ''){
    
    //$getuserinfo = DB::table('user_models')->select($field)->where('id', $user_id)->get();
    $getuserinfo = DB::table('user_models')->where('id',$user_id)->first();
    if($field == 'username'){
        // $username = $getuserinfo->first_name.' '.$getuserinfo->last_name;
        $username = $getuserinfo->first_name;
        //dd($getuserinfo->first_name);
        $data = $username;
    }

    if($field == 'email'){
        $email = $getuserinfo->email;        
        $data = $email;
    }

    if($field == 'first_name'){
        $first_name = $getuserinfo->first_name;        
        $data = $first_name;
    }

    if($field == 'last_name'){
        $last_name = $getuserinfo->last_name;        
        $data = $last_name;
    }


    if($field == 'phone'){
        $phone = $getuserinfo->phone;        
        $data = $phone;
    }

    
    return $data;        
}
?>