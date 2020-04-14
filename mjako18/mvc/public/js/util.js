function removeChildren(element) {
  while(element.firstChild) {
    element.removeChild(element.lastChild);
  }
}

function changeHidden(item) {
  if(item.classList.contains('hidden')) {
    item.classList.remove('hidden');
    item.classList.add('shown');
  } else if(item.classList.contains('shown')) {
    item.classList.add('hidden');
    item.classList.remove('shown');
  }
}










