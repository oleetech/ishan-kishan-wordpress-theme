function handleDropdownMenu(dropdownMenuId) {
  const dropdownMenus = document.querySelectorAll('[id$="-dropdown-menu"]');
  const clickedMenu = document.getElementById(dropdownMenuId);
  const mainDropdown = document.getElementById("products-dropdown-menu");

  if (
    dropdownMenuId === "products-dropdown-menu" &&
    !mainDropdown.classList.contains("hidden")
  ) {
    dropdownMenus.forEach((menu) => {
      menu.classList.add("hidden");
    });
    return;
  }

  dropdownMenus.forEach((menu) => {
    if (
      menu.id !== dropdownMenuId &&
      menu.id !== "products-dropdown-menu" &&
      !menu.classList.contains("hidden")
    ) {
      menu.classList.add("hidden");
    }
  });

  clickedMenu.classList.toggle("hidden");

  if (
    mainDropdown.classList.contains("hidden") &&
    clickedMenu !== mainDropdown
  ) {
    mainDropdown.classList.remove("hidden");
  }
}

function closeAllDropdowns() {
  const dropdownMenus = document.querySelectorAll('[id$="-dropdown-menu"]');
  dropdownMenus.forEach((menu) => {
    menu.classList.add("hidden");
  });
}

document.addEventListener("click", function (event) {
  const dropdownMenus = document.querySelectorAll('[id$="-dropdown-menu"]');
  const isClickInsideDropdown = Array.from(dropdownMenus).some((menu) =>
    menu.contains(event.target)
  );
  const isClickOnDropdownToggle = event.target.closest(
    '[onclick^="handleDropdownMenu"]'
  );

  if (!isClickInsideDropdown && !isClickOnDropdownToggle) {
    closeAllDropdowns();
  }
});
