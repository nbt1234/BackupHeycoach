<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\MyFocusgoalsModel;
use Auth;

class StepsCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $current_userid = Auth::guard('frontuser')->user()->id;    

        $last_focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();

        if($last_focused_goal){
           $goal_amount = str_replace(" ","",$last_focused_goal->each_month_goal); 
            $your_income = str_replace(" ","",$last_focused_goal->earn_after_tax_per_mnth);


            if($last_focused_goal->catwise_actual_spend){
                $catwise_actual_spend = $last_focused_goal->catwise_actual_spend;
                $unseri_actual_spend = unserialize($catwise_actual_spend); 

                $arr_actual_spend = array();
                foreach($unseri_actual_spend as $key => $unseri_act_spend){
                    $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
                    $arr_actual_spend[$key] = $repl_actual_spend;
                } 

                $actual_spend_sum = array_sum($arr_actual_spend);
                if(($actual_spend_sum + $goal_amount) > $your_income){
                    return $next($request);
                }else{
                    return redirect()->route('getstep6');
                }
            }else{
                // dd($last_focused_goal->current_step);
                    return redirect('/'.$last_focused_goal->current_step);
            }
            
        }else{
                return redirect()->route('getstep1');

        }
    }
}
