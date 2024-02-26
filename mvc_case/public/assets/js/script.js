const checkAll = document.querySelector(".check-all");
if (checkAll) {
  let ids = [];
  const idEl = document.querySelector(".ids");
  const deleteSelectionBtn = document.querySelector(".delete-selection");
  const renderDeleteBtn = (count) => {
    deleteSelectionBtn.children[0].innerText = count;
    if (count > 0) {
      deleteSelectionBtn.classList.remove("disabled");
    } else {
      deleteSelectionBtn.classList.add("disabled");
    }
  };
  const checkItems = document.querySelectorAll(".check-item");
  let count = 0;
  checkAll.addEventListener("change", (e) => {
    const status = e.target.checked;
    checkItems.forEach((item) => {
      item.checked = status;
      if (status) {
        if (!ids.includes(+item.value)) {
          ids.push(+item.value);
        }
      } else {
        ids = [];
      }
    });
    if (status) {
      count = checkItems.length;
    } else {
      count = 0;
    }
    renderDeleteBtn(count);
    idEl.value = ids.join();
  });

  checkItems.forEach((item) => {
    item.addEventListener("change", (e) => {
      const status = e.target.checked;

      if (status) {
        count++;
        if (!ids.includes(+e.target.value)) {
          ids.push(+e.target.value);
        }
      } else {
        count--;
        const index = ids.indexOf(+e.target.value);
        if (index !== -1) {
          ids.splice(index, 1);
        }
      }
      if (checkItems.length === count) {
        checkAll.checked = true;
      } else {
        checkAll.checked = false;
      }
      renderDeleteBtn(count);
      idEl.value = ids.join();
    });
  });

  const deleteForms = document.querySelectorAll(".deletes-form");
  console.log(deleteForms);
  if (deleteForms.length) {
    deleteForms.forEach((deleteForm) => {
      deleteForm.addEventListener("submit", (e) => {
        e.preventDefault();
        // console.log(e.target);
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            e.target.submit();
          }
        });
      });
    });
  }
}
