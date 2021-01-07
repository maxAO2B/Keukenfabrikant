var timer = 5;
var interval = setInterval(function() {
  timer--;
  document.querySelector('.timer').textContent = timer;
  if(timer == 1) {
    document.querySelector('.unitName').textContent = "seconde";
  } else {
    document.querySelector('.unitName').textContent = "seconden";
  }
  if(timer < 1) {
    clearInterval(interval);
    window.location = 'home';
  }
}, 1000)