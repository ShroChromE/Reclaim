import Alpine from 'alpinejs';
import './imagePreview';
import './doubleSubmitFix';
import './confirmAction';

window.Alpine = Alpine;

Alpine.start();

if (document.querySelector('[data-chart]')) {
    import('./adminCharts');
}