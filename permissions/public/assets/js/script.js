const usersSelectEl = $("#users-modal select");
if (usersSelectEl.length) {
  usersSelectEl.on("change", function () {
    const userId = $(this).val();
    if (userId.length === 1) {
      //Gọi tới Server để trả role
      fetch(`/permissions/data/roles/${userId[0]}`)
        .then((res) => res.json())
        .then(({ roles }) => {
          $('input[type="checkbox"]').each(function () {
            const value = +$(this).val();
            if (roles.includes(value)) {
              $(this).attr("checked", true);
            } else {
              $(this).attr("checked", false);
            }
          });
        });
    } else {
      $('input[type="checkbox"]').attr("checked", false);
    }
  });
}
