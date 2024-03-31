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

## Resource

- Resource là dữ liệu mà chúng ta phải quản lý, có thể là: customers, products, posts, images, videos…

- Resource cũng sẽ xuất hiện trong cách viết EndPoint, nên nếu đặt tên cho resource một cách khoa học, thì endpoint cũng trở nên dễ hiểu và dễ tiếp cận hơn

| URL                                     | Resource |
| --------------------------------------- | -------- |
| https://api.unicode.vn/users            | users    |
| https://api.unicode.vn/users/1/accounts | accounts |
| https://api.unicode.vn/users/1/images   | images   |

### Sử dụng danh từ để đặt tên cho resource

| URL                            | Ý nghĩa                    |
| ------------------------------ | -------------------------- |
| https://api.unicode.vn/users   | Liệt kê tất cả users       |
| https://api.unicode.vn/users/1 | Chi tiết user có ID bằng 1 |
| https://api.unicode.vn/posts   | Liệt kê tất cả posts       |
| https://api.unicode.vn/posts/1 | Chi tiết post có ID bằng 1 |

### Sử dụng dấu / để thể hiện mối quan hệ phân cấp giữa các resources

| URL                                   | Ý nghĩa                                     |
| ------------------------------------- | ------------------------------------------- |
| https://api.unicode.vn/users          | Liệt kê tất cả users                        |
| https://api.unicode.vn/users/1        | Chi tiết user có ID bằng 1                  |
| https://api.unicode.vn/users/1/images | Liệt kê tất cả images của user có ID bằng 1 |

### Dùng dấu gạch ngang (-) để ngăn cách giữa các cụm từ

### Sử dụng chữ thường cho toàn bộ Endpoint

### Không sử dụng phần mở rộng để thiết kế Endpoint

### Sử dụng Query Params để lọc kết quả

| URL                                           | Đánh giá  |
| --------------------------------------------- | --------- |
| https://api.unicode.vn/users?country=vn       | Tốt       |
| https://api.unicode.vn/users/vn               | Không tốt |
| https://api.unicode.vn/users?page=1           | Tốt       |
| https://api.unicode.vn/users/pages/1          | Không tốt |
| https://api.unicode.vn/users/?order_by=latest | Tốt       |
| https://api.unicode.vn/users/order_by?latest  | Không tốt |

### Ngoại lệ

API đăng nhập

https://api.unicode.vn/auth/login

https://api.unicode.vn/auth/register

## Sử dụng HTTP Method để thể hiện CURD

Không nên thể hiện các thao tác với resource bằng việc chỉ ra trên URL, thay vào đó bạn hãy sử dụng các HTTP method tương ứng

![](./images/http-method.png)

## Định dạng dữ liệu trong RESTful API

- application/json
- application/xml
- application/x-wbe+xml
- application/x-www-form-urlencoded
- multipart/form-data

## Response Status Code

- 200: Trả về thành công cho những phương thức GET, PUT, PATCH hoặc
  DELETE
- 201: Trả về khi một Resource vừa được tạo thành công
- 204: Trả về khi Response không có dữ liệu
- 304: Client có thể sử dụng dữ liệu cache
- 400: Request không hợp lệ
- 401: Request cần có auth (Xác thực)
- 403: Bị từ chối không cho phép
- 404: Không tìm thấy resource từ URL
- 405: Phương thức không cho phép với user hiện tại
- 410: Resource không còn tồn tại, Version cũ đã không còn hỗ trợ
- 415: Không hỗ trợ kiểu Resource này (Ví dụ: Thiếu Content-Type hoặc Content-Type bị sai)
- 422: Dữ liệu không được xác thực
- 429: Request bị từ chối do bị giới hạn

## Sự khác nhau giữa 400 và 422

### 400

- Lỗi do client gửi yêu cầu không hợp lệ.
- Lỗi có thể do cú pháp sai, thiếu thông tin bắt buộc hoặc dữ liệu không hợp lệ.

Ví dụ:

- Thiếu tham số trong URL.
- Định dạng JSON không hợp lệ.
- Giá trị không hợp lệ cho một trường.

### 422

- Lỗi do client gửi yêu cầu hợp lệ về cú pháp nhưng không thể xử lý được.
- Lỗi thường xảy ra khi dữ liệu trong yêu cầu không đáp ứng các quy tắc nghiệp vụ của API.

Ví dụ:

- Gửi yêu cầu tạo tài khoản với mật khẩu quá ngắn.
- Gửi yêu cầu thanh toán với số tiền âm.
- Gửi giá trị cho một trường không được phép.

