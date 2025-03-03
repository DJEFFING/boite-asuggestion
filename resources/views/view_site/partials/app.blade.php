<!DOCTYPE html>
<html>
    <head>
            <!-- Basic Page Info -->
            <meta charset="utf-8" />
            <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

            <!-- Site favicon -->
            <link
                rel="apple-touch-icon"
                sizes="180x180"
                href=" {{asset('asset_site/vendors/images/apple-touch-icon.png')}} "
            />
            <link
                rel="icon"
                type="image/png"
                sizes="32x32"
                href=" {{asset('asset_site/vendors/images/favicon-32x32.png')}} "
            />
            <link
                rel="icon"
                type="image/png"
                sizes="16x16"
                href=" {{asset('asset_site/vendors/images/favicon-16x16.png')}} "
            />

            <!-- Mobile Specific Metas -->
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1, maximum-scale=1"
            />

            <!-- Google Font -->
            <link
                href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
                rel="stylesheet"
            />
            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href=" {{asset('asset_site/vendors/styles/core.css')}} " />
            <link
                rel="stylesheet"
                type="text/css"
                href="{{asset('asset_site/vendors/styles/icon-font.min.css')}}   "
            />
            <link rel="stylesheet" type="text/css" href=" {{asset('asset_site/vendors/styles/style.css')}} " />

            <style>
                .highlight {
                background-color: blue;
                color: white;
                }
            </style>
            <!-- End Google Tag Manager -->
    </head>

    <body>
        {{-- @include('view_site.partials.layout.peleader') --}}

        <!-- header -->
		@include('view_site.partials.layout.header')
		<!-- End header -->

        <!-- right-sidebar -->
		@include('view_site.partials.layout.rightSiderBar')
		<!-- End right-sidebar -->

        <!-- left-sidebar -->
		@include('view_site.partials.layout.leftSidebar')
		<!-- end left-sidebar -->

        <div class="mobile-menu-overlay"></div>
        
        @yield("content")
 
        <!-- welcome modal start -->
		@include('view_site.partials.layout.welcomModal')
		<!-- welcome modal end -->

        <!-- decriptionNotification modal start -->
        @include('view_site.partials.layout.descriptionNotitficationModal')
        <!-- decriptionNotification modal end -->

        <!-- js -->
		<script src=" {{asset('asset_site/vendors/scripts/core.js')}} "></script>
		<script src=" {{asset('asset_site/vendors/scripts/script.min.js')}} "></script>
		<script src=" {{asset('asset_site/vendors/scripts/process.js')}} "></script>
		<script src=" {{asset('asset_site/vendors/scripts/layout-settings.js')}} "></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
              <!-- Global site tag (gtag.js) - Google Analytics -->
              <script
              async
              src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
          ></script>
          <script
              async
              src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
              crossorigin="anonymous"
          ></script>
          <script>
              window.dataLayer = window.dataLayer || [];
              function gtag() {
                  dataLayer.push(arguments);
              }
              gtag("js", new Date());

              gtag("config", "G-GBZ3SGGX85");
          </script>
          <!-- Google Tag Manager -->
          <script>
              (function (w, d, s, l, i) {
                  w[l] = w[l] || [];
                  w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                  var f = d.getElementsByTagName(s)[0],
                      j = d.createElement(s),
                      dl = l != "dataLayer" ? "&l=" + l : "";
                  j.async = true;
                  j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                  f.parentNode.insertBefore(j, f);
              })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
          </script>
        
        <script>
            // Fonction pour effectuer le filtrage et gérer la surbrillance
            function handleFilter(event) {
              event.preventDefault();
          
              // Retirer la classe de surbrillance de tous les éléments
              var elements = event.currentTarget.parentNode.querySelectorAll("a");
              elements.forEach(function(element) {
                element.classList.remove("highlight");
              });
          
              // Ajouter la classe de surbrillance à l'élément sélectionné
              event.target.classList.add("highlight");
          
              // Effectuer le filtrage en utilisant l'URL du lien
              var url = event.target.getAttribute("href");
              window.location.href = url;
            }
          
            // Ajouter un gestionnaire d'événement aux éléments de catégorie
            var categoryItems = document.querySelectorAll("#categories a");
            categoryItems.forEach(function(item) {
              item.addEventListener("click", handleFilter);
            });
          
            // Ajouter un gestionnaire d'événement aux éléments d'archive
            var archiveItems = document.querySelectorAll("#archives a");
            archiveItems.forEach(function(item) {
              item.addEventListener("click", handleFilter);
            });
          
            // Récupérer l'URL de la page actuelle
            var currentURL = window.location.href;
          
            // Vérifier si l'URL correspond à une catégorie ou à une archive
            var categoryMatch = currentURL.match(/categorie_id=(\d+)/);
            var dateMatch = currentURL.match(/date=(\d{4}-\d{2}-\d{2})/);
          
            // Sélectionner l'élément correspondant à la catégorie ou à l'archive dans l'URL
            if (categoryMatch) {
              var categoryId = categoryMatch[1];
              var selectedCategory = document.querySelector("#categories a[href*='categorie_id=" + categoryId + "']");
              if (selectedCategory) {
                selectedCategory.classList.add("highlight");
              }
            } else if (dateMatch) {
              var date = dateMatch[1];
              var selectedArchive = document.querySelector("#archives a[href*='date=" + date + "']");
              if (selectedArchive) {
                selectedArchive.classList.add("highlight");
              }
            }
        </script>


	</body>
</html>