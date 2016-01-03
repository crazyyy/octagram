function BuildRating(e){var a='<i class="fa fa-star"></i>',n='<!-- this block created in js --><span class="ovr-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">';return n=n+'<meta itemprop="worstRating" content = "'+e+'"><span itemprop="ratingValue">',1==e?n+=a:2==e?n=n+a+a:3==e?n=n+a+a+a:4==e?n=n+a+a+a+a:5==e&&(n=n+a+a+a+a+a),n=n+'</span><span class="hidden">'+e+'/</span><span itemprop="bestRating" class="hidden">5</span></span><!-- ovr-rating --><!-- this block created in js -->'}function tabRenderAbout(e){e.acf.infofull.length>0?$("#about").html('<h4 class="tab-block-headline">'+e.title.rendered+":</h4>"+e.acf.infofull):$("#about").html('<h4 class="tab-block-headline">'+e.title.rendered+":</h4>"+e.content.rendered)}function tabRenderDoc(e){if(e.acf.doc.length>0){$("#doc").append('<h4 class="tab-block-headline">'+currTitle+": "+translDocumentation+'</h4><div class="row"></div><!-- /.row -->');for(var a=e.acf.doc.length-1;a>=0;a--)$.get(currDomain+"/wp-json/wp/v2/doc/"+e.acf.doc[a].ID,function(e){$("#doc .row").append('<div class="col-md-12"><h5>'+e.title.rendered+'<a href="'+e.link+' " class="btn btn-gray" title="'+transDownloadPDF+'" target="_blank"><i class="fa fa-file-pdf-o"></i>'+transDownloadPDF+"</a></h5></div><!-- /.col-md-12 -->")})}}function tabRenderCustomers(e){if(e.acf.customers.length>0){$("#customers").append('<h4 class="tab-block-headline">'+currTitle+": "+translTheClientList+'</h4><div class="row"></div><!-- /.row -->');for(var a=e.acf.customers.length-1;a>=0;a--)$.get(currDomain+"/wp-json/wp/v2/customers/"+e.acf.customers[a].ID,function(e){$("#customers .row").append('<div class="col-md-4"><a href="'+e.link+'" title="'+e.title.rendered+'"><img src="'+e.acf.image+'" alt="'+e.title.rendered+'" title="'+e.title.rendered+'" /></a></div><!-- /.col-md-4 -->')})}}function tabRenderComments(e){(e.acf.reviews1name.length>0||e.acf.reviews2name.length>0||e.acf.reviews3name.length>0||e.acf.reviews4name.length>0||e.acf.reviews5name.length>0)&&($("#comments").append('<h4 class="tab-block-headline">'+currTitle+": "+transCustomerReviewsAndDealers+'</h4><div class="row"></div><!-- /.row -->'),e.acf.reviews1name&&$("#comments .row").append('<div class="tab-content-review"><img src="'+e.acf.reviews1img+'" alt="'+e.acf.reviews1name+"- "+e.acf.reviews1named+'" /><span class="reviews-author">'+e.acf.reviews1name+"<span>"+e.acf.reviews1named+"</span></span><p>"+e.acf.reviews1text+"</p></div><!-- /.tab-content-review -->"),e.acf.reviews2name&&$("#comments .row").append('<div class="tab-content-review"><img src="'+e.acf.reviews2img+'" alt="'+e.acf.reviews2name+"- "+e.acf.reviews2named+'" /><span class="reviews-author">'+e.acf.reviews2name+"<span>"+e.acf.reviews2named+"</span></span><p>"+e.acf.reviews2text+"</p></div><!-- /.tab-content-review -->"),e.acf.reviews3name&&$("#comments .row").append('<div class="tab-content-review"><img src="'+e.acf.reviews3img+'" alt="'+e.acf.reviews3name+"- "+e.acf.reviews3named+'" /><span class="reviews-author">'+e.acf.reviews3name+"<span>"+e.acf.reviews3named+"</span></span><p>"+e.acf.reviews3text+"</p></div><!-- /.tab-content-review -->"),e.acf.reviews4name&&$("#comments .row").append('<div class="tab-content-review"><img src="'+e.acf.reviews4img+'" alt="'+e.acf.reviews4name+"- "+e.acf.reviews4named+'" /><span class="reviews-author">'+e.acf.reviews4name+"<span>"+e.acf.reviews4named+"</span></span><p>"+e.acf.reviews4text+"</p></div><!-- /.tab-content-review -->"),e.acf.reviews5name&&$("#comments .row").append('<div class="tab-content-review"><img src="'+e.acf.reviews5img+'" alt="'+e.acf.reviews5name+"- "+e.acf.reviews5named+'" /><span class="reviews-author">'+e.acf.reviews5name+"<span>"+e.acf.reviews5named+"</span></span><p>"+e.acf.reviews5text+"</p></div><!-- /.tab-content-review -->"))}function displayVals(){var e=$("#diler-name-list").val(),a="li."+e;$(".nearby-diler-display").removeClass("nearby-diler-display"),$(a).addClass("nearby-diler-display")}!function(){for(var e,a=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],t=n.length,s=window.console=window.console||{};t--;)e=n[t],s[e]||(s[e]=a)}();var cityes={almatyi:"Алматы",belgorod:"Белгород",vinnitsa:"Винница",vladimir:"Владимир",volgograd:"Волгоград",ekaterinburg:"Екатеринбург",ivanovo:"Иваново",irkutsk:"Иркутск",kazan:"Казань",kaliningrad:"Калининград",kemerovo:"Кемерово",kiev:"Киев",krasnoyarsk:"Красноярск",moskva:"Москва",novosibirsk:"Новосибирск",orenburg:"Оренбург",petrozavodsk:"Петрозаводск",petushki:"Петушки",pyatigorsk:"Пятигорск","rostov-na-donu":"Ростов-на-Дону",ryazan:"Рязань",samara:"Самара","sankt-peterburg":"Санкт-Петербург",saratov:"Саратов",tver:"Тверь",tolyatti:"Тольятти",tula:"Тула",ulyanovsk:"Ульяновск",ufa:"Уфа",habarovsk:"Хабаровск",himki:"Химки",chelyabinsk:"Челябинск"};$(".open-search").on("click",function(){$(this).toggleClass("open-search-opened"),$("#searchform").toggleClass("searchform-show")}),$(".close-search").on("click",function(){$(".open-search").toggleClass("open-search-opened"),$("#searchform").toggleClass("searchform-show")}),$(".quont-plus").click(function(){var e=$(this).parent().find("input");+e[0].defaultValue;return e.val(parseInt(e.val())+1),e.change(),!1}),$(".quont-minus").click(function(){var e=$(this).parent().find("input"),a=(+e[0].defaultValue,parseInt(e.val())-1);return a=0>a?0:a,e.val(a),e.change(),!1}),$("select#diler-name-list").change(displayVals),$("#presentation a").on("click",function(){$("#bg-black").css({display:"block"}),$("#video-div").css({display:"block"})}),$(document).ready(function(){$("#presentation a").click(function(){return $("#bg-black").fadeIn("fast"),$("#video-div").fadeIn("fast"),!1}),$("#bg-black, #close").click(function(){return $("#bg-black").fadeOut("fast"),$("#video-div").fadeOut("fast"),$("#order-form").fadeOut("fast"),!1}),$(".checkbox-row").change(function(){$(this).is(":checked")?$(this).parent().addClass("selected"):$(this).parent().removeClass("selected")}),$("#presentation").mouseenter(function(){$("#hover-presentation").stop(),$("#hover-presentation").fadeIn(200)}).mouseleave(function(){$("#hover-presentation").stop(),$("#hover-presentation").fadeOut(200)}),$(".slct").click(function(){var e=$(this).parent().find(".drop");return e.is(":hidden")?(e.slideDown(),$(this).addClass("active")):($(this).removeClass("active"),e.slideUp()),!1}),$(".drop li").click(function(){var e=$(this).html(),a=$(this).parent();$(this).parent().parent().find("input").val(e),$(this).parent().parent().find(".slct").removeClass("active").html(e),a.slideUp()}),$("body").on("click",".minus",function(){var e=$(this).parent().find("input"),a=parseInt(e.val())-1;return a=0>a?0:a,e.val(a),e.change(),!1}),$("body").on("click",".plus",function(){var e=$(this).parent().find("input");return e.val(parseInt(e.val())+1),e.change(),!1}),$(".children").click(function(){return $(this).toggleClass("use").next().slideToggle("slow"),!1}),$("#menu-item-2227").click(function(){return $("#sub-menu").stop(),$("#sub-menu").slideToggle(600),!1}),$(".click-nav .menu .menu-item-depth-0").click(function(e){$(this).closest("li").find(".menu-depth-1").slideToggle(200),$(".clicker").toggleClass("use"),e.stopPropagation()}),$(".click-nav .menu .menu-item-depth-1").click(function(e){$(this).closest("li").find(".menu-depth-2").slideToggle(200),$(".clicker").toggleClass("use"),e.stopPropagation()}),$(".click-nav .menu .menu-item-depth-2").click(function(e){$(this).closest("li").find(".menu-depth-3").slideToggle(200),$(".clicker").toggleClass("use"),e.stopPropagation()}),$(".click-nav .menu .menu-item-depth-3").click(function(e){$(this).closest("li").find(".menu-depth-4").slideToggle(200),$(".clicker").toggleClass("use"),e.stopPropagation()}),$(".click-nav .menu .menu-item-depth-4").click(function(e){$(this).closest("li").find(".menu-depth-5").slideToggle(200),$(".clicker").toggleClass("use"),e.stopPropagation()}),$(".prodlink").click(function(){$("a").removeClass("selected"),$(this).addClass("selected")})}),$(document).on("click",".diller-tag",function(e){$(".current-term").removeClass("current-term"),$(".dealer-loop-current").removeClass("dealer-loop-current"),$(this).addClass("current-term");var a=$(this).attr("data-id");a="."+a,$(a).addClass("dealer-loop-current")}),$(document).on("click",".btn-order",function(e){$(".form-modal-order").addClass("display"),$(".form-modal-order .form-title").html(currTitle)}),$(document).on("click",".btn-callback",function(e){$(".form-modal-callback").addClass("display"),$(".form-modal-callback .form-title").html(currTitle)}),$(document).on("click",".btn-question",function(e){$(".form-modal-question").addClass("display"),$(".form-modal-question .form-title").html(currTitle)}),$(document).on("click",".form-modal-bgc",function(e){$(this).parent().removeClass("display")}),$(document).on("click",".form-modal-close",function(e){$(this).closest(".form-modal").removeClass("display")});