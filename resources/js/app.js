import './bootstrap';
function showProfilePage() {
    // Logique pour afficher la page de profil
    alert("Afficher mon parcours");
}

function logout() {
    // Logique pour se déconnecter
    alert("Déconnexion en cours...");
    // Redirige vers la route de déconnexion
    window.location.href = '/logout'; // Assure-toi que c'est la bonne route
}

