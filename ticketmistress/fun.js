let btn = document.querySelector('.mouse-cursor-gradient-tracking');
btn.addEventListener('mousemove', e => {
  let rect = e.target.getBoundingClientRect();
  let x = e.clientX - rect.left;
  let y = e.clientY - rect.top;
  btn.style.setProperty('--x', x + 'px');
  btn.style.setProperty('--y', y + 'px');
});

function onIncreaseNormal(id) {
  const hidden = document.getElementById('container');
  const value = JSON.parse(hidden.value);
  value['normal']++
  id.value = value['normal']
  hidden.value = JSON.stringify(value)
  console.log(hidden.value, '+normal');
}

function onDecreaseNormal(id) {
  const hidden = document.getElementById('container');
  const value = JSON.parse(hidden.value);
  value['normal']--
  id.value = value['normal']
  hidden.value = JSON.stringify(value)
  console.log(hidden.value, '-normal')
}
function onIncreaseVip(id) {
  const hidden = document.getElementById('container');
  const value = JSON.parse(hidden.value);
  value['vip']++
  id.value = value['vip']
  hidden.value = JSON.stringify(value)
  console.log(hidden.value, '+vip')
}

function onDecreaseVip(id) {
  const hidden = document.getElementById('container');
  const value = JSON.parse(hidden.value);
  value['vip']--
  id.value = value['vip']
  hidden.value = JSON.stringify(value)
  console.log(hidden.value, '-vip')
}


const redirectToCheckout = ()=>{
  const hidden = document.getElementById('container');
  const value = JSON.parse(hidden.value);
  console.log(value);
  alert('about to redirect')
  window.location="cart.php?normal="+value['normal']+"&vip="+value['vip']
}