const roleSelector = document.querySelectorAll('input[type=radio]');
const nextbtn = document.getElementById('nextbtn');

roleSelector.forEach(radio => {
  radio.addEventListener('change', function() {
    if (this.checked) {
      nextbtn.disabled = false;
      nextbtn.classList.remove('disabled');
    }
  });
});