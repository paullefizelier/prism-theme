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

jQuery(document).ready(function ($) {
  if (document.cookie.indexOf("visited=true") === -1) {
    // Affichage du modal
    $("#firstVisitModal").modal("show");

    // Définition du cookie pour indiquer que l'utilisateur a visité le site
    var date = new Date();
    date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000); // Durée du cookie : 30 jours
    document.cookie = "visited=true;expires=" + date.toUTCString() + ";path=/";
  }

  // // Fonction pour mettre à jour la jauge de livraison gratuite
  // function updateFreeShippingMeter() {
  //   const freeShippingMin = 250;

  //   // On récupère le total du panier via AJAX
  //   $.ajax({
  //     url: wc_add_to_cart_params.ajax_url,
  //     type: "POST",
  //     data: {
  //       action: "get_cart_total",
  //     },
  //     success: function (response) {
  //       if (response.success) {
  //         const cartTotal = parseFloat(response.data.cart_total);
  //         const remaining = freeShippingMin - cartTotal;
  //         const percentage = Math.min(100, (cartTotal / freeShippingMin) * 100);

  //         // Si le panier est vide ou moins que le montant minimum
  //         if (remaining > 0) {
  //           // Mise à jour du texte et de la barre de progression
  //           let meterHtml = '<div class="free-shipping-meter mb-3">';
  //           meterHtml += '<div class="alert alert-info mb-2">';
  //           meterHtml +=
  //             "<small>Plus que <strong>" +
  //             remaining.toFixed(2) +
  //             "€</strong> pour profiter de la livraison gratuite</small>";
  //           meterHtml += "</div>";
  //           meterHtml += '<div class="progress" style="height: 10px;">';
  //           meterHtml +=
  //             '<div class="progress-bar bg-primary" role="progressbar" style="width: ' +
  //             percentage +
  //             '%"';
  //           meterHtml +=
  //             'aria-valuenow="' +
  //             percentage +
  //             '" aria-valuemin="0" aria-valuemax="100"></div>';
  //           meterHtml += "</div></div>";

  //           // On vérifie si la jauge existe déjà
  //           if ($(".free-shipping-meter").length > 0) {
  //             $(".free-shipping-meter").replaceWith(meterHtml);
  //           } else {
  //             $("#prismCart .offcanvas-body").prepend(meterHtml);
  //           }
  //         } else {
  //           // Si le montant minimum est atteint, on supprime la jauge
  //           $(".free-shipping-meter").remove();
  //         }
  //       }
  //     },
  //   });
  // }

  // Mise à jour à chaque fois que le panier est modifié
  // $(document.body).on(
  //   "added_to_cart removed_from_cart updated_cart_totals",
  //   function () {
  //     updateFreeShippingMeter();
  //   }
  // );

  // Mise à jour à l'ouverture du panier
  // $('[data-bs-target="#prismCart"]').on("click", function () {
  //   updateFreeShippingMeter();
  // });
});
