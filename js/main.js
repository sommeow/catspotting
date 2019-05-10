window.addEventListener('load', function() {
  picture = document.getElementsByTagName('img')[0];
  
  picture.addEventListener('click', findCatYet);
  picture.addEventListener('click', highlight);
});

function highlight(evt) {
  highlighter = document.getElementsByClassName('highlighter')[0]
  highlighter.style.display = 'block'
  highlighter.style.top = evt.pageY - 26 + 'px'
  highlighter.style.left = evt.pageX - 26 + 'px'
  setTimeout(unHighlight, 1000);
};

function unHighlight() {
  highlight.style.display = 'none'
};

function findCatYet(evt) {
  x = evt.pageX;
  y = evt.pageY;
  params = 'xpos=' + (x - evt.target.offsetLeft) + '&ypos=' + (y - evt.target.offsetTop);
  sendRequest('POST', 'assets/coord-bridge.php', params, showResponse);
};

function sendRequest(method, phpFile, params, afterLoad) {
  request = new XMLHttpRequest();
  request.open(method, phpFile, true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
  request.send(params);
  request.addEventListener("load", afterLoad);
};

function showResponse(evt) {
  document.getElementById('rspnse').innerHTML = evt.target.response;
  if (evt.target.response.includes('√')) {
      endGame();
  }
};

function endGame() {
  document.getElementById("endModal").style.display = "block";
}