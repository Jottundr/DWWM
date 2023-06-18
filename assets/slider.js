const btns = document.querySelectorAll('.nav-btn')
const slides = document.querySelectorAll('.img-slide')
const contents = document.querySelectorAll('.content')

let sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove('active')
    })

    slides.forEach((slide) => {
        slide.classList.remove('active')
    })

    contents.forEach((content) => {
        content.classList.remove('active')
    })

    btns[manual].classList.add('active')
    slides[manual].classList.add('active')
    contents[manual].classList.add('active')
}

btns.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        sliderNav(i)
        currentSlide = i
    })
})

let slideNumber = 0
let currentSlide = 1

let playslider;

let repeater = () => {
    playslider = setInterval(function () {
        slides.forEach((slide) => {
            slide.classList.remove('active')
        })
        btns.forEach((btn) => {
            btn.classList.remove('active')
        })

        contents.forEach((content) => {
            content.classList.remove('active')
        })

        slideNumber++

        if (slideNumber > (btns.length - 1)) {
            slideNumber = 0
        }

        slides[slideNumber].classList.add('active')
        btns[slideNumber].classList.add('active')
        contents[slideNumber].classList.add('active')
    }, 5000)
}

repeater()