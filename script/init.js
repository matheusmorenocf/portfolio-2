let preferences = [
  { theme: '' }
]


function init() {
  loader();
  getPreferences();
  switchTheme();
  formContact();
  scrollHeader();
}

function getPreferences() {
  const pref = JSON.parse(localStorage.getItem('theme')) ?? null
  if(pref) {
    const [{ theme }] = pref
    if (theme === 'light') {
      document.body.classList.add('light')
      document.body.classList.remove('remove')
  
    }
    else {
      document.body.classList.add('dark')
      document.body.classList.remove('light')
    }
  }
}

function savePreferences() {
  document.body.classList.contains('dark') ? preferences[0].theme = 'dark' : preferences[0].theme = 'light'
  localStorage.setItem('theme', JSON.stringify(preferences))
}

function loader() {
  window.addEventListener("load", showLoader);
  window.addEventListener("load", hideLoader);
  // window.addEventListener("scroll", updateLoaderPosition);

}

// function updateLoaderPosition() {
//   const loader = document.querySelector("#loader");
//   const windowTop = window.pageYOffset || document.documentElement.scrollTop;
//   const windowHeight = window.innerHeight || document.documentElement.clientHeight;
//   const loaderHeight = loader.offsetHeight;
//   loader.style.top = (windowTop + (windowHeight / 2) - (loaderHeight / 2)) + "px";
// }

function showLoader() {
  document.querySelector("#loader").style.display = "block";
}

function hideLoader() {
  document.querySelector("#loader").style.display = "none";
  document.querySelector("#container").style.display = "block";
}

function switchTheme() {
  const themeButton = document.querySelector('#theme');
  themeButton.addEventListener('change', () => {
    document.body.classList.toggle('dark');
    document.body.classList.toggle('light');
    document.querySelector('#switcher').classList.toggle('fa-moon')
    document.querySelector('#switcher').classList.toggle('fa-sun')
    savePreferences()
  });

}
function formContact() {
  const contactBtn = document.querySelector('#contactBtn');
  contactBtn.addEventListener('click', hideForm);
  const closeBtn = document.querySelector('#close-form');
  closeBtn.addEventListener('click', hideForm)
  const containerForm = document.querySelector('.contact-container');
  containerForm.addEventListener('click', (ev) => {
    if (ev.target === containerForm) {
      hideForm()
    }
  })
}

function hideForm() {
  const contactContainer = document.querySelector('.contact-container');
  contactContainer.classList.toggle('form-hidden');
}




function scrollHeader() {
  let prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;
    if (currentScrollPos <= 0 || prevScrollpos > currentScrollPos) {
      document.querySelector('header').classList.add('visible');
    } else {
      document.querySelector('header').classList.remove('visible');
    }
    prevScrollpos = currentScrollPos;
  };
}

export { init };

