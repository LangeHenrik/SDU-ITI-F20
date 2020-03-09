function menu_toggle() {
  const menu = document.querySelector("#mobile-menu");

  if(menu.classList.contains('hide-s')) {
    menu.classList.remove('hide-s');
  } else {
    menu.classList.add('hide-s');
  }
}