Lưu ý:

- Mã 422 được giới thiệu trong HTTP/1.1.
- Một số API có thể sử dụng mã 400 thay cho 422.

## Response Body và API Version

### Response Body

Cần thống nhất Response body trong các Endpoint

```json
{
  "status": 200,
  "message": "Success",
  "data": [
    {
      "id": 1,
      "name": "User 1",
      "email": "user1@gmail.com",
      "created_at": "2024-03-23 09:00:00"
    },
    {
      "id": 2,
      "name": "User 2",
      "email": "user2@gmail.com",
      "created_at": "2024-03-23 09:00:00"
    },
    {
      "id": 3,
      "name": "User 3",
      "email": "user3@gmail.com",
      "created_at": "2024-03-23 09:00:00"
    }
  ],
  "errors": {}
}
```

```json
{
  "status": 200,
  "message": "Success",
  "data": {
    "id": 1,
    "name": "User 1",
    "email": "user1@gmail.com",
    "created_at": "2024-03-23 09:00:00"
  },
  "errors": {}
}
```

```json
{
  "status": 400,
  "message": "Error",
  "errors": {
    "name": "Name is required"
  }
}
```

### API Version

- Khi làm việc với API cần phải có phiên bản để không làm ảnh hưởng tới các hệ thống cũ
- Có nhiều cách để tạo version cho API

* Sử dụng URL
* Sử dụng Header

## Rate Limit

Kỹ thuật giới hạn số lần request trong 1 đơn vị thời gian nhất định

Ví dụ:

- Mỗi người dùng chúng ta chỉ cho phép gửi 100request/s. Nếu vượt quá thì sẽ trả về response lỗi.
- Mỗi người dùng chỉ cho phép nhập sai thẻ credit 3 lần trong 1 ngày
- Mỗi địa chỉ IP chỉ có thể tạo được 2 account trong 1 ngày.

Tác dụng của Rate Limit

- Hạn chế tấn công DOS (Denial of Service) đến hệ thống
- Hạn chế brute force password trong hệ thống (quyét kiểu vét cạn)
- Hạn chế Brute force thông tin thẻ credit card (quyét kiểu vét cạn)
- Bảo mật: Không cho phép nhập sai password quá nhiều lần
- Doanh thu: Với mỗi plan sẽ có rate limit khác nhau. Nếu muốn dùng nhiều hơn thì cần mua lên plan đắt tiền hơn.

Cách triển khai Rate Limit

- Rate Limit theo cái gì?

* IP --> Thường áp dụng cho các API Public
* User --> Các API Private (Xác thực Email và Password)
* API Key --> API Private (Xác thực bằng API Key)

- Lưu trữ số lượng Request ở đâu?

* Database
* Bộ nhớ đệm trên Server: APC, Redis, In-Memory,...
* File

- Xây dựng logic

* Xác định số lượng Request
* Đơn vị thời gian: phút, giờ, ngày,...

Ví dụ: Theo địa chỉ IP, 60 requests / phút

Khi có Request, thực hiện các thao tác sau

- Lấy địa chỉ Ip
- Lấy số lượng request cũ với địa chỉ IP vừa lấy được, nếu chưa có trong kho lưu trữ --> Khởi tạo giá trị 0 và thời gian gửi request đầu tiên
- Tăng số lượng request thêm 1
- Cập nhật vào kho lưu trữ

Trong middleware kiểm tra

- Lấy được số lượng request của địa chỉ IP đang gửi Request
- Nếu vượt quá giá trị cho phép --> Kiểm tra thời gian hiện tại --> So sánh với thời gian của request đầu tiên

* Nếu thời gian hiện tại < thời gian quy định (1 phút) --> Block
* Nếu thời gian hiện tại > thời gian quy định (1 phút) --> Reset số lượng request về 1 và cập nhật lại thời gian

Xây dựng Database

Table rate_limit

- id
- ip_address
- request_number
- start_time
- created_at
- updated_at

Table request_log

- id
- ip_address
- created_at
- updated_at

## Authentication - Authorization

### Authentication

Authentication là về việc xác thực thông tin đăng nhập của bạn như Tên người dùng / ID người dùng và mật khẩu để xác minh danh tính của bạn

Authentication thường được thực hiện bởi tên người dùng và mật khẩu, và đôi khi kết hợp với các yếu tố xác thực, trong đó đề cập đến các cách khác nhau để được xác thực.

## Authoriztion

