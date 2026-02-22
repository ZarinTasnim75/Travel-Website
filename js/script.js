document.addEventListener('DOMContentLoaded', () => {
let searchBtn= document.querySelector('#search-btn');
let searchBar=document.querySelector('.search-bar-container');
let formBtn=document.querySelector('#login-btn');
let loginFormContainer=document.querySelector('.login-form-container');
let formClose=document.querySelector('#form-close');
let loginForm = document.querySelector('#login-form');
let registerForm = document.querySelector('#register-form');
let showRegisterLink = document.querySelector('#show-register');
let showLoginLink = document.querySelector('#show-login');
const resetForm = document.getElementById('reset-form');

let menu= document.querySelector('#menu-bar');
let navbar= document.querySelector('.navbar');

// home section starts
let videoBtn=document.querySelectorAll('.vid-btn');
// home section ends
window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

menu.addEventListener('click',() => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

// Links/buttons
const forgetPasswordLink = loginForm.querySelector('p a'); // first forget password link
const showLoginFromReset = document.getElementById('show-login-from-reset');

// Show register form
showRegisterLink.addEventListener('click', () => {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
    resetForm.style.display = 'none';
});

// Show login form from register
showLoginLink.addEventListener('click', () => {
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
    resetForm.style.display = 'none';
});

// Show reset password form
forgetPasswordLink.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'none';
    resetForm.style.display = 'block';
});

// Show login form from reset
showLoginFromReset.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
    resetForm.style.display = 'none';
});


  const searchInput = document.querySelector('#search-bar');
  const searchForm = document.querySelector('.search-bar-container');

  // Function to perform search
  const performSearch = () => {
  const value = searchInput.value.toLowerCase().trim();
  if (!value) return;

  const boxes = document.querySelectorAll(".packages .box");
  let found = false;

  boxes.forEach(box => {
    const text = box.innerText.toLowerCase();

    if (text.includes(value)) {

      const header = document.querySelector("header");
      const headerHeight = header ? header.offsetHeight : 0;

      const boxTop = box.getBoundingClientRect().top + window.pageYOffset;

      window.scrollTo({
        top: boxTop - headerHeight - 30,
        behavior: "smooth"
      });

      box.style.border = "2px solid red";
      found = true;

    } else {
      box.style.border = "";
    }
  });

  if (!found) {
    alert("Package not found");
  }
};

// Toggle search bar
searchBtn.addEventListener('click', () => {
  searchBtn.classList.toggle('fa-times');
  searchBar.classList.toggle('active');
});

// Search on Enter (form submit)
searchForm.addEventListener('submit', (e) => {
  e.preventDefault();
  performSearch();
});


// Open login modal
formBtn.addEventListener('click', () => {
    loginFormContainer.classList.add('active');
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
});

// Close modal
formClose.addEventListener('click', () => {
    loginFormContainer.classList.remove('active');
});

// Switch to register form
showRegisterLink.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
});

// Switch back to login form
showLoginLink.addEventListener('click', (e) => {
    e.preventDefault();
    registerForm.style.display = 'none';
    loginForm.style.display = 'block';
});

// home section starts
videoBtn.forEach(btn =>{
 btn.addEventListener('click', ()=>{
   document.querySelector('.controls .active').classList.remove('active');
   btn.classList.add('active');
   let src=btn.getAttribute('data-src');
   document.querySelector('#video-slider').src=src;
 })
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints:{
    640: {
      slidesPerView:1,
    }, 
    768: {
      slidesPerView:2,
    },
     1024: {
      slidesPerView:3,
    },
  },
});

var swiper = new Swiper(".brand-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints:{
    450: {
      slidesPerView:2,
    }, 
    768: {
      slidesPerView:3,
    },
     991: {
      slidesPerView:4,
    },
    1200: {
      slidesPerView:5,
    },
  },
});
  });