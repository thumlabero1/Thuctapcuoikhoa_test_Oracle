<?php


namespace App\Http\Services;


class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }

    public function uploadGoogleAvatar($avatarUrl, $email)
{
    try {
        // Tạo folder năm/tháng/ngày trong thư mục storage/app/public/avatars/
        $folderName = 'avatars/' . date('Y/m/d');
        Storage::makeDirectory($folderName);

        // Tạo tên file mới bằng email và đuôi file
        $extension = pathinfo($avatarUrl, PATHINFO_EXTENSION);
        $fileName = $email . '.' . $extension;

        // Lưu file từ URL vào thư mục mới tạo
        $fileContents = file_get_contents($avatarUrl);
        $savePath = $folderName . '/' . $fileName;
        Storage::put($savePath, $fileContents);

        // Trả về đường dẫn đầy đủ của file mới lưu
        return 'storage/' . $savePath;
    } catch (\Throwable $th) {
        // Xử lý lỗi ở đây (nếu có)
        return null;
    }
}


}