Authorization xảy ra sau khi hệ thống của bạn được authentication (xác thực) thành công, cuối cùng cho phép bạn toàn quyền truy cập các tài nguyên như thông tin, file, cơ sở dữ liệu, quỹ, địa điểm, hầu hết mọi thứ.

Nói một cách đơn giản, authorization xác định khả năng của bạn để truy cập hệ thống và ở mức độ nào. Khi danh tính của bạn được hệ thống xác minh sau khi xác thực thành công, bạn sẽ được phép truy cập tài nguyên của hệ thống.

| **Authentication**                                                                                                                                                                                  | **Authorization**                                                                                                                                       |
| --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Authentication xác nhận danh tính của bạn để cấp quyền truy cập vào hệ thống                                                                                                                        | Authorization xác định xem bạn có được phép truy cập tài nguyên không                                                                                   |
| Đây là quá trình xác nhận thông tin đăng nhập để có quyền truy cập của người dùng.                                                                                                                  | Đó là quá trình xác minh xem có cho phép truy cập hay không.                                                                                            |
| Nó quyết định liệu người dùng có phải là những gì anh ta tuyên bố hay không.                                                                                                                        | Nó xác định những gì người dùng có thể và không thể truy cập.                                                                                           |
| Authentication thường yêu cầu tên người dùng và mật khẩu.                                                                                                                                           | Các yếu tố xác thực cần thiết để authorization có thể khác nhau, tùy thuộc vào mức độ bảo mật.                                                          |
| Authentication là bước đầu tiên của authorization vì vậy luôn luôn đến trước.                                                                                                                       | Authorization được thực hiện sau khi authentication thành công.                                                                                         |
| Ví dụ, sinh viên của một trường đại học cụ thể được yêu cầu tự xác thực trước khi truy cập vào liên kết sinh viên của trang web chính thức của trường đại học. Điều này được gọi là authentication. | Ví dụ, authorization xác định chính xác thông tin nào sinh viên được phép truy cập trên trang web của trường đại học sau khi authentication thành công. |

## Cookie-based Authentication - Token Based Authentication

![](./images/autentication-type.avif)

**1. Cookie-based Authentication**

- Trạng thái người dùng lưu ở phía Server (Session lưu ở Server)
- Gặp vấn đề khi số lượng người dùng quá lớn và sử dụng tại một thời điểm
- Gặp vấn đề khi ứng dụng đa thiết bị (Bởi vì cookie chỉ chia sẻ trong cùng domain hoặc các sub-domain)
- Dễ bị đánh cắp

**2. Token-based Authentication**

- Trạng thái người dung lưu trong Token và lưu ở phía Client
- Dễ dàng mở rộng vì Token lưu ở phía Client
- Hỗ trợ tốt đa thiết bị vì Token được thêm vào mỗi Request Header
- Kích thước Token lớn hơn rất nhiều so với Session id
- Khi lưu thông tin vào Token tránh đưa các thông tin nhạy cảm để tránh các cuộc tấn công XSS

## JSON Web Token (JWT)

### Khái niệm

JWT (JSON Web Token) là một tiêu chuẩn mã nguồn mở (RFC 7519) dùng để truyền tải thông tin an toàn, gọn nhẹ và khép kín giữa các bên dưới định dạng JSON.

Thông tin được chia sẻ trong JWT được xác thực và tin cậy thông qua chữ ký số (Digital signature). Các bên sẽ sử dụng mật mã khoá đối xứng (cùng với HMAC) hoặc dùng mật mã khoá công khai (cùng public và private key) để thực hiện ký số (signed).

### Cấu tạo của JWT

JWT gồm 3 phần chính, và phần tách nhau bằng một dấu chấm (.):

- Header
- Payload
- Signature

Ví dụ:

```
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
```

![](./images/jwt.webp)

**Header**

Header thông thường sẽ bao gồm 2 thành phần, gồm : Kiểu token, mà với trường hợp này luôn luôn là JWT, và thuật toán mã hoá được sử dụng, ví dụ như HMAC hoặc RSA.

```json
{
  "alg": "HS256",
  "typ": "JWT"
}
```

Sau đó, đoạn này sẽ được encoding (base64Encode) và trở thành chuỗi đầu tiên trong 3 chuỗi JWT.

**Payload**

Payload trong JWT chứa các claims.

Claims là tập hợp các thông tin đại diện cho một thực thể (object) (ví dụ : user_id) và một số thông tin đi kèm. Claims sẽ có dạng Key - Value. Do đó, chúng ta có thể hiểu rằng, claims ám chỉ việc yêu cầu truy xuất tài nguyên cho object tương ứng.

