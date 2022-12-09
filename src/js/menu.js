// Open mobile menu
let menuToggleOpen = document.querySelector(".menu-toggle-open");
let menuToggleClose = document.querySelector(".menu-toggle-close");
if (menuToggleOpen) {
  menuToggleOpen.addEventListener("click", () => {
    document.body.classList.add("menu-open");
  });
}
if (menuToggleClose) {
  menuToggleClose.addEventListener("click", () => {
    document.body.classList.remove("menu-open");
  });
}

// Active item
let bodyClass = document.querySelector("body").className;
let menuItems = document.querySelectorAll(".menu-item");
if (menuItems) {
  for (menuItem of menuItems) {
    let menuItemsClassArchive = menuItem.dataset.classArchive;
    let menuItemsClassSingle = menuItem.dataset.classSingle;
    let menuItemsClassTax = menuItem.dataset.classTax;
    if (
      bodyClass.includes(menuItemsClassArchive) ||
      bodyClass.includes(menuItemsClassSingle) ||
      bodyClass.includes(menuItemsClassTax)
    ) {
      console.log("yes");
      menuItem.classList.add("bg-white", "dark:bg-zinc-600");
    }
  }
}
