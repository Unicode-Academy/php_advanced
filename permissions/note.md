# Tài nguyên trên website / ứng dụng

- Tài nguyên / Nội dung công khai ==> Ai cũng có thể truy cập được
- Tài nguyên / Nội dung được bảo vệ

* Đăng nhập là xem được
* Đăng nhập và phải có quyền

# Tổng quan về phân quyền

- Phân quyền (Permission) là quá trình xác định và quản lý quyền hạn của người dùng trong việc truy cập và thực hiện các tác vụ cụ thể trong một hệ thống, ứng dụng hoặc tài nguyên. Quyền hạn xác định những chức năng người dùng có thể thực hiện.

- Phân quyền người dùng là một phần quan trọng trong việc quản lý và bảo vệ thông tin, dữ liệu, và tài khoản của người dùng trong các ứng dụng website.

- Phân quyền sẽ đảm bảo rằng chỉ những người dùng có quyền hạn cụ thể mới có thể truy cập và tương tác với thông tin và tài nguyên quan trọng. Điều này ngăn chặn truy cập trái phép và bảo vệ dữ liệu quan trọng. Phân quyền sẽ giới hạn quyền hạn của người dùng, ngăn chặn người dùng thực hiện các hành động không mong muốn xảy ra, gây ảnh hưởng cho website của chúng ta.

Ví dụ:

Khi người dùng bình thường truy cập vào website Unicode thì họ chỉ có một số quyền như đăng ký khóa học, xem khóa học, xem bài viết,…

Họ sẽ không có quyền chỉnh sửa, thêm, xóa khóa học. Những chức năng này chỉ người quản trị mới được phép sử dụng. Khi đó những thông tin, dữ liệu và các tài nguyên khóa học sẽ được bảo mật, chỉ người quản trị mới được phép quản lý các tài nguyên này.

# Lợi ích của phân quyền

Phân quyền người dùng sẽ đem lại rất nhiều lợi ích trong việc quản lý hệ thống và ứng dụng:

- Bảo mật dữ liệu: Phân quyền đảm bảo rằng chỉ những người dùng được ủy quyền mới có thể truy cập và thực hiện các tác vụ trên dữ liệu và tài nguyên quan trọng. Điều này ngăn chặn truy cập trái phép và bảo vệ thông tin quan trọng khỏi sự xâm phạm.

- Tránh xung đột và lỗi: Phân quyền giới hạn quyền hạn người dùng, giúp tránh xung đột và lỗi. Người dùng chỉ có thể thực hiện các tác vụ mà họ được phép, ngăn chặn hành vi không mong muốn và giảm nguy cơ lỗi cho hệ thống.

- Quản lý chức năng hiệu quả: Quản trị viên có khả năng quản lý quyền hạn và chức năng của từng người dùng hoặc nhóm người dùng một cách dễ dàng. Điều này giúp quản lý hệ thống hiệu quả hơn.

- Quản lý nhiều vai trò khác nhau: Hệ thống có thể hỗ trợ nhiều vai trò và người dùng khác nhau. Ví dụ: Một website hỗ trợ cả người dùng bình thường, nhân viên, quản trị viên với các quyền hạn khác nhau.

- Bảo vệ quyền riêng tư cá nhân: Phân quyền bảo vệ quyền riêng tư của người dùng. Chỉ có những người được ủy quyền mới có thể truy cập thông tin cá nhân của người khác.

Ví dụ: Khi sử dụng Facebook chúng ta đặt đối tượng được phép xem thông tin cá nhân là bạn bè thì chỉ bạn bè mới xem được thông tin cá nhân của chúng ta, những người dùng không phải bạn bè sẽ không có quyền hạn xem thông tin.

# Các mô hình phân quyền phổ biến

- Mô hình phân quyền dựa trên vai trò (Role-Based Access Control - RBAC): Trong mô hình này, người dùng được gán vào các vai trò (roles) cụ thể, và các quyền hạn được gán cho từng vai trò. Ví dụ: Một hệ thống có các vai trò Quản trị viên, Nhân viên, Khách hàng. Mỗi vai trò sẽ có các quyền hạn khác nhau. Người dùng sẽ được gán vào một trong các vai trò này.

- Mô hình phân quyền dựa trên thuộc tính (Attribute-Based Access Control - ABAC): Mô hình sẽ cấp quyền truy cập dựa vào danh sách các quyền kết hợp với các thuộc tính.

- Mô hình điều khiển truy cập bắt buộc (Mandatory Access Control - MAC): Là mô hình kiểm soát quyền truy cập dựa trên các quy tắc và nguyên tắc bảo mật cụ thể, thường được áp dụng trong các môi trường có mức độ bảo mật cao như quân sự, chính phủ, lĩnh vực y tế và tài chính. Khi áp dụng mô hình này, người dùng chỉ được cấp quyền truy cập vào các tài nguyên mà họ cần để thực hiện công việc cụ thể, không được phép thực hiện các công việc khác.

- Mô hình điều khiển truy cập tùy quyền (Discretionary Access Control - DAC): Là mô hình kiểm soát quyền truy cập dựa trên quyền kiểm soát của chủ sở hữu hoặc người dùng cuối. Trong mô hình DAC, người dùng hoặc chủ sở hữu của tài nguyên có quyền quản lý và quyết định ai được cấp quyền truy cập vào tài nguyên của họ. Tức là người dùng có thể chuyển quyền của mình sang một người dùng khác.

# Các bước triển khai phân quyền

- Xác định rõ đối tượng sẽ phân quyền: Admin, User, Partner,....
- Chọn mô hình phân quyền (Ý tưởng phân quyền)
- Xây dựng Database
- Triển khai code hoặc sử dụng thư viện: Thư viện nào? Ngôn ngữ gì?...

* Thiết lập quyền --> CRUD Database
* Phân quyền
  --> Kiểm tra quyền hạn của user với route, thuộc tính,...
  --> Ẩn những menu, chức năng mà user không có quyền

Xác thực ==> Phân quyền

# Xây dựng Database phân quyền

- Quản lý người dùng

* Danh sách
* Thêm
* Sửa
* Xóa
* Phân quyền

- Quản lý sản phẩm

* Danh sách
* Thêm
* Sửa
* Xóa
* Export

- Quản lý bài viết

* Danh sách
* Thêm
* Sửa
* Xóa
