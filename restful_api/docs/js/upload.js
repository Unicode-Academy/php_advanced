const app = {
  serverApi: "http://127.0.0.1:8000/api/v1",
  loginForm: `<div class="w-50 mx-auto">
    <h1>Đăng nhập</h1>
    <form action="" class="login-form">
      <div class="mb-3">
        <label for="">Email</label>
        <input
          type="email"
          name="email"
          class="form-control"
          placeholder="Email..."
          required
        />
      </div>
      <div class="mb-3">
        <label for="">Mật khẩu</label>
        <input
          type="password"
          name="password"
          class="form-control"
          placeholder="Mật khẩu..."
          required
        />
      </div>
      <button class="btn btn-primary">Đăng nhập</button>
    </form>
  </div>`,
  accountForm: `<div class="w-50 mx-auto ">
    <h1>Tài khoản</h1>
    <p>Xin chào: <span class="profile-name"></span> <a href="#" class="logout">Đăng xuất</a></p>
    <form action="" class="account-form">
        <div class="mb-3">
        <label for="">Tên</label>
        <input
            type="text"
            name="name"
            class="form-control name"
            placeholder="Tên..."
        />
        </div>
        <div class="mb-3">
        <label for="">Email</label>
        <input
            type="text"
            name="email"
            class="form-control email"
            placeholder="Email..."
        />
        </div>
        <div class="mb-3">
        <label for="">Avatar</label>
        <input type="file" name="avatar" class="form-control" />
        <div class="avatar"></div>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
    </form>
    </div>`,
  notify: (message, type = "success") => {
    Toastify({
      text: message,
      duration: 3000,
      newWindow: true,
      close: true,
      gravity: "bottom", // `top` or `bottom`
      position: "right", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background:
          type === "success"
            ? `linear-gradient(to right, #00b09b, #96c93d)`
            : `linear-gradient(to right, #d1242f, #d1242f)`,
      },
      onClick: function () {}, // Callback after click
    }).showToast();
  },
  render: function (html) {
    root.innerHTML = html;
  },
  addEvent: function () {
    root.addEventListener("submit", (e) => {
      e.preventDefault();
      if (e.target.classList.contains("login-form")) {
        this.handleLogin(e.target);
      }

      if (e.target.classList.contains("account-form")) {
        this.handleUpdateAccount(e.target);
      }
    });
    root.addEventListener("click", (e) => {
      if (e.target.classList.contains("logout")) {
        e.preventDefault();
        this.handleLogout();
      }
    });
  },
  getNewAccessToken: async function () {
    try {
      const { refresh_token: refreshToken } = JSON.parse(
        localStorage.getItem("tokens")
      );
      if (refreshToken) {
        const response = await fetch(`${this.serverApi}/auth/refresh-token`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ refresh_token: refreshToken }),
        });
        if (!response.ok) {
          throw new Error("Refresh Token Invalid");
        }
        return response.json();
      }
    } catch (e) {
      return false;
    }
  },
  handleLogin: async function (form) {
    const dataLogin = Object.fromEntries([...new FormData(form)]);
    const response = await fetch(`${this.serverApi}/auth/login`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(dataLogin),
    });
    if (response.ok) {
      const { data: tokens } = await response.json();
      localStorage.setItem("tokens", JSON.stringify(tokens));
      this.start();
    } else {
      this.notify("Email hoặc mật khẩu không chính xác", "error");
    }
  },
  handleLogout: async function () {
    const { access_token: accessToken } = JSON.parse(
      localStorage.getItem("tokens")
    );
    const response = await fetch(`${this.serverApi}/auth/logout`, {
      method: "POST",
      headers: {
        Authorization: `Bearer ${accessToken}`,
      },
    });
    if (!response.ok) {
      alert("Đã có lỗi xảy ra. Vui lòng thử lại sau.");
      return;
    }
    localStorage.removeItem("tokens");
    this.start();
  },
  handleUpdateAccount: async function (form) {
    const dataForm = new FormData(form);
    const { access_token: accessToken } = JSON.parse(
      localStorage.getItem("tokens")
    );
    const response = await fetch(`${this.serverApi}/auth/profile`, {
      method: "POST",
      body: dataForm,
      headers: {
        Authorization: `Bearer ${accessToken}`,
      },
    });
    if (!response.ok) {
      this.notify("Không thể cập nhật. Vui lòng kiểm tra lại", "error");
    } else {
      this.notify("Cập nhật thành công");
      this.start();
    }
  },
  getProfile: async function () {
    if (localStorage.getItem("tokens")) {
      const { access_token: accessToken } = JSON.parse(
        localStorage.getItem("tokens")
      );
      const response = await fetch(`${this.serverApi}/auth/profile`, {
        method: "GET",
        headers: {
          Authorization: `Bearer ${accessToken}`,
        },
      });
      if (!response.ok) {
        //Gọi refresh token để cấp lại access mới
        const newToken = await this.getNewAccessToken();

        //Nếu refresh token không hợp lệ
        if (!newToken) {
          localStorage.removeItem("tokens");
          this.start();
          return;
        }

        localStorage.setItem("tokens", JSON.stringify(newToken.data));
        this.getProfile();
      }
      const {
        data: { name, email, avatar },
      } = await response.json();
      const nameEl = root.querySelector(".account-form .name");
      const profileNameEl = root.querySelector(".profile-name");
      const emailEl = root.querySelector(".account-form .email");
      nameEl.value = name;
      emailEl.value = email;
      profileNameEl.innerText = name;
      const avatarEl = root.querySelector(".account-form .avatar");
      if (avatar) {
        avatarEl.innerHTML = `<img src="${avatar}" style="width: 100px;"/>`;
      } else {
        avatarEl.innerHTML = `<img src="./images/no-avatar.jpg" style="width: 100px;"/>`;
      }
    }
  },
  start: function () {
    const isLogin = localStorage.getItem("tokens") ? true : false;
    let html;
    if (!isLogin) {
      html = this.loginForm;
    } else {
      html = this.accountForm;
    }
    this.render(html);
    this.addEvent();
    this.getProfile();
    // this.getNewAccessToken();
  },
};

const root = document.querySelector("#root");
app.start();

/*
Refresh Token

Access Token hết hạn --> Gọi API Refresh Token --> Access Token mới 
--> Lưu Access Token mới vào localStorage
--> Gọi lại api bị miss
*/
