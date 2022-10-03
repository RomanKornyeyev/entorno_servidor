window.sr = ScrollReveal();

sr.reveal( '.to-left-750',{
    duration: 750,
    origin: 'right',
    easing: 'cubic-bezier(0,.42,.25,1.07)',
    distance: '120px',
    interval: 100
});
sr.reveal('.up-1250',{
    duration: 1250,
    origin: 'bottom',
    easing: 'cubic-bezier(0,.42,.25,1.07)',
    distance: '100px',
    interval: 150,
    delay: 450
});
sr.reveal('.title',{
    duration: 750,
    origin: 'top',
    distance: '50px',
    interval: 100
});