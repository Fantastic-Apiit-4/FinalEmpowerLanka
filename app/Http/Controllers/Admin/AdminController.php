<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function dashboard(){

        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at',date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

       /* $users = User::get()->groupBy(function($user) {
            return Carbon::parse($user->created_at)->format('m');
        });*/

        

        

        $labels = [];
        $data =[];
        $colors = ['#800080'];

        for ($i=1; $i <= 12; $i++){
            $month = date('F', mktime(0,0,0,$i,1));
            $count =0;

            foreach($users as $user){
                if($user->month == $i){
                    $count = $user->count;
                    break;
                }
            }
            array_push($labels, $month);
            array_push($data, $count);

        }

        $datasets = [
            [
                'label' => "Users",
                'data' => $data,
                'backgroundColor' => $colors
            ]
            ];

            

        $totalAllUsers = User::count();
        $totalinvestors = User::where('role','investor')->count();
        $totalentrepreneurs = User::where('role','entrepreneur')->count();
        $totaldistributors = User::where('role','distributor')->count();
        $totalcustomers = User::where('role','customer')->count();

        $thisMonth = Carbon::now()->format('m');

        $thisMonthUsers = User::whereMonth('created_at', $thisMonth)->count();


        return view('admin.dashboard', compact('totalAllUsers','totalinvestors','totalentrepreneurs','totaldistributors','totalcustomers','thisMonth','thisMonthUsers','datasets','labels'));

        
    }
    public function general(){
        return view('admin.general.genral');
    }

    public function index()
    {   
        $posts = Post::all();
        /*$user = auth()->user();
        $name = 'blank';
        $dataprint = Post::orderBy('id', 'DESC')->get();
        
            
            $data = $dataprint;['pd'=>$data,*/
        $name = 'General';
        
       
        return view('admin.general.genral',['pp'=>$name],compact('posts'));
    }
    
    /**
     * To Update Status of User
     * @param Integer $post_id
     * @param Integer $status_code
     * @return Success Response.
     */

     public function updateStatus($post_id, $status_code){

        try{
         $update_post = Post::whereId($post_id)->update([ 'isban' => $status_code
         ]);

         if($update_post){
             return redirect('admin/general')->with('success', 'User status updated');
         }
         return redirect('admin/general')->with('error','Fail to update');
        
     }catch (\Throwble $th){
         throw $th;

     }
 }

}
