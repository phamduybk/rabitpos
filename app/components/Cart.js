$(document).ready(function () {
    // ... existing code ...

    $('#verify-btn').on('click', function () {
        $('#verification-overlay').show(); // Hiện popup nhập mã xác thực
        $('#main-content').addClass('blur'); // Làm mờ nội dung chính
    });

    $('#confirm-verification').on('click', function () {
        let code = $('#verification-code').val().trim();
        if (code === '1234') { // Kiểm tra mã xác thực (thay đổi theo yêu cầu)
            $('#verification-overlay').hide(); // Ẩn popup xác thực
            $('#main-content').removeClass('blur'); // Bỏ mờ nội dung chính
            $('#order-button').show(); // Hiện nút Đặt hàng
            localStorage.setItem('isVerified', 'true'); // Lưu trạng thái xác thực
        } else {
            alert('Mã xác thực không chính xác!'); // Thông báo lỗi
        }
    });

    $('#cancel-verification').on('click', function () {
        $('#verification-overlay').hide(); // Ẩn popup xác thực
        $('#main-content').removeClass('blur'); // Bỏ mờ nội dung chính
    });

    // Kiểm tra trạng thái xác thực khi tải trang
    if (localStorage.getItem('isVerified') === 'true') {
        $('#order-button').show(); // Hiện nút Đặt hàng nếu đã xác thực
    }
});