const checkAll = document.querySelector(".check-all");
if (checkAll) {
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
    });
    if (status) {
      count = checkItems.length;
    } else {
      count = 0;
    }
    renderDeleteBtn(count);
  });

  checkItems.forEach((item) => {
    item.addEventListener("change", (e) => {
      const status = e.target.checked;
      if (status) {
        count++;
      } else {
        count--;
      }
      if (checkItems.length === count) {
        checkAll.checked = true;
      } else {
        checkAll.checked = false;
      }
      renderDeleteBtn(count);
    });
  });
}
