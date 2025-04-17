jQuery(function ($) {
  // Fonction pour mettre à jour le nombre de produits dans le panier en AJAX
  function updateCartCount() {
    $.ajax({
      url: ajax_object.ajax_url,
      type: "POST",
      data: {
        action: "get_cart_contents_count",
      },
      success: function (response) {
        if (response.success) {
          // Mettre à jour le nombre de produits affiché
          $(".cart-count span").text(response.data);
        } else {
          console.error(response.data);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }

  // Appeler la fonction pour mettre à jour le nombre de produits lors du chargement de la page
  updateCartCount();

  // Gérer l'ajout au panier
  $("body").on("click", ".add_to_cart_button", function (e) {
    e.preventDefault();

    var $button = $(this);
    // Vérifier si le bouton est déjà en cours de traitement pour éviter les clics multiples
    if ($button.hasClass("loading")) {
      return;
    }
    $button.addClass("loading");

    // Vérifier si le bouton est un produit variable
    var isVariableProduct = $button.hasClass("product_type_variable");

    if (isVariableProduct) {
      // Si le produit est variable, rediriger vers la page du produit
      window.location = $button.attr("href");
      return;
    }

    var data = {
      action: "add_to_cart",
      product_id: $button.data("product_id"),
      quantity: $button.data("quantity") || 1,
    };

    $.post(ajax_object.ajax_url, data, function (response) {
      if (!response) {
        return;
      }

      if (response.error && response.product_url) {
        window.location = response.product_url;
        return;
      }

      // Mettre à jour le contenu du panier
      $(document.body).trigger("added_to_cart", [
        response.fragments,
        response.cart_hash,
        $button,
      ]);
      $button.removeClass("loading");

      // Toggle de l'offcanvas
      $("#prismCart").offcanvas("show");

      // Mettre à jour le nombre de produits dans le panier
      updateCartCount();
    });
  });
});
