import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import focus from '@alpinejs/focus';
import 'flowbite';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.plugin(focus);

Alpine.start();


