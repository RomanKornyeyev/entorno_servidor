window.sr = ScrollReveal();

window.addEventListener('load', function(){
    sr.reveal('.elemento',{
        duration: 1500,
        origin: 'bottom',
        distance: '100px',
        easing: 'cubic-bezier(0,.42,.25,1.07)',
        interval: 75,
        delay: 600
    });
    
    sr.reveal('.title',{
        duration: 1000,
        origin: 'top',
        distance: '100px'
    });
});
