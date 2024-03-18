# Xây dựng RESTFul API

## Khái niệm API

- API là viết tắt của Giao diện lập trình ứng dụng (tiếng Anh: Application Programming Interface)

- Tập hợp các định nghĩa và giao thức cho phép các phần mềm khác nhau giao tiếp với nhau

- API hoạt động như một cầu nối giữa hai ứng dụng, cho phép chúng trao đổi dữ liệu và thực hiện các chức năng.

Ví dụ:

- Frontend với Back-end
- Back-end với Back-end
- Phần mềm với hệ điều hành
- API trong các framework / thư viện

## Khái niệm RESTFul API

- REST (Representational State Transfer) là một dạng chuyển đổi cấu trúc dữ liệu, một kiểu kiến trúc để viết API. Nó sử dụng phương thức HTTP đơn giản để tạo cho giao tiếp giữa các máy. Vì vậy, thay vì sử dụng một URL cho việc xử lý một số thông tin người dùng, REST gửi một yêu cầu HTTP như GET, POST, DELETE, vv đến một URL để xử lý dữ liệu.

- RESTful API là một tiêu chuẩn dùng trong việc thiết kế API cho các ứng dụng web (thiết kế Web services) để tiện cho việc quản lý các resource

- RESTful API chú trọng vào tài nguyên hệ thống (tệp văn bản, ảnh, âm thanh, video, hoặc dữ liệu động…), bao gồm các trạng thái tài nguyên được định dạng và được truyền tải qua HTTP.

## HTTP METHOD và Endpoint

### HTTP METHOD

- GET: Được sử dụng để lấy thông tin từ sever theo URL đã cung
  cấp.
- POST: Gửi thông tin tới sever thông qua HTTP Request (Chỉ dùng
  để tạo mới)
- HEAD: Giống với GET nhưng response trả về không có body, chỉ
  có header
- PUT: Ghi đè tất cả thông tin của đối tượng với những gì được gửi
  lên (Nếu dữ liệu nào không được gửi lên sẽ bị xoá)
- PATCH: Ghi đè các thông tin được thay đổi của đối tượng
- DELETE: Xóa tài nguyên trên server

### Endpoint

URL + METHOD

```shell
GET /users
GET /users/{id}
POST /users
PUT /users/{id}
PATCH /users/{id}
DELETE /users/{id}
```

Cấu trúc dữ liệu để viết Endpoint

- JSON
- XML
