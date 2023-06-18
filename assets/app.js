/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

const burgerMenu = document.querySelector('.burger-menu')
const navbar = document.querySelector('.navbar')

burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active')
    navbar.classList.toggle('active')
})