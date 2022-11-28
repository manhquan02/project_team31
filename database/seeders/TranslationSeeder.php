<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $translations = [
            ['lang' => 'vn','lang_in' => 'Package name','lang_key' => 'package_name','lang_value' => 'Tên gói tập'],
            ['lang' => 'vn','lang_in' => 'Subject name','lang_key' => 'subject_name','lang_value' => 'Tên môn tập'],
            ['lang' => 'vn','lang_in' => 'Avatar','lang_key' => 'avatar','lang_value' => 'Ảnh đại diện'],
            ['lang' => 'vn','lang_in' => 'Listed price','lang_key' => 'listed_price','lang_value' => 'Giá niêm yiết'],
            ['lang' => 'vn','lang_in' => 'Promotion price','lang_key' => 'promotion_price','lang_value' => 'Giá khuyến mãi'],
            ['lang' => 'vn','lang_in' => 'Status','lang_key' => 'status','lang_value' => 'Trạng thái'],
            ['lang' => 'vn','lang_in' => 'Actions','lang_key' => 'actions','lang_value' => 'Thao tác'],
            ['lang' => 'vn','lang_in' => 'Package management','lang_key' => 'package_management','lang_value' => 'Quản lý gói tập'],
            ['lang' => 'vn','lang_in' => 'List','lang_key' => 'list','lang_value' => 'Danh sách'],
            ['lang' => 'vn','lang_in' => 'Update','lang_key' => 'update','lang_value' => 'Cập nhật'],
            ['lang' => 'vn','lang_in' => 'Add new package','lang_key' => 'add_new_package','lang_value' => 'Thêm mới gói tập'],
            ['lang' => 'vn','lang_in' => 'Choose a subject','lang_key' => 'choose_a_subject','lang_value' => 'Chọn môn tập'],
            ['lang' => 'vn','lang_in' => 'Choose a status','lang_key' => 'choose_a_status','lang_value' => 'Chọn trạng thái'],
            ['lang' => 'vn','lang_in' => 'Search','lang_key' => 'search','lang_value' => 'Tìm kiếm'],
            ['lang' => 'vn','lang_in' => 'Active','lang_key' => 'active','lang_value' => 'Hoạt động'],
            ['lang' => 'vn','lang_in' => 'Lock','lang_key' => 'lock','lang_value' => 'Khóa'],
            ['lang' => 'vn','lang_in' => 'Dashboard','lang_key' => 'dashboard','lang_value' => 'Bảng điều khiển'],
            ['lang' => 'vn','lang_in' => 'User','lang_key' => 'user','lang_value' => 'Người dùng'],
            ['lang' => 'vn','lang_in' => 'Member account','lang_key' => 'member_account','lang_value' => 'Tài khoản người dùng'],
            ['lang' => 'vn','lang_in' => 'Staffs','lang_key' => 'staffs','lang_value' => 'Nhân viên'],
            ['lang' => 'vn','lang_in' => 'Manage','lang_key' => 'manage','lang_value' => 'Quản lý'],
            ['lang' => 'vn','lang_in' => 'Coach','lang_key' => 'coach','lang_value' => 'Huấn luyện viên'],
            ['lang' => 'vn','lang_in' => 'Events','lang_key' => 'events','lang_value' => 'Sự kiện'],
            ['lang' => 'vn','lang_in' => 'Coupons','lang_key' => 'coupons','lang_value' => 'Phiếu giảm giá'],
            ['lang' => 'vn','lang_in' => 'Keyword','lang_key' => 'keyword','lang_value' => 'Từ khóa'],
            ['lang' => 'vn','lang_in' => 'Handle','lang_key' => 'handle','lang_value' => 'Xử lý'],
            ['lang' => 'vn','lang_in' => 'Order','lang_key' => 'order','lang_value' => 'Đơn hàng'],
            ['lang' => 'vn','lang_in' => 'Schedule','lang_key' => 'schedule','lang_value' => 'Lịch trình'],
            ['lang' => 'vn','lang_in' => 'Shifts','lang_key' => 'shifts','lang_value' => 'Ca tập'],
            ['lang' => 'vn','lang_in' => 'Schedule coach','lang_key' => 'schedule_coach','lang_value' => 'Lịch trình huấn luyện viên'],
            ['lang' => 'vn','lang_in' => 'Services','lang_key' => 'services','lang_value' => 'Dịch vụ'],
            ['lang' => 'vn','lang_in' => 'Subjects','lang_key' => 'subjects','lang_value' => 'Môn tập'],
            ['lang' => 'vn','lang_in' => 'Packages','lang_key' => 'packages','lang_value' => 'Gói tập'],
            ['lang' => 'vn','lang_in' => 'Interactive','lang_key' => 'Interactive','lang_value' => 'Tương tác'],
            ['lang' => 'vn','lang_in' => 'Posts','lang_key' => 'posts','lang_value' => 'Bài viết'],
            ['lang' => 'vn','lang_in' => 'Contacts','lang_key' => 'contacts','lang_value' => 'Phản hồi'],
            ['lang' => 'vn','lang_in' => 'Setting','lang_key' => 'setting','lang_value' => 'Cài đặt'],
            ['lang' => 'vn','lang_in' => 'Configuration','lang_key' => 'configuration','lang_value' => 'Cấu hình'],
            ['lang' => 'vn','lang_in' => 'General configuration','lang_key' => 'general_configuration','lang_value' => 'Cấu hình chung'],
            ['lang' => 'vn','lang_in' => 'Languages','lang_key' => 'languages','lang_value' => 'Ngôn ngữ'],
            ['lang' => 'vn','lang_in' => 'Language management','lang_key' => 'language_management','lang_value' => 'Quản lý ngôn ngữ'],
            ['lang' => 'vn','lang_in' => 'Value','lang_key' => 'value','lang_value' => 'Giá trị'],
            ['lang' => 'vn','lang_in' => 'Save','lang_key' => 'save','lang_value' => 'Lưu'],
            ['lang' => 'vn','lang_in' => 'View','lang_key' => 'view','lang_value' => 'Xem'],
            ['lang' => 'vn','lang_in' => 'No records found','lang_key' => 'no_records_found','lang_value' => 'Không tìm thấy bản ghi'],

        ];
        foreach ($translations as $item) {
            Translation::create($item);
        }
    }
}
