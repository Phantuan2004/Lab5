<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Gennes;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ListMovies = Movies::paginate(10);
        return view('list', compact('ListMovies'));
    }

    // Chi tiết sản phẩm
    public function detail($id)
    {
        $detail = Movies::with('gennes')->findOrFail($id);
        return view('detail', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gennes = Gennes::all();
        $creates = DB::table('gennes');
        return view('add', compact('gennes', 'creates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('poster');
        // Kiểm tra xem nếu ko có ảnh thì rỗng
        $data['poster'] = "";

        // Kiểm tra xem có ảnh được tải lên không
        if ($request->hasFile('poster')) {
            // Lưu vào thư mục public/images
            $path_image = $request->file('poster')
                ->store('poster', 'public');
            // Cập nhật trường image trong mảng $data với đường dẫn tệp ảnh đã lưu
            $data['poster'] = $path_image;
        }

        // Tạo dữ liệu trong database
        Movies::create($data);

        // Trả về thông báo thành công
        return redirect()->back()->with('message', "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movies $id)
    {
        // Hiển thị form chỉnh sửa
        $genes = Gennes::all();
        return view('edit', compact('id', 'genes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movies $id)
    {
        $data = $request->except('poster');
        $old_poster = $id->poster;

        // Nếu có ảnh mới tải lên
        if ($request->hasFile('poster')) {
            // Lưu ảnh mới
            $path_poster = $request->file('poster')->store('poster', 'public');
            $data['poster'] = $path_poster;

            // Xóa ảnh cũ nếu tồn tại
            if ($old_poster && file_exists(storage_path('app/public/' . $old_poster))) {
                unlink(storage_path('app/public/' . $old_poster));
            }
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $data['poster'] = $old_poster;
        }

        // Cập nhật dữ liệu vào database
        $id->update($data);

        // Trả về thông báo sửa thành công
        return redirect()->back()->with('message', 'Sửa thành công');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $id)
    {
        // Xóa theo id
        $id->delete();
        // Trả về danh sách đã xóa sản phẩm
        return redirect()->route('admin.index')->with('message', 'Xóa thành công');
    }

    // Tìm kiếm sản phẩm
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm các bộ phim theo tiêu đề
        $movies = Movies::where('title', 'LIKE', "%{$query}%")->get();

        // Trả về view với kết quả tìm kiếm
        return view('search', compact('movies'));
    }
}
