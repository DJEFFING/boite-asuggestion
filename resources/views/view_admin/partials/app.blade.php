<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Boite A Suggesstion Admin</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href=" {{asset('asset_admin/vendors/images/apple-touch-icon.png')}} "
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="  {{asset('asset_admin/vendors/images/favicon-32x32.png')}}  "
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="  {{asset('asset_admin/vendors/images/favicon-16x16.png')}}  "
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
		<link rel="stylesheet" type="text/css" href="  {{asset('asset_admin/vendors/styles/core.css')}}  " />
		<link
			rel="stylesheet"
			type="text/css"
			href="  {{asset('asset_admin/vendors/styles/icon-font.min.css')}}  "
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="  {{asset('asset_admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}  "
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="  {{asset('asset_admin/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}  "
		/>
		<link rel="stylesheet" type="text/css" href="  {{asset('asset_admin/vendors/styles/style.css')}}  " />

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
		<!-- End Google Tag Manager -->
	</head>

	<body>

		{{-- pre-loader --}}
		{{-- @include('view_admin.partials.layout.loader') --}}
		{{-- END pre-loader --}}

		{{-- header --}}
		@include('view_admin.partials.layout.header')
		{{-- END header --}}

		{{-- right suderbar --}}
		@include('view_admin.partials.layout.rightSiderbar')
		{{-- END right suderbar --}}

		{{-- left suderbar --}}
		@include('view_admin.partials.layout.leftSiderBar')
		{{-- END left suderbar --}}

		<div class="mobile-menu-overlay"></div>

        @yield("content")


		<!-- welcome modal start -->
		@include('view_admin.partials.layout.welcomModal')
		<!-- welcome modal end -->

         <!-- decriptionNotification modal start -->
         @include('view_admin.partials.layout.description-admin-notitfication-modal')
         <!-- decriptionNotification modal end -->
		<!-- js -->
		<script src=" {{asset('asset_admin/vendors/scripts/core.js')}} "></script>
		<script src=" {{asset('asset_admin/vendors/scripts/script.min.js')}} "></script>
		<script src=" {{asset('asset_admin/vendors/scripts/process.js')}} "></script>
		<script src=" {{asset('asset_admin/vendors/scripts/layout-settings.js')}} "></script>
		<script src=" {{asset('asset_admin/src/plugins/apexcharts/apexcharts.min.js')}} "></script>
		<script src=" {{asset('asset_admin/src/plugins/datatables/js/jquery.dataTables.min.js')}} "></script>
		<script src=" {{asset('asset_admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}} "></script>
		<script src=" {{asset('asset_admin/src/plugins/datatables/js/dataTables.responsive.min.js')}} "></script>
		<script src=" {{asset('asset_admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')}} "></script>
		<script src=" {{asset('asset_admin/vendors/scripts/dashboard.js')}} "></script>
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

        <script>
	$(document).ready(function() {
		$('.list-group-item-action').click(function() {
			var id = $(this).data('id');
			var description = $(this).find('div p').text();
			var date = $(this).find('div small').text();
			$('#created_atDescription').text(date);
			$('#notificationDescription').text(description);
		});
	});
</script>
	</body>
</html>
