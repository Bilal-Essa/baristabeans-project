// Voeg deze code toe aan je JavaScript-bestand of script sectie in je Laravel-weergave
document.addEventListener('DOMContentLoaded', function() {
    // Zoek het succesberichtelement
    var successMessage = document.getElementById('success-message');
    
    // Controleer of het succesberichtelement bestaat
    if (successMessage) {
        // Toon een pop-upvenster met het succesbericht
        alert(successMessage.innerText);
    }
});