Có 3 kiểu claims, bao gồm registered, public, and private claims

_Registered Claims_

Registered Claims là các thành phần được xác định trước của claims. Thành phần này mặc dù không bắt buộc, nhưng là thành phần nên có để cung cấp một số chức năng và thông tin hữu ích.

Một số registered claims bao gồm :

- iss (issuer): Tổ chức, đơn vị cung cấp, phát hành JWT.
- sub (subject): Chủ thể của JWT, xác định rằng đây là người sở hữu hoặc có quyền truy cập các resource (tài nguyên).
- aud (audience): Được hiểu là người nhận thông tin, và có thể xác thực tính hợp lệ của JWT.
- exp (expiration time): Thời hạn của JWT, vượt quá thời gian này, JWT được coi là không hợp lệ

_Public Claims_

Public claims là các thành phần được xác định bởi người sử dụng JWT, được sử dụng rộng rãi trong JWT

Một số public claims điển hình :

name, given_name, family_name, middle_name: Thông tin tên nói chung của user
email: Thông tin email của user.
locale : Địa chỉ của user.
profile, picture : Thông tin của trang web gửi đến.

_Private Claims_

Các bên sử dụng JWT có thể sẽ cần sử dụng đến claims không phải là Registered Claims, cũng không được định nghĩa trước như Public Claims

Đây là phần thông tin mà các bên tự thoả thuận với nhau, không có tài liệu hay tiêu chuẩn nào dành cho private claims

**Signature**

Signature là phần cuối cùng của JWT, có chức năng xác thực danh tính người gửi

```json
HMACSHA256(
  base64UrlEncode(header) + "." +
  base64UrlEncode(payload),
  secret)
```

Cả bên gửi và bên nhận JWT đều sẽ xử dụng hàm này để xác định phần signature, nếu thông tin này của cả 2 bên khác nhau, JWT này được coi là không hợp lệ.

Lưu ý: Chỉ có người có secret key mới có thể sign được một signature phù hợp. Do đó, danh tính của bên gửi được đảm bảo nhờ có signature.

### Lý do nên sử dụng JWT

- Authentication (Xác thực): JWT được sử dụng để xác thực người dùng trước khi họ truy cập đến tài nguyên trên server.
- Authorization (Uỷ quyền): Khi người dùng đăng nhập thành công, application có thể truy cập vào các tài nguyên thay mặt người dùng đó. Các ứng dụng đăng nhập một lần (Single Sign-On SSO) sử dụng JWT thường xuyên vì tính nhỏ gọn và dễ dàng triển khai trên nhiều domain.
- Trao đổi thông tin an toàn: JWT được coi là một cách trao đổi thông tin an toàn vì thông tin đã được signed trước khi gửi đi.

### Ưu điểm của JWT

- Gọn nhẹ: JWT nhỏ gọn, chi phí truyền tải thấp giúp tăng hiệu suốt của các ứng dụng.
- Bảo mật: JWT sử dụng các mật mã khoá để tiến hành xác thực người danh tính người dùng. Ngoài ra, cấu trúc của JWT cho phép chống giả mạo nên thông tin được đảm bảo an toan trong quá trình trao đổi.
- Phổ thông: JWT được sử dụng dựa trên JSON, là một dạng dữ liệu phổ biến, có thể sử dụng ở hầu hết các ngôn ngữ lập trình. Ngoài ra, triển khai JWT tương đối dễ dàng và tích hợp được với nhiều thiết bị, vì JWT đã tương đối phổ biến.

### Nhược điểm của JWT

- Kích thước: Mặc dù trong tài liệu không ghi cụ thể giới hạn, nhưng do được truyền trên HTTP Header, vì thế, JWT có giới hạn tương đương với HTTP Header (khoảng 8KB).
- Rủi ro bảo mật: Khi sử dụng JWT không đúng cách, ví dụ như không kiểm tra tính hợp lệ của signature, không kiểm tra expire time, kẻ tấn công có thể lợi dụng sơ hở để truy cập vào các thông tin trái phép.

Ngoài ra, việc để thời gian hết hạn của JWT quá dài cũng có thể tạo ra kẽ hở tương tự.

## Access Token và Refresh Token

1. Access Token

- Dùng để truy cập tài nguyên trên Server
- Thời gian sống thấp, thường là 1 giờ

2. Refresh Token

- Dùng để cấp lại Access Token mới khi hết hạn
- Thời gian sống dài, thường là 7 ngày
- Không dùng để truy cập tài nguyên trên Server
- Refresh lưu trên Server
