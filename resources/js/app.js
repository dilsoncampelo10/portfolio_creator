import './bootstrap';

import Alpine from 'alpinejs';

import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.min.js';




window.Alpine = Alpine;

Alpine.start();


document.getElementById('close_button').addEventListener('click',()=> {
    document.getElementById('alert_success').style.display = 'none'
})