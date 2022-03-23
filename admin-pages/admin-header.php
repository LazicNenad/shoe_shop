<?php
session_start();
if (isset($_SESSION['user'])) {
	if ($_SESSION['user'] !== 'Admin') {
		header("Location: index.php");
	}
} else {
	header("Location: index.php");
}
include "config/connection.php";
include "models/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="">
	<title>Dashboard - Admin</title>
	<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" rel="stylesheet">
	<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jqvmap.css?v=16275756370585718435" rel="stylesheet">
	<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/flag-icon.min.css?v=10757425894848348376" rel="stylesheet">
	<!-- Fullcalendar-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css" rel="stylesheet">
	<!-- Materialize-->
	<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.css?v=8850535670742419153" rel="stylesheet">
	<!-- Material Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">

	<script>
		window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');
	</script>
	<meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/17758583/digital_wallets/dialog">
	<meta name="shopify-checkout-api-token" content="6aacc581eb2b41d74f03c38d3c985dba">
	<meta id="in-context-paypal-metadata" data-shop-id="17758583" data-venmo-supported="true" data-environment="production" data-locale="en_US" data-paypal-v4="true" data-currency="USD">
	<link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
	<script id="apple-pay-shop-capabilities" type="application/json">
		{
			"shopId": 17758583,
			"countryCode": "US",
			"currencyCode": "USD",
			"merchantCapabilities": ["supports3DS"],
			"merchantId": "gid:\/\/shopify\/Shop\/17758583",
			"merchantName": "Materialize Themes",
			"requiredBillingContactFields": ["postalAddress", "email"],
			"requiredShippingContactFields": ["postalAddress", "email"],
			"shippingType": "shipping",
			"supportedNetworks": ["visa", "masterCard", "amex", "discover", "jcb", "elo"],
			"total": {
				"type": "pending",
				"label": "Materialize Themes",
				"amount": "1.00"
			}
		}
	</script>
	<script id="shopify-features" type="application/json">
		{
			"accessToken": "6aacc581eb2b41d74f03c38d3c985dba",
			"betas": ["rich-media-storefront-analytics"],
			"domain": "themes.materializecss.com",
			"predictiveSearch": true,
			"shopId": 17758583,
			"smart_payment_buttons_url": "https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js",
			"dynamic_checkout_cart_url": "https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js",
			"locale": "en"
		}
	</script>
	<script>
		(function() {
			if ("sendBeacon" in navigator && "performance" in window) {
				var session_token = document.cookie.match(/_shopify_s=([^;]*)/);

				function handle_abandonment_event(e) {
					var entries = performance.getEntries().filter(function(entry) {
						return /monorail-edge.shopifysvc.com/.test(entry.name);
					});
					if (!window.abandonment_tracked && entries.length === 0) {
						window.abandonment_tracked = true;
						var currentMs = Date.now();
						var navigation_start = performance.timing.navigationStart;
						var payload = {
							shop_id: 17758583,
							url: window.location.href,
							navigation_start,
							duration: currentMs - navigation_start,
							session_token: session_token && session_token.length === 2 ? session_token[1] : "",
							page_type: "page"
						};
						window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({
							schema_id: "online_store_buyer_site_abandonment/1.1",
							payload: payload,
							metadata: {
								event_created_at_ms: currentMs,
								event_sent_at_ms: currentMs
							}
						}));
					}
				}
				window.addEventListener('pagehide', handle_abandonment_event);
			}
		}());
	</script>
	<script>
		var Shopify = Shopify || {};
		Shopify.shop = "materialize-themes.myshopify.com";
		Shopify.locale = "en";
		Shopify.currency = {
			"active": "USD",
			"rate": "1.0"
		};
		Shopify.country = "US";
		Shopify.theme = {
			"name": "debut",
			"id": 133945025,
			"theme_store_id": 796,
			"role": "main"
		};
		Shopify.theme.handle = "null";
		Shopify.theme.style = {
			"id": null,
			"handle": null
		};
		Shopify.cdnHost = "cdn.shopify.com";
	</script>
	<script type="module">
		! function(o) {
			(o.Shopify = o.Shopify || {}).modules = !0
		}(window);
	</script>
	<script>
		! function(o) {
			function n() {
				var o = [];

				function n() {
					o.push(Array.prototype.slice.apply(arguments))
				}
				return n.q = o, n
			}
			var t = o.Shopify = o.Shopify || {};
			t.loadFeatures = n(), t.autoloadFeatures = n()
		}(window);
	</script>
	<script>
		window.ShopifyPay = window.ShopifyPay || {};
		window.ShopifyPay.apiHost = "shop.app\/pay";
	</script>
	<script id="__st">
		var __st = {
			"a": 17758583,
			"offset": -25200,
			"reqid": "1e0b4a85-f3f5-40af-bbeb-654b808e1dae",
			"pageurl": "themes.materializecss.com\/pages\/admin-dashboard.html",
			"s": "pages-18649776217",
			"u": "f61f653f1174",
			"p": "page",
			"rtyp": "page",
			"rid": 18649776217
		};
	</script>
	<script>
		window.ShopifyPaypalV4VisibilityTracking = true;
	</script>
	<script>
		window.ShopifyAnalytics = window.ShopifyAnalytics || {};
		window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
		window.ShopifyAnalytics.meta.currency = 'USD';
		var meta = {
			"page": {
				"pageType": "page",
				"resourceType": "page",
				"resourceId": 18649776217
			},
			"page_view_event_id": "c8336c9a22bddeffd2751ba26a26c3a2402208ca0d878daf6f0fe0a34c441285",
			"cart_event_id": "eab92f5431e717922ac1624eb7ed85d1f375c89d66adc360bdf31c679189de3b"
		};
		for (var attr in meta) {
			window.ShopifyAnalytics.meta[attr] = meta[attr];
		}
	</script>
	<script>
		window.ShopifyAnalytics.merchantGoogleAnalytics = function() {

		};
	</script>
	<script class="analytics">
		(window.gaDevIds = window.gaDevIds || []).push('BwiEti');


		(function() {
			var customDocumentWrite = function(content) {
				var jquery = null;

				if (window.jQuery) {
					jquery = window.jQuery;
				} else if (window.Checkout && window.Checkout.$) {
					jquery = window.Checkout.$;
				}

				if (jquery) {
					jquery('body').append(content);
				}
			};

			var hasLoggedConversion = function(token) {
				if (token) {
					return document.cookie.indexOf('loggedConversion=' + token) !== -1;
				}
				return false;
			}

			var setCookieIfConversion = function(token) {
				if (token) {
					var twoMonthsFromNow = new Date(Date.now());
					twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

					document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
				}
			}

			var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
			if (trekkie.integrations) {
				return;
			}
			trekkie.methods = [
				'identify',
				'page',
				'ready',
				'track',
				'trackForm',
				'trackLink'
			];
			trekkie.factory = function(method) {
				return function() {
					var args = Array.prototype.slice.call(arguments);
					args.unshift(method);
					trekkie.push(args);
					return trekkie;
				};
			};
			for (var i = 0; i < trekkie.methods.length; i++) {
				var key = trekkie.methods[i];
				trekkie[key] = trekkie.factory(key);
			}
			trekkie.load = function(config) {
				trekkie.config = config;
				var first = document.getElementsByTagName('script')[0];
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.onerror = function(e) {
					var scriptFallback = document.createElement('script');
					scriptFallback.type = 'text/javascript';
					scriptFallback.onerror = function(error) {
						var Monorail = {
							produce: function produce(monorailDomain, schemaId, payload) {
								var currentMs = new Date().getTime();
								var event = {
									schema_id: schemaId,
									payload: payload,
									metadata: {
										event_created_at_ms: currentMs,
										event_sent_at_ms: currentMs
									}
								};
								return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
							},
							sendRequest: function sendRequest(endpointUrl, payload) {
								// Try the sendBeacon API
								if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
									var blobData = new window.Blob([payload], {
										type: 'text/plain'
									});

									if (window.navigator.sendBeacon(endpointUrl, blobData)) {
										return true;
									} // sendBeacon was not successful

								} // XHR beacon   

								var xhr = new XMLHttpRequest();

								try {
									xhr.open('POST', endpointUrl);
									xhr.setRequestHeader('Content-Type', 'text/plain');
									xhr.send(payload);
								} catch (e) {
									console.log(e);
								}

								return false;
							},
							isIos12: function isIos12() {
								return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
							}
						};
						Monorail.produce('monorail-edge.shopifysvc.com',
							'trekkie_storefront_load_errors/1.1', {
								shop_id: 17758583,
								theme_id: 133945025,
								app_name: "storefront",
								context_url: window.location.href,
								source_url: "https://cdn.shopify.com/s/trekkie.storefront.389365c6837479f77d5baa7adfe1b6bd693a2327.min.js"
							});

					};
					scriptFallback.async = true;
					scriptFallback.src = 'https://cdn.shopify.com/s/trekkie.storefront.389365c6837479f77d5baa7adfe1b6bd693a2327.min.js';
					first.parentNode.insertBefore(scriptFallback, first);
				};
				script.async = true;
				script.src = 'https://cdn.shopify.com/s/trekkie.storefront.389365c6837479f77d5baa7adfe1b6bd693a2327.min.js';
				first.parentNode.insertBefore(script, first);
			};
			trekkie.load({
				"Trekkie": {
					"appName": "storefront",
					"development": false,
					"defaultAttributes": {
						"shopId": 17758583,
						"isMerchantRequest": null,
						"themeId": 133945025,
						"themeCityHash": "1670185919760860438",
						"contentLanguage": "en",
						"currency": "USD"
					},
					"isServerSideCookieWritingEnabled": true,
					"isPixelGateEnabled": true
				},
				"Performance": {
					"navigationTimingApiMeasurementsEnabled": true,
					"navigationTimingApiMeasurementsSampleRate": 1
				},
				"Google Analytics": {
					"trackingId": "UA-56218128-1",
					"domain": "auto",
					"siteSpeedSampleRate": "10",
					"enhancedEcommerce": true,
					"doubleClick": true,
					"includeSearch": true
				},
				"Session Attribution": {}
			});

			var loaded = false;
			trekkie.ready(function() {
				if (loaded) return;
				loaded = true;

				window.ShopifyAnalytics.lib = window.trekkie;

				ga('require', 'linker');

				function addListener(element, type, callback) {
					if (element.addEventListener) {
						element.addEventListener(type, callback);
					} else if (element.attachEvent) {
						element.attachEvent('on' + type, callback);
					}
				}

				function decorate(event) {
					event = event || window.event;
					var target = event.target || event.srcElement;
					if (target && (target.getAttribute('action') || target.getAttribute('href'))) {
						ga(function(tracker) {
							var linkerParam = tracker.get('linkerParam');
							document.cookie = '_shopify_ga=' + linkerParam + '; ' + 'path=/';
						});
					}
				}
				addListener(window, 'load', function() {
					for (var i = 0; i < document.forms.length; i++) {
						var action = document.forms[i].getAttribute('action');
						if (action && action.indexOf('/cart') >= 0) {
							addListener(document.forms[i], 'submit', decorate);
						}
					}
					for (var i = 0; i < document.links.length; i++) {
						var href = document.links[i].getAttribute('href');
						if (href && href.indexOf('/checkout') >= 0) {
							addListener(document.links[i], 'click', decorate);
						}
					}
				});


				var originalDocumentWrite = document.write;
				document.write = customDocumentWrite;
				try {
					window.ShopifyAnalytics.merchantGoogleAnalytics.call(this);
				} catch (error) {};
				document.write = originalDocumentWrite;
				(function() {
					if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
						return;
					}
					window.BOOMR = window.BOOMR || {};
					window.BOOMR.snippetStart = new Date().getTime();
					window.BOOMR.snippetExecuted = true;
					window.BOOMR.snippetVersion = 12;
					window.BOOMR.application = "storefront-renderer";
					window.BOOMR.themeName = "Debut";
					window.BOOMR.themeVersion = "1.0.1";
					window.BOOMR.shopId = 17758583;
					window.BOOMR.themeId = 133945025;
					window.BOOMR.url =
						"https://cdn.shopify.com/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
					var where = document.currentScript || document.getElementsByTagName("script")[0];
					var parentNode = where.parentNode;
					var promoted = false;
					var LOADER_TIMEOUT = 3000;

					function promote() {
						if (promoted) {
							return;
						}
						var script = document.createElement("script");
						script.id = "boomr-scr-as";
						script.src = window.BOOMR.url;
						script.async = true;
						parentNode.appendChild(script);
						promoted = true;
					}

					function iframeLoader(wasFallback) {
						promoted = true;
						var dom, bootstrap, iframe, iframeStyle;
						var doc = document;
						var win = window;
						window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
						bootstrap = function(parent, scriptId) {
							var script = doc.createElement("script");
							script.id = scriptId || "boomr-if-as";
							script.src = window.BOOMR.url;
							BOOMR_lstart = new Date().getTime();
							parent = parent || doc.body;
							parent.appendChild(script);
						};
						if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
							window.BOOMR.snippetMethod = "s";
							bootstrap(parentNode, "boomr-async");
							return;
						}
						iframe = document.createElement("IFRAME");
						iframe.src = "about:blank";
						iframe.title = "";
						iframe.role = "presentation";
						iframe.loading = "eager";
						iframeStyle = (iframe.frameElement || iframe).style;
						iframeStyle.width = 0;
						iframeStyle.height = 0;
						iframeStyle.border = 0;
						iframeStyle.display = "none";
						parentNode.appendChild(iframe);
						try {
							win = iframe.contentWindow;
							doc = win.document.open();
						} catch (e) {
							dom = document.domain;
							iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
							win = iframe.contentWindow;
							doc = win.document.open();
						}
						if (dom) {
							doc._boomrl = function() {
								this.domain = dom;
								bootstrap();
							};
							doc.write("<body onload='document._boomrl();'>");
						} else {
							win._boomrl = function() {
								bootstrap();
							};
							if (win.addEventListener) {
								win.addEventListener("load", win._boomrl, false);
							} else if (win.attachEvent) {
								win.attachEvent("onload", win._boomrl);
							}
						}
						doc.close();
					}
					var link = document.createElement("link");
					if (link.relList &&
						typeof link.relList.supports === "function" &&
						link.relList.supports("preload") &&
						("as" in link)) {
						window.BOOMR.snippetMethod = "p";
						link.href = window.BOOMR.url;
						link.rel = "preload";
						link.as = "script";
						link.addEventListener("load", promote);
						link.addEventListener("error", function() {
							iframeLoader(true);
						});
						setTimeout(function() {
							if (!promoted) {
								iframeLoader(true);
							}
						}, LOADER_TIMEOUT);
						BOOMR_lstart = new Date().getTime();
						parentNode.appendChild(link);
					} else {
						iframeLoader(false);
					}

					function boomerangSaveLoadTime(e) {
						window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
					}
					if (window.addEventListener) {
						window.addEventListener("load", boomerangSaveLoadTime, false);
					} else if (window.attachEvent) {
						window.attachEvent("onload", boomerangSaveLoadTime);
					}
					if (document.addEventListener) {
						document.addEventListener("onBoomerangLoaded", function(e) {
							e.detail.BOOMR.init({
								producer_url: "https://monorail-edge.shopifysvc.com/v1/produce",
								ResourceTiming: {
									enabled: true,
									trackedResourceTypes: ["script", "img", "css"]
								},
							});
							e.detail.BOOMR.t_end = new Date().getTime();
						});
					} else if (document.attachEvent) {
						document.attachEvent("onpropertychange", function(e) {
							if (!e) e = event;
							if (e.propertyName === "onBoomerangLoaded") {
								e.detail.BOOMR.init({
									producer_url: "https://monorail-edge.shopifysvc.com/v1/produce",
									ResourceTiming: {
										enabled: true,
										trackedResourceTypes: ["script", "img", "css"]
									},
								});
								e.detail.BOOMR.t_end = new Date().getTime();
							}
						});
					}
				})();



				window.ShopifyAnalytics.lib.page(
					null, {
						"pageType": "page",
						"resourceType": "page",
						"resourceId": 18649776217
					},
					"c8336c9a22bddeffd2751ba26a26c3a2402208ca0d878daf6f0fe0a34c441285"
				);


				var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
				var token = match ? match[1] : undefined;
				if (!hasLoggedConversion(token)) {
					setCookieIfConversion(token);

				}
			});


			var eventsListenerScript = document.createElement('script');
			eventsListenerScript.async = true;
			eventsListenerScript.src = "//cdn.shopify.com/shopifycloud/shopify/assets/shop_events_listener-714e2e017903fad17d4471cb27d1f2c8a83b5a7a276f92420f7e5e40dbc9136e.js";
			document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

		})();
	</script>
	<script>
		! function(e) {
			e.addEventListener("DOMContentLoaded", function() {
				var t = ['form[action^="/contact"] input[name="form_type"][value="contact"]', 'form[action*="/comments"] input[name="form_type"][value="new_comment"]'].join(",");
				null !== e.querySelector(t) && (window.Shopify = window.Shopify || {}, window.Shopify.recaptchaV3 = window.Shopify.recaptchaV3 || {
					siteKey: "6LcCR2cUAAAAANS1Gpq_mDIJ2pQuJphsSQaUEuc9"
				}, (t = e.createElement("script")).setAttribute("src", "https://cdn.shopify.com/shopifycloud/storefront-recaptcha-v3/v0.1/index.js"), e.body.appendChild(t))
			})
		}(document);
	</script>
	<script integrity="sha256-2KbxRG1nAJxSTtTmhkiAC6kILrdVSO4o4QUDMcvnuig=" data-source-attribution="shopify.loadfeatures" defer="defer" src="//cdn.shopify.com/shopifycloud/shopify/assets/storefront/load_feature-d8a6f1446d67009c524ed4e68648800ba9082eb75548ee28e1050331cbe7ba28.js" crossorigin="anonymous"></script>
	<script crossorigin="anonymous" defer="defer" src="//cdn.shopify.com/shopifycloud/shopify/assets/shopify_pay/storefront-b61f50798075db890698930c4405673937fe89353f7fea7be88b5ce16a9c0af8.js?v=20210208"></script>
	<script integrity="sha256-h+g5mYiIAULyxidxudjy/2wpCz/3Rd1CbrDf4NudHa4=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="//cdn.shopify.com/shopifycloud/shopify/assets/storefront/features-87e8399988880142f2c62771b9d8f2ff6c290b3ff745dd426eb0dfe0db9d1dae.js" crossorigin="anonymous"></script>


	<!-- <style id="shopify-dynamic-checkout-cart">
		@media screen and min-width: 750px
			#dynamic-checkout-cart {
				min-height: 50px;
			
		

		@media screen and max-width: 750px 
			#dynamic-checkout-cart {
				min-height: 240px;
			
		
	</style> -->
	<script>
		window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');
	</script>
	<link rel="canonical" href="https://themes.materializecss.com/pages/admin-dashboard.html">
