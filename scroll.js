window.addEventListener('scroll', function () {
    var sections = document.querySelectorAll('section');
    var navbarLinks = document.querySelectorAll('nav a');
    var currentSection = '';

    sections.forEach(function (section) {
        var rect = section.getBoundingClientRect();
        var sectionTop = rect.top + window.scrollY;

        if (section.id === 'contact') {
            if (window.scrollY >= sectionTop - 400) { 
                currentSection = section.getAttribute('id');
            }
        } else {
            if (window.scrollY >= sectionTop - 100) {
                currentSection = section.getAttribute('id');
            }
        }
    });

    navbarLinks.forEach(function (link) {
        link.classList.remove('active');
        if (link.getAttribute('href').slice(1) === currentSection) {
            link.classList.add('active');
        }
    });
});
