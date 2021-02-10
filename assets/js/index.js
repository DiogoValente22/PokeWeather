palavraChave = new URLSearchParams(window.location.search).get('palavra_chave');
element = document.getElementById('palavra-chave')
if (palavraChave) {
  element.innerHTML = 'Palavra-chave:<pre>' + palavraChave +'</pre>'
} else {
  element.parentNode.removeChild(element);
}

document.getElementById('city-input').value = new URLSearchParams(window.location.search).get('city') || 'Curitiba';