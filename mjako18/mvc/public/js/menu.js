function menu_toggle() {
  const menu = document.querySelector("#mobile-menu");
  console.log(menu);
  if(menu.classList.contains('hide-s')) {
    menu.classList.remove('hide-s');
  } else {
    menu.classList.add('hide-s');
  }
}
