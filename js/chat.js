document.addEventListener("DOMContentLoaded", function() {
    // Récupère l'élément contenant les messages du chat
    let chatMessages = document.getElementById("chat-messages");
    
    // Fait défiler la barre de défilement vers le bas
    chatMessages.scrollTop = chatMessages.scrollHeight;
});

