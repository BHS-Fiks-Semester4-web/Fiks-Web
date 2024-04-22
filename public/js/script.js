// SMOOTH SCROLL
document.addEventListener("DOMContentLoaded", function() {
    var scrollLinks = document.querySelectorAll('a[href^="#"]');
    
    scrollLinks.forEach(function(scrollLink) {
        scrollLink.addEventListener('click', function(e) {
            e.preventDefault();

            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                var targetPosition = targetElement.offsetTop;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

//SCROLL TO TOP

document.addEventListener("DOMContentLoaded", function() {

    window.addEventListener('scroll', function() {

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById('scrollToTopBtn').style.display = 'block';
        } else {
            document.getElementById('scrollToTopBtn').style.display = 'none';
        }
    });
});

// Fungsi untuk scroll ke atas
function scrollToTop() {
    window.scrollTo({
        top: 1,
        behavior: 'smooth'
    });
}

