document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggle = document.getElementById("dropdownToggle");
  const dropdownMenu = document.getElementById("dropdownMenu");
  const dropdownItems = dropdownMenu.querySelectorAll("li");

  // Toggle dropdown visibility
  dropdownToggle.addEventListener("click", function () {
    dropdownMenu.classList.toggle("hidden");
  });

  // Hide dropdown when an item is selected
  dropdownItems.forEach((item) => {
    item.addEventListener("click", function () {
      dropdownMenu.classList.add("hidden");
    });
  });

  // Hide dropdown when clicked outside
  document.addEventListener("click", function (e) {
    if (
      !dropdownToggle.contains(e.target) &&
      !dropdownMenu.contains(e.target)
    ) {
      dropdownMenu.classList.add("hidden");
    }
  });
});

//open and close menu item

document.addEventListener('DOMContentLoaded', function () {
  const menuIcon = document.getElementById('menu-icon');
  const closeIcon = document.getElementById('close-icon');
  const menuItem = document.getElementById('menu-item');

  menuIcon.addEventListener('click', function () {
    menuItem.classList.remove('hidden');
    menuIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
  });

  closeIcon.addEventListener('click', function () {
    menuItem.classList.add('hidden');
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
  });
});
// animation  CHRONO 
document.addEventListener('DOMContentLoaded', function() {
  AOS.init({
    duration: 2000, 
    once: false , //  rep animation y/ n
    startEvent: 'DOMContentLoaded',
  });
});

// animation  text scrolling

let textElement = document.querySelector('.text');
let textContent = textElement.textContent;
textElement.innerHTML = '';

for (let char of textContent) {
  let span = document.createElement('span');
  span.textContent = char;
  textElement.appendChild(span);
}

let spans = textElement.querySelectorAll('span');

window.addEventListener('scroll', () => {
  let scrollDistance = window.scrollY;
  spans.forEach((span, index) => {
    if (scrollDistance >= (index + 1) * 1.5) {
      span.classList.add('active');
    } else {
      span.classList.remove('active');
    }
  });
});

