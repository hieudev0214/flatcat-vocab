# FlatCat Vocab — bản PHP + MySQL

Bản này lưu từ vựng trong cơ sở dữ liệu MySQL thật trên máy chủ (không dùng `localStorage` của trình duyệt nữa). Gồm 3 file chính:

- `index.php` — giao diện (giống hệt bản GitHub Pages, chỉ đổi phần lấy/lưu dữ liệu)
- `api.php` — API xử lý thêm/xóa/khôi phục từ, giao tiếp với MySQL
- `config.php` — nơi khai báo thông tin kết nối MySQL
- `data/seed-words.json` — 143 từ vựng mẫu, tự động nạp vào DB lần chạy đầu tiên (khi bảng `words` đang rỗng)

Lưu ý: GitHub Pages **không** chạy được PHP, nên bản này cần một hosting hỗ trợ PHP + MySQL — dưới đây là hướng dẫn deploy lên **InfinityFree** (miễn phí, không cần thẻ tín dụng).

## Các bước deploy lên InfinityFree

1. **Đăng ký tài khoản**: vào https://infinityfree.com → Sign Up, xác nhận email.
2. **Tạo website mới** trong bảng điều khiển (Client Area → hosting account mới), đặt tên miền phụ miễn phí dạng `flatcatvocab.infinityfreeapp.com` (hoặc domain riêng nếu có).
3. **Tạo MySQL Database**: vào vPanel (Control Panel) của site vừa tạo → mục **MySQL Databases** → tạo database mới. InfinityFree sẽ cho bạn 4 thông tin:
   - Hostname MySQL (dạng `sqlxxx.infinityfree.com`)
   - Database name (dạng `epiz_xxxxxxx_flatcat`)
   - Username (thường trùng database name)
   - Password (bạn tự đặt lúc tạo)
4. **Điền thông tin đó vào `config.php`** (sửa 4 dòng `define('DB_HOST', ...)` v.v.).
5. **Upload file lên host** qua FTP:
   - Lấy thông tin FTP trong vPanel (mục **FTP Accounts**): host, username, password.
   - Dùng phần mềm FTP (vd. FileZilla) kết nối vào, vào thư mục `htdocs`.
   - Upload toàn bộ nội dung thư mục `php/` (đã sửa `config.php`) vào thẳng trong `htdocs` — tức là `index.php`, `api.php`, `config.php`, và thư mục `data/` phải nằm ngay trong `htdocs`.
6. **Truy cập trang**: mở `http://<tên-miền-của-bạn>/index.php` (hoặc `http://<tên-miền-của-bạn>/` nếu host tự nhận `index.php` là trang chủ). Lần đầu tải trang, hệ thống sẽ tự tạo 2 bảng (`words`, `trash`) và nạp sẵn 143 từ vựng mẫu.

## Test thử ở máy local trước khi upload (tuỳ chọn)

Nếu máy đã cài XAMPP:

1. Bật MySQL trong XAMPP Control Panel.
2. Sửa `config.php`: `DB_HOST` → `127.0.0.1`, `DB_USER` → `root`, `DB_PASS` → `''` (rỗng), `DB_NAME` → tên bất kỳ (vd. `flatcat_test`) — nhớ tạo database đó trước bằng phpMyAdmin.
3. Chạy `php -S localhost:8000` trong thư mục `php/`, mở `http://localhost:8000/index.php`.
4. Nhớ đổi lại `config.php` về thông tin InfinityFree trước khi upload thật.
