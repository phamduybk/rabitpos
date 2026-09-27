# Rabit POS 5.0 — Phần mềm bán hàng chạy ngay trên máy tính của bạn

Rabit POS là phần mềm bán hàng miễn phí, chạy trên máy tính của chính cửa hàng.
Dữ liệu nằm trên máy bạn, không cần mạng internet để bán hàng.

Có sẵn cho 9 loại hình: **Tạp hóa, Quán ăn nhỏ, Nhà hàng, Giặt là, Điện tử,
Cho thuê đồ, Sửa chữa ô tô, Sửa chữa điện tử, Nhà nghỉ.** Mỗi loại hình có sẵn
hàng hóa mẫu phù hợp để bạn bán thử ngay.

---

## Cài đặt trên Windows (khuyên dùng)

Không cần cài thêm gì. Bộ tải về đã có sẵn mọi thứ cần thiết.

1. Bấm nút xanh **Code → Download ZIP** ở đầu trang này.
   Hoặc vào mục **Releases** bên phải và tải bản `v5.0`.
2. Giải nén ra một thư mục cố định, ví dụ `D:\RabitPOS`.
   Không để trong thư mục Downloads hay trên Desktop để tránh lỡ tay xóa.
3. Bấm đúp file **`run_window.bat`**.
   Một cửa sổ màu đen hiện ra. **Giữ nguyên cửa sổ này** trong lúc bán hàng.
4. Mở trình duyệt Chrome hoặc Edge, gõ địa chỉ **http://localhost:8888**

> Nếu Windows hiện cảnh báo "Windows protected your PC", bấm **More info → Run anyway**.
> Nếu cổng 8888 đang bận, cửa sổ đen sẽ báo địa chỉ khác, ví dụ http://localhost:8889

## Lần đầu sử dụng

Lần đầu mở, phần mềm hướng dẫn bạn 3 bước:

1. **Chọn loại hình kinh doanh.** Phần mềm tự bật đúng tính năng và nạp hàng mẫu.
2. **Đặt mật khẩu.**
   - Tài khoản chủ cửa hàng tên là `root`, dùng để quản trị.
   - Tạo thêm một tài khoản quản lý để bán hàng hằng ngày.
3. **Nhập tên, số điện thoại và địa chỉ cửa hàng.** Thông tin này in trên hóa đơn.
   Bạn có thể bấm "Để sau".

Xong là đăng nhập và bán hàng được ngay.

**Đang dùng bản 4.0 trở về trước (chạy bằng XAMPP)?** Vào
**https://rabitpos.com/chuyen-doi.html** để chuyển dữ liệu cũ sang bản 5.0.
Trang này xử lý ngay trên máy bạn, không tải dữ liệu lên mạng.
Kết quả là một file `.db`. Bạn nhập file đó ở màn đầu tiên như hướng dẫn dưới đây.

**Đã dùng Rabit POS trên máy khác?** Ở màn đầu tiên, kéo thả file dữ liệu `.db` cũ
vào ô **"Đã có dữ liệu cũ?"**. Phần mềm tự nhận ra loại hình. Bạn đăng nhập bằng
tài khoản cũ, mọi hóa đơn, hàng hóa và khách hàng vẫn còn nguyên.

## Sử dụng hằng ngày

- Mở máy, bấm đúp `run_window.bat`, rồi mở http://localhost:8888
- Nếu cửa sổ đen bị tắt, phần mềm ngừng chạy. Chỉ cần bấm đúp lại `run_window.bat`.
- Bán hàng nhanh ở mục **Bán hàng (POS)**. Phím tắt:
  - **F2** để tìm hàng.
  - **F9** để thanh toán.
  - Phím **1–9** để chọn món bán chạy.
- Hàng mẫu chỉ để bán thử. Vào **Hàng hóa** để sửa hoặc xóa, rồi thêm hàng thật.
  Bạn cũng có thể nhập hàng loạt từ file Excel.

## Sao lưu dữ liệu (quan trọng)

Toàn bộ dữ liệu nằm trong thư mục **`database`**.
Mỗi tuần, hãy chép thư mục này sang USB hoặc Google Drive.
Khi cài lại máy, chép thư mục `database` vào bản mới là dùng tiếp.

## Bán từ xa và dùng App điện thoại

Khi máy có internet, phần mềm tự tạo một đường link công khai.
Đường link này hiện trong cửa sổ đen và trên màn hình chính.
Nhập link này vào **App Rabit POS** trên điện thoại để bán hàng và xem báo cáo từ xa.
Nếu không có internet, bạn vẫn bán hàng bình thường trên máy tính.

## macOS và Linux

Cần cài PHP trước. Trên macOS, chạy lệnh `brew install php`.
Sau đó mở Terminal trong thư mục phần mềm và chạy:

```bash
bash run_mac.sh
```

Rồi mở http://localhost:8888

## Gặp sự cố?

| Hiện tượng | Cách xử lý |
|---|---|
| Không mở được http://localhost:8888 | Kiểm tra cửa sổ đen còn mở không. Nếu đã tắt, chạy lại `run_window.bat`. |
| Quên mật khẩu | Liên hệ người cài đặt hoặc nhóm hỗ trợ. Không xóa thư mục `database`. |
| Link công khai không hiện | Kiểm tra kết nối internet, rồi chạy lại `run_window.bat`. |

Trang giới thiệu và hướng dẫn chi tiết: **https://rabitpos.com**
