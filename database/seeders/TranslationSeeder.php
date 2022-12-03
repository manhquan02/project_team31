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
            ['lang' => 'vn','lang_in' => 'Contacts','lang_key' => 'contacts','lang_value' => 'Liên hệ'],
            ['lang' => 'vn','lang_in' => 'Setting','lang_key' => 'setting','lang_value' => 'Cài đặt'],
            ['lang' => 'vn','lang_in' => 'Configuration','lang_key' => 'configuration','lang_value' => 'Cấu hình'],
            ['lang' => 'vn','lang_in' => 'General configuration','lang_key' => 'general_configuration','lang_value' => 'Cấu hình chung'],
            ['lang' => 'vn','lang_in' => 'Language','lang_key' => 'language','lang_value' => 'Ngôn ngữ'],
            ['lang' => 'vn','lang_in' => 'Language management','lang_key' => 'language_management','lang_value' => 'Quản lý ngôn ngữ'],
            ['lang' => 'vn','lang_in' => 'Value','lang_key' => 'value','lang_value' => 'Giá trị'],
            ['lang' => 'vn','lang_in' => 'Save','lang_key' => 'save','lang_value' => 'Lưu'],
            ['lang' => 'vn','lang_in' => 'View','lang_key' => 'view','lang_value' => 'Xem'],
            ['lang' => 'vn','lang_in' => 'No records found','lang_key' => 'no_records_found','lang_value' => 'Không tìm thấy bản ghi'],
            ['lang' => 'vn','lang_in' => 'Delete','lang_key' => 'delete','lang_value' => 'Xóa'],
            ['lang' => 'vn','lang_in' => 'Translate successfully','lang_key' => 'translate_successfully','lang_value' => 'Dịch thành công'],
            ['lang' => 'vn','lang_in' => 'Hi','lang_key' => 'hi','lang_value' => 'Chào'],
            ['lang' => 'vn','lang_in' => 'Total user','lang_key' => 'total_user','lang_value' => 'Tổng số người dùng'],
            ['lang' => 'vn','lang_in' => 'Total revenue','lang_key' => 'total_revenue','lang_value' => 'Tổng doanh thu'],
            ['lang' => 'vn','lang_in' => 'Statistics data of the year','lang_key' => 'statistics_data_of_the_year','lang_value' => 'Số liệu thống kê trong năm'],
            ['lang' => 'vn','lang_in' => 'Select year','lang_key' => 'select_year','lang_value' => 'Chọn năm'],
            ['lang' => 'vn','lang_in' => 'Export','lang_key' => 'export','lang_value' => 'Xuất'],
            ['lang' => 'vn','lang_in' => 'Coupon management','lang_key' => 'coupon_management','lang_value' => 'Quản lý phiếu giảm giá'],
            ['lang' => 'vn','lang_in' => 'Shift manager','lang_key' => 'shift_manager','lang_value' => 'Quản lý ca tập'],
            ['lang' => 'vn','lang_in' => 'Start time','lang_key' => 'start_time','lang_value' => 'Thời gian bắt đầu'],
            ['lang' => 'vn','lang_in' => 'End time','lang_key' => 'end_time','lang_value' => 'Thời gian kết thúc'],
            ['lang' => 'vn','lang_in' => 'Shift name','lang_key' => 'shift_name','lang_value' => 'Tên ca tập'],
            ['lang' => 'vn','lang_in' => 'Subject management','lang_key' => 'subject_management','lang_value' => 'Quản lý môn tập'],
            ['lang' => 'vn','lang_in' => 'Add new subject','lang_key' => 'add_new_subject','lang_value' => 'Thêm mới môn tập'],
            ['lang' => 'vn','lang_in' => 'Image','lang_key' => 'image','lang_value' => 'Hình ảnh'],
            ['lang' => 'vn','lang_in' => 'Post management','lang_key' => 'post_management','lang_value' => 'Quản lý bài viết'],
            ['lang' => 'vn','lang_in' => 'From','lang_key' => 'from','lang_value' => 'Từ'],
            ['lang' => 'vn','lang_in' => 'To','lang_key' => 'to','lang_value' => 'Đến'],
            ['lang' => 'vn','lang_in' => 'Title','lang_key' => 'title','lang_value' => 'Tiêu đề'],
            ['lang' => 'vn','lang_in' => 'Posted by','lang_key' => 'posted_by','lang_value' => 'Người đăng'],
            ['lang' => 'vn','lang_in' => 'Post date','lang_key' => 'post_date','lang_value' => 'Ngày đăng bài'],
            ['lang' => 'vn','lang_in' => 'Add new post','lang_key' => 'add_new_post','lang_value' => 'Thêm mới bài viết'],
            ['lang' => 'vn','lang_in' => 'Name','lang_key' => 'name','lang_value' => 'Tên'],
            ['lang' => 'vn','lang_in' => 'Phone number','lang_key' => 'phone_number','lang_value' => 'Số điện thoại'],
            ['lang' => 'vn','lang_in' => 'Contact management','lang_key' => 'contact_management','lang_value' => 'Quản lý liên hệ'],
            ['lang' => 'vn','lang_in' => 'Update contact status successfully','lang_key' => 'update_contact_status_successfully','lang_value' => 'Cập nhật trạng thái liên hệ thành công'],
            ['lang' => 'vn','lang_in' => 'Add new coupon successfully','lang_key' => 'add_new_coupon_successfully','lang_value' => 'Thêm phiếu giảm giá mới thành công'],
            ['lang' => 'vn','lang_in' => 'Update coupon successfully','lang_key' => 'update_coupon_successfully','lang_value' => 'Cập nhật phiếu giảm giá thành công'],
            ['lang' => 'vn','lang_in' => 'Delete translation successfully','lang_key' => 'delete translation successfully','lang_value' => 'Xóa bản dịch thành công'],
            ['lang' => 'vn','lang_in' => 'Update language successfully','lang_key' => 'update_language_successfully','lang_value' => 'Cập nhật ngôn ngữ thành công'],
            ['lang' => 'vn','lang_in' => 'Update package status successfully','lang_key' => 'update_package_status_successfully','lang_value' => 'Cập nhật trạng thái gói tập thành công'],
            ['lang' => 'vn','lang_in' => 'Update package successfully','lang_key' => 'update_package_successfully','lang_value' => 'Cập nhật gói tập thành công'],
            ['lang' => 'vn','lang_in' => 'Add new package successfully','lang_key' => 'add_new_package_successfully','lang_value' => 'Thêm mới gói tập thành công'],
            ['lang' => 'vn','lang_in' => 'Update post status successfully','lang_key' => 'update_post_status_successfully','lang_value' => 'Cập nhật trạng thái bài viết thành công'],
            ['lang' => 'vn','lang_in' => 'Delete post successfully','lang_key' => 'delete_post_successfully','lang_value' => 'Xóa bài viết thành công'],
            ['lang' => 'vn','lang_in' => 'Add new post successfully','lang_key' => 'add_new_post_successfully','lang_value' => 'Thêm mới bài viết thành công'],
            ['lang' => 'vn','lang_in' => 'Update post successfully','lang_key' => 'update_post_successfully','lang_value' => 'Cập nhật bài viết thành công'],
            ['lang' => 'vn','lang_in' => 'Update subject successfully','lang_key' => 'update_subject_successfully','lang_value' => 'Cập nhật môn tập thành công'],
            ['lang' => 'vn','lang_in' => 'Delete subject successfully','lang_key' => 'delete_subject_successfully','lang_value' => 'Xóa môn tập thành công'],
            ['lang' => 'vn','lang_in' => 'Add new subject successfully','lang_key' => 'add_new_subject_successfully','lang_value' => 'Thêm mới môn tập thành công'],
            ['lang' => 'vn','lang_in' => 'Shift has existed','lang_key' => 'shift_has_existed','lang_value' => 'Ca tập đã tồn tại'],
            ['lang' => 'vn','lang_in' => 'Add new shift successfully','lang_key' => 'add_new_shift_successfully','lang_value' => 'Thêm mới ca tập thành công'],
            ['lang' => 'vn','lang_in' => 'Update shift successfully','lang_key' => 'update_shift_successfully','lang_value' => 'Cập nhật ca tập thành công'],
            ['lang' => 'vn','lang_in' => 'Delete shift successfully','lang_key' => 'delete_shift_successfully','lang_value' => 'Xóa ca tập thành công'],
            ['lang' => 'vn','lang_in' => 'Contact content','lang_key' => 'content_content','lang_value' => 'Nội dung liên hệ'],
            ['lang' => 'vn','lang_in' => 'Change language successfully','lang_key' => 'change_language_successfully','lang_value' => 'Thay đổi ngôn ngữ thành công'],
            ['lang' => 'vn','lang_in' => 'Quantity','lang_key' => 'quantity','lang_value' => 'Số lượng'],
            ['lang' => 'vn','lang_in' => 'Package','lang_key' => 'package','lang_value' => 'Gói tập'],
            ['lang' => 'vn','lang_in' => 'Code','lang_key' => 'code','lang_value' => 'Mã code'],
            ['lang' => 'vn','lang_in' => '% Sale','lang_key' => '_sale','lang_value' => '% Giảm giá'],
            ['lang' => 'vn','lang_in' => 'Add new coupon','lang_key' => 'add_new_coupon','lang_value' => 'Thêm mới phiếu giảm giá'],
            ['lang' => 'vn','lang_in' => 'Enter coupon title','lang_key' => 'enter_coupon_title','lang_value' => 'Nhập tiêu đề phiếu giảm giá'],
            ['lang' => 'vn','lang_in' => 'Start date','lang_key' => 'start_date','lang_value' => 'Ngày bắt đầu'],
            ['lang' => 'vn','lang_in' => 'End date','lang_key' => 'end_date','lang_value' => 'Ngày kết thúc'],
            ['lang' => 'vn','lang_in' => 'Show','lang_key' => 'show','lang_value' => 'Hiển thị'],
            ['lang' => 'vn','lang_in' => 'Hidden','lang_key' => 'hidden','lang_value' => 'Ẩn'],
            ['lang' => 'vn','lang_in' => 'No response yet','lang_key' => 'no_response_yet','lang_value' => 'Chưa phản hồi'],
            ['lang' => 'vn','lang_in' => 'Responded','lang_key' => 'responded','lang_value' => 'Đã phản hồi'],
            ['lang' => 'vn','lang_in' => 'Add new shift','lang_key' => 'add_new_shift','lang_value' => 'Thêm mới ca tập'],
            ['lang' => 'vn','lang_in' => 'Shift management','lang_key' => 'shift_management','lang_value' => 'Quản lý ca tập'],
            ['lang' => 'vn','lang_in' => 'Total order','lang_key' => 'total_order','lang_value' => 'Tổng số đơn hàng'],
            ['lang' => 'vn','lang_in' => 'Total subject','lang_key' => 'total_subject','lang_value' => 'Tổng số môn tập'],
            ['lang' => 'vn','lang_in' => 'Total package','lang_key' => 'total_package','lang_value' => 'Tổng số gói tập'],
            ['lang' => 'vn','lang_in' => 'Payroll','lang_key' => 'payroll','lang_value' => 'Bảng lương'],

            
            
        ];
        foreach ($translations as $item) {
            Translation::create($item);
        }
    }
}
