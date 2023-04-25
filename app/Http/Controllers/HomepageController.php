<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\LichChieu;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $config = Config::orderByDESC('id')->first();
        $phim_1 = Phim::where('id', $config->id_phim)->first();
        $phim_2 = Phim::where('id', $config->phim_2)->first();
        $phim_3 = Phim::where('id', $config->phim_3)->first();

        $list_phim = Phim::where('tinh_trang' , '>' , 0)->get();
        return view('Client.homepage', compact('config', 'phim_1', 'phim_2', 'phim_3' , 'list_phim'));

    }

    // public function test()
    // {
    //     Log::info("Oke, đã chạy!");
    //     // return view('client.kich_hoat_tai_khoan');
    // }

    public function chiTietPhim($slug)
    {
        $parts = explode('-', $slug);
        preg_match('/\d+$/', $slug, $matches);
        $id = $matches[0];
        $phim = Phim::where('id' , $id)->first();
        $lichChieu = LichChieu::where('id_phim', $id)
                              ->where('thoi_gian_ket_thuc', '>=', Carbon::now()->toDateTimeString())
                              ->get();

        return view('client.chi_tiet_phim' , compact('phim', 'lichChieu'));
    }

    public function viewLogin()
    {
        return view('client.login');
    }

    public function viewPhimDangChieu()
    {
        $list_phim = Phim::where('tinh_trang' , 1)->get();
        return view('client.phim' , compact('list_phim'));
    }

    public function viewPhimSapChieu()
    {
        $list_phim = Phim::where('tinh_trang' , 2)->get();
        return view('client.phim' , compact('list_phim'));
    }

    public function actionTimKiem(Request $request)
    {
        $search = $request->search;
        $list_phim = Phim::where('ten_phim' , 'like' , '%' . $search . '%')
                        //  ->orWhere('dao_dien' , 'like' , '%' . $search . '%')
                        //  ->orWhere('dien_vien' , 'like' , '%' . $search . '%')
                        //  ->orWhere('the_loai' , 'like' , '%' . $search . '%')
                         ->get();

        return view('client.phim' , compact('list_phim'));
    }
    public function viewInfor()
    {
        return view('client.infor');
    }

    public function getDataInfor()
    {
        $user = Auth::guard('customer')->user();
        $user = Customer::where('id', $user->id)
                ->select("ho_va_ten", "email", "so_dien_thoai", "dia_chi", "gioi_tinh", "ngay_sinh", "id")
                ->first();
        return response()->json([
            'status'    => true,
            'data' => $user,
        ]);
    }

    public function updateInfor(UpdateInforUserRequest $request)
    {
        $data = $request->all();
        $user = Customer::where('id', $request->id)->first();
        $user->update($data);

        return response()->json([
            'status'    => true,
        ]);
    }
     public function viewPass()
    {
        return view('client.password');
    }
    public function updatePass(UpdatePassUserRequest $request)
    {
        $user = Auth::guard('customer')->user();
        if($user){
            $check = Auth::guard('customer')->attempt([
                'email'         => $user->email,
                'password'      => $request->password_old
            ]);
            if($check){
                $data = Customer::find($user->id);
                $data->password = bcrypt($request->password);
                $data->save();
                return response()->json(['status' => 1]);
            }else{
                return response()->json(['status' => 2]);
            }
        }else{
            return response()->json(['status' => 0]);
        }
    }

    public function viewTran()
    {
        return view('client.history_tran');
    }
    public function getDataTran()
    {
        $user = Auth::guard('customer')->user();
        $data = Payment::where('user_id', $user->id)
                ->join("lich_chieus", "lich_chieus.id", "payments.id_lich_chieu")
                ->join("phims", "phims.id", "lich_chieus.id_phim")
                ->select("payments.*", "phims.ten_phim")
                ->orderBy("payments.id", "desc")
                ->get();
        return response()->json([
            'status'    => true,
            'data' => $data,
        ]);
    }

}
