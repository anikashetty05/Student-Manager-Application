document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById('successPopup');
    if (popup) {
        // Automatically hide and remove the popup after 10 seconds
        setTimeout(function() {
            popup.style.transition = 'opacity 0.5s ease';
            popup.style.opacity = '0';
            setTimeout(function() {
                popup.remove();
            }, 500); // Wait for fade-out animation to finish before removing from DOM
        }, 10000);
    }
});