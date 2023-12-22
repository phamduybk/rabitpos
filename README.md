# rabitpos
1. Cài Xampp hoặc tool nào có có php> 7,3 và mysql

2. Tạo cơ sở dữ liệu schema là localhost

3. Import cơ sở dữ liệu trong thư mục database/localyhost.sql

3. Copy giải nén code trong thư mục xampp là httpdoc (tên thư mục có thể là pos)

4. Nếu bạn đổi tên hoặc tài khoản mysql có pass vào application/config/database.php để đổi lại
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'localhost',

PS: nếu bạn cài xampp mà cứ next next thì để nguyên


5. Vào trình duyệt chọn localhost/pos/

6. Login với tài khoản 
admin:123456
saler:123456

link demo
https://demo.rabitpos.com/