</head>

<body class="has-fixed-sidenav">
	<header>
		<div class="navbar-fixed">
			<nav class="navbar white">
				<div class="nav-wrapper"><a href="index.php" class="brand-logo grey-text text-darken-4">Home</a>
					<!-- <ul id="nav-mobile" class="right">
						<li class="hide-on-med-and-down"><a href="/products/admin">Buy Now!</a></li>
						<li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>
						<li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
					</ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a> -->
				</div>
			</nav>
		</div>
		<ul id="sidenav-left" class="sidenav sidenav-fixed">
			<li><a href="admin-panel.php" class="logo-container">Admin<i class="material-icons left">spa</i></a></li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold waves-effect active"><a class="collapsible-header" id="pagesId">Pages<i class="material-icons chevron">chevron_left</i></a>
						<div class="collapsible-body">
							<ul id="ul">
								<?php
								$allPages = getAll("menu");
								foreach ($allPages as $page) :
								?>
									<li><a href="<?= $page->path ?>" class="waves-effect active"><?= $page->text ?></a></li>
								<?php
								endforeach;
								?>
							</ul>
							<!-- <ul>
								<li><a href="/pages/admin-dashboard" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
								<li><a href="/pages/admin-fixed-chart" class="waves-effect">Fixed Chart<i class="material-icons">list</i></a></li>
								<li><a href="/pages/admin-grid" class="waves-effect">Grid<i class="material-icons">dashboard</i></a></li>
								<li><a href="/pages/admin-chat" class="waves-effect">Chat<i class="material-icons">chat</i></a></li>
							</ul> -->
						</div>
					</li>
					<li class="bold waves-effect"><a class="collapsible-header">Tables<i class="material-icons chevron">chevron_left</i></a>
						<div class="collapsible-body">
							<ul>
								<li><a href="admin-panel.php" class="waves-effect">Products</a></li>
								<li><a href="admin-panel-users.php" class="waves-effect">Users</a></li>
								<li><a href="admin-panel-messages.php" class="waves-effect">Messages</a></li>
								<li><a href="admin-panel-brands.php" class="waves-effect">Brands</a></li>
							</ul>
						</div>
					</li>



				</ul>
			</li>
		</ul>

	</header>