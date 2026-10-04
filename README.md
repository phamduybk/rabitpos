# Rabit POS 5.3.1 — Phần mềm bán hàng chạy ngay trên máy tính của bạn

Rabit POS là phần mềm bán hàng miễn phí, chạy trên máy tính của chính cửa hàng.
Dữ liệu nằm trên máy bạn, không cần mạng internet để bán hàng.

Có sẵn cho 9 loại hình: **Tạp hóa, Quán ăn nhỏ, Nhà hàng, Giặt là, Điện tử,
Cho thuê đồ, Sửa chữa ô tô, Sửa chữa điện tử, Nhà nghỉ.** Mỗi loại hình có sẵn
hàng hóa mẫu phù hợp để bạn bán thử ngay.

Giao diện có **6 ngôn ngữ**: Tiếng Việt, English, 中文, ລາວ, ខ្មែរ, ไทย — chọn ngay
ở màn đầu tiên, ở trang đăng nhập hoặc trong **Cài đặt**.
Hỗ trợ **8 loại tiền**: VND, USD, EUR, CNY (nhân dân tệ), JPY (yên), LAK (kip Lào),
KHR (riel Campuchia), THB (baht Thái) — chọn khi nhập thông tin cửa hàng ở bước 3 dưới đây.

---

## Cài đặt trên Windows (khuyên dùng)

Không cần cài thêm gì. Bộ tải về đã có sẵn mọi thứ cần thiết.

1. Bấm nút xanh **Code → Download ZIP** ở đầu trang này.
   Hoặc vào mục **Releases** bên phải và tải bản mới nhất (hiện là `v5.3.1`).
2. Giải nén ra một thư mục cố định, ví dụ `D:\RabitPOS`.
   Không để trong thư mục Downloads hay trên Desktop để tránh lỡ tay xóa.
3. Bấm đúp file **`run_window.bat`**.
   Một cửa sổ màu đen hiện ra. **Giữ nguyên cửa sổ này** trong lúc bán hàng.
4. Mở trình duyệt Chrome hoặc Edge, gõ địa chỉ **http://localhost:8888**

> Nếu Windows hiện cảnh báo "Windows protected your PC", bấm **More info → Run anyway**.
> Nếu cổng 8888 đang bận, cửa sổ đen sẽ báo địa chỉ khác, ví dụ http://localhost:8889

## Lần đầu sử dụng

Lần đầu mở, phần mềm hướng dẫn bạn 3 bước. Góc trên màn hình có nút chọn ngôn ngữ
(6 ngôn ngữ, chọn trước khi bắt đầu):

1. **Chọn loại hình kinh doanh.** Phần mềm tự bật đúng tính năng và nạp hàng mẫu.
2. **Đặt mật khẩu.**
   - Tài khoản chủ cửa hàng tên là `root`, dùng để quản trị.
   - Tạo thêm một tài khoản quản lý để bán hàng hằng ngày.
3. **Nhập tên, số điện thoại, địa chỉ cửa hàng và chọn loại tiền.** Thông tin này in trên hóa đơn.
   Bạn có thể bấm "Để sau".

Xong là đăng nhập và bán hàng được ngay.

**Đang dùng bản 4.0 trở về trước (chạy bằng XAMPP)?**
1. Mở phpMyAdmin của XAMPP, chọn cơ sở dữ liệu của Rabit POS.
2. Bấm **Xuất** (Export), giữ định dạng SQL, rồi bấm **Thực hiện**. Bạn nhận được file `.sql`.
3. Ở màn đầu tiên của bản 5.x, kéo file `.sql` vào ô **"Đã có dữ liệu cũ?"**. Chọn loại hình, hoặc để "Tự nhận diện".

Phần mềm tự chuyển dữ liệu sang bản 5.x qua máy chủ Rabit POS, nên máy cần có internet.
Máy chủ xử lý xong sẽ xóa file ngay. Nếu không muốn gửi file đi, dùng trang
**https://rabitpos.com/chuyen-doi.html**. Trang này chuyển ngay trong trình duyệt và cho bạn file `.db` để tải lên.

**Đã dùng Rabit POS trên máy khác?** Ở màn đầu tiên, kéo thả file dữ liệu `.db` cũ
vào ô **"Đã có dữ liệu cũ?"**. Phần mềm tự nhận ra loại hình. Bạn đăng nhập bằng
tài khoản cũ, mọi hóa đơn, hàng hóa và khách hàng vẫn còn nguyên.
Ngôn ngữ của cửa hàng giữ như trong file cũ, trừ khi bạn đã bấm chọn ngôn ngữ khác ở màn đầu.

## Sử dụng hằng ngày

- Mở máy, bấm đúp `run_window.bat`, rồi mở http://localhost:8888
- Nếu cửa sổ đen bị tắt, phần mềm ngừng chạy. Chỉ cần bấm đúp lại `run_window.bat`.
- Bán hàng nhanh ở mục **Bán hàng (POS)**. Phím tắt:
  - **F2** để tìm hàng.
  - **F9** để thanh toán.
  - Phím **1–9** để chọn món bán chạy.
- Hàng mẫu chỉ để bán thử. Vào **Hàng hóa** để sửa hoặc xóa, rồi thêm hàng thật.
  Bạn cũng có thể nhập hàng loạt từ file Excel.

## Sao lưu & cập nhật dữ liệu (quan trọng)

Toàn bộ dữ liệu cửa hàng nằm trong 3 chỗ:
- Thư mục **`database`** — hóa đơn, hàng hóa, khách hàng, cấu hình.
- Thư mục **`uploads`** — ảnh hàng hóa, logo cửa hàng.
- File **`cloudflared\connector.json`** (nếu có) — đường link công khai đang dùng.

Mỗi tuần, hãy chép cả 3 mục này sang USB hoặc Google Drive.

**Khi cài lại máy hoặc nâng cấp bản mới**: tắt bản đang chạy, giải nén bản mới vào một
thư mục khác, rồi chép `database`, `uploads` và `cloudflared\connector.json` từ bản cũ
vào đúng chỗ trong thư mục mới. Chỉ chép `database` sẽ **mất ảnh hàng hóa đã tải lên và
mất đường link công khai** (phải đăng ký lại Cloudflare Tunnel).

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

## Docker

Dùng được trên Linux/macOS/Windows (Docker Desktop) hoặc NAS có Docker. Image chính thức:
**[hub.docker.com/r/phamduybk/rabitpos](https://hub.docker.com/r/phamduybk/rabitpos)** (tag `5.3.1` và `latest`).

```bash
docker run -d --name rabitpos -p 8888:8888 \
  -v rabitpos_data:/data \
  phamduybk/rabitpos:latest
```

Mở `http://localhost:8888`. Dữ liệu (`database`, `uploads`, `cloudflared`) nằm trong volume `/data`,
giữ nguyên khi cập nhật image lên bản mới.

## NAS Synology

Có gói cài sẵn (`.spk`) và hướng dẫn Container Manager tại
**[rabitpos.com/synology/](https://rabitpos.com/synology/)**. Mở bằng trình duyệt trên máy cùng
mạng để xem hướng dẫn từng bước và tải gói đúng phiên bản DSM của bạn.

## Gặp sự cố?

| Hiện tượng | Cách xử lý |
|---|---|
| Không mở được http://localhost:8888 | Kiểm tra cửa sổ đen còn mở không. Nếu đã tắt, chạy lại `run_window.bat`. |
| Quên mật khẩu | Liên hệ người cài đặt hoặc nhóm hỗ trợ. Không xóa thư mục `database`. |
| Link công khai không hiện | Kiểm tra kết nối internet, rồi chạy lại `run_window.bat`. |

Trang giới thiệu và hướng dẫn chi tiết: **https://rabitpos.com**
