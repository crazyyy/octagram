!function(){for(var e,o=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],s=n.length,c=window.console=window.console||{};s--;)e=n[s],c[e]||(c[e]=o)}(),$(".open-search").on("click",function(){$(this).toggleClass("open-search-opened"),$("#searchform").toggleClass("searchform-show")}),$(".close-search").on("click",function(){$(".open-search").toggleClass("open-search-opened"),$("#searchform").toggleClass("searchform-show")}),$("#presentation a").on("click",function(){$("#bg-black").css({display:"block"}),$("#video-div").css({display:"block"})});