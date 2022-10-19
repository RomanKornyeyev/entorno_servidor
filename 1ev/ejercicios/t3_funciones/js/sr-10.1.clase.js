window.sr = ScrollReveal();

sr.reveal( '.to-left-750',{
    duration: 750,
    origin: 'right',
    easing: 'cubic-bezier(0,.42,.25,1.07)',
    distance: '120px',
    interval: 100
});
sr.reveal( '.to-left-950',{
    duration: 950,
    origin: 'right',
    distance: '120px',
    interval: 100
});
sr.reveal('.up-750',{
    duration: 750,
    origin: 'bottom',
    distance: '100px',
    interval: 150
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
sr.reveal('.delay-450',{
    delay: 450
});
sr.reveal('.delay-1150',{
    delay: 1150
})