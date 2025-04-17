jQuery(document).ready(function ($) {
  if (document.cookie.indexOf("visited=true") === -1) {
    // Affichage du modal
    $("#firstVisitModal").modal("show");

    // Définition du cookie pour indiquer que l'utilisateur a visité le site
    var date = new Date();
    date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000); // Durée du cookie : 30 jours
    document.cookie = "visited=true;expires=" + date.toUTCString() + ";path=/";
  }
});
