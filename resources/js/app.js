import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

// Bind it globally if you need access inside inline Blade script tags or Alpine.js
window.Chart = Chart;
