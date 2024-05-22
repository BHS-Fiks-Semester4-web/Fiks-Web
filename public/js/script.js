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

//huruf kapital awal setiap kata
function capitalize(input) {
    var words = input.value.split(' ');
    for (var i = 0; i < words.length; i++) {
        var word = words[i];
        if (word.length > 0) {
            words[i] = word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
        }
    }
    input.value = words.join(' ');
}

//toggle password
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const toggleIcon = document.querySelector('#toggleIcon');

togglePassword.addEventListener('click', function (e) {
    // Mengubah tipe input
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Mengubah ikon mata
    toggleIcon.classList.toggle('fa-eye-slash');
});