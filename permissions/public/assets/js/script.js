const usersSelectEl = $("#users-modal select");
if (usersSelectEl.length) {
  usersSelectEl.on("change", function () {
    const userId = $(this).val();
    if (userId.length === 1) {
      //Gọi tới Server để trả role
      fetch(`/permissions/data/roles/${userId[0]}`)
        .then((res) => res.json())
        .then(({ roles }) => {
          $('#users-modal input[type="checkbox"].role-item').each(function () {
            const value = +$(this).val();
            if (roles.includes(value)) {
              $(this).attr("checked", true);
            } else {
              $(this).attr("checked", false);
            }
          });
        });
      //Gọi tới Server để trả về permissions
      fetch(`/permissions/data/permissions/${userId[0]}`)
        .then((res) => res.json())
        .then(({ permissions }) => {
          $('#users-modal input[type="checkbox"].permission-item').each(
            function () {
              const value = $(this).val();

              if (permissions.includes(value)) {
                $(this).attr("checked", true);
              } else {
                $(this).attr("checked", false);
              }
            }
          );
        });
    } else {
      $('#users-modal input[type="checkbox"]').attr("checked", false);
    }
  });
}

const userModalEl = document.getElementById("users-modal");
userModalEl.addEventListener("hidden.bs.modal", () => {
  $('#users-modal input[type="checkbox"]').attr("checked", false);
  usersSelectEl.val("").trigger("change");
});
