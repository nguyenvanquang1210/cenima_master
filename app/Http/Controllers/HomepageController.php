<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\LichChieu;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

}
