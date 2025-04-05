
<!DOCTYPE html> 
<html lang = "en"> 
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device - width, initial-scale=1.0">
        <title> ĐĂNG NHẬP ADMIN </title>
        <style type="text/css">
             body{
                background: #f2f2f2;
            }
            .wrapper-login {
                width: 50%;
                margin: 0 auto;
            }
            .wrapper-login table {
                border-collapse: collapse;
                width: 60%;
                background-color: #ffffff;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng */
                border-radius: 8px; /* Bo góc bảng */
                overflow: hidden;

            }
            .table-login tr td{
                padding: 5px;
                border: 1px solid #ccc;
                
            }

            .table-login tr:nth-child(even) {
                background-color: #f2f2f2; /* Màu nền xen kẽ */
            }
            .table-login td button{
                background-color:rgb(57, 68, 190); /* Màu nền */
                color: white; /* Màu chữ */
                padding: 5px 10px; /* Khoảng cách */
                border: none; /* Xóa viền */
                border-radius: 5px; /* Bo góc */
                cursor: pointer; /* Hiển thị con trỏ khi hover */
                font-size: 1rem;
            }

            .table-login td button:hover {
                background-color:rgb(49, 182, 218); /* Đổi màu khi hover */
            }
        </style>
    </head>
    <body>
        <div class="wrapper-login">
            <form action="" autocomplete="off" method="POST">
            <table border = "1" class = "table-login" style = "text-align: center;border-collapse: collapse;">
                <tr>
                    <td colspan="2"><h3>Đăng nhập Admin</h3></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type = "text" name = "username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type = "password" name = "password"></td>
                </tr>
                <tr>
                    
                    <td colspan="2"><button type="submit" name="dangnhap">Đăng nhập</button></td>
                </tr>
            </table>
            </form>
        </div>
        <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>
