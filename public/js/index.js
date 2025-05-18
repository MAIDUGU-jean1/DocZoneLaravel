// TOGGLE MENU BUTTON

const navMenu = document.getElementById('nav-menu')
const navLink = document.querySelectorAll('.nav-link')
const hamburger = document.getElementById('hamburger')

hamburger.addEventListener('click', () => {
  navMenu.classList.toggle('left-[0]')
  hamburger.classList.toggle('ri-close-large-line') 
})

navLink.forEach(link => {
  link.addEventListener('click', () => {
    navMenu.classList.toggle('left-[0]')
    hamburger.classList.toggle('ri-close-large-line')
  })
})


/*----------------------  SHOW  SCROLL UP ----------------------*/

const scrollUp = () => {
  const scrollUpBtn = document.getElementById('scroll-up')

  if(this.scrollY >= 250) {
    scrollUpBtn.classList.remove("-bottom-1/2")
    scrollUpBtn.classList.add("bottom-4")
  } else {
    scrollUpBtn.classList.add("-bottom-1/2")
    scrollUpBtn.classList.remove("bottom-4")
  }

}
window.addEventListener('scroll', scrollUp)


const exampleText = ['Developer,', 'Designer,', 'Author,', 'Learner... '];

const exampleTyping = new AutoTyping('#text', exampleText, {
    typeSpeed: 60,
    deleteSpeed: 100,
    waitBeforeDelete: 500,
    waitBetweenWords: 500,
});

/*----------------------  CHANGE BACKGROUND HEADER ----------------------*/

const scrollHeader = () => {
  const header = document.getElementById('navbar')

  if(this.scrollY >= 50) {
    header.classList.add("border-b", "border-black")
  } else {
    header.classList.remove("border-b", "border-black")
  }

}
window.addEventListener('scroll', scrollHeader)



