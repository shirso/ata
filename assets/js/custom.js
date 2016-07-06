jQuery(function($){
    var windowWidth = $(window).width();
    var cyclic_div=$("#cyclic_slider_div");
    var all_cyclic_divs=cyclic_div.find(".cyclic_divs");
    var cyclic_div_count=all_cyclic_divs.length;
    var column_count=Math.round(12/(cyclic_div_count-1));
    var active_div=0;
    var categories=[];
    var tags=[];
    var $content = $('#ata_main_content'),
        offset = $('#ata_main_content').find('.grid-item').length,
        $loader = $('#ata_load_more_button'),
        first_time_load=true;
   $content.masonry({
        itemSelector: '.grid-item'
    });
    var load_ajax_posts=function(postData,clearData){
        if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
            if(typeof clearData!="undefined"){
                offset=0;
            }
            //var data = {
            //    'action': 'get_more_posts',
            //    'offset': offset,
            //    'cat':categories,
            //    'tag':tags
            //};
            $loader.addClass("post_loading_loader");
            $content.block({message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            });
            $.post(ata_data.ajaxurl, postData, function(response) {
                if(typeof clearData!="undefined"){
                    $content.masonry('destroy');
                    $content.html("");
                    first_time_load=true;
                }
                var response=$.parseJSON(response);
                var $data = $(response.html);
                var counting=response.count;
                //$content.imagesLoaded(function(){
                //    $content.masonry({
                //        itemSelector: '.grid-item'
                //    });
                //});
                $content.masonry({
                           itemSelector: '.grid-item'
                       });
                if(first_time_load) {
                    $content.prepend($data).imagesLoaded(function () {
                        //$content.masonry({
                        //        itemSelector: '.grid-item'
                        //        });
                        $content.masonry('prepended', $data, true);
                    });

                }else{
                    $content.append($data).imagesLoaded(function () {
                        $content.masonry('appended', $data, true);
                    });
                }

                $content.unblock();
                first_time_load=false;
                $loader.removeClass("post_loading_loader");
                console.log($('#ata_main_content').find('.grid-item').length);
                if($('#ata_main_content').find('.grid-item').length >= counting){
                    $loader.parent().hide();
                }else{
                    $loader.parent().show();
                }
            });
            offset+= parseInt(ata_data.posts_per_page);

        }

    };
    all_cyclic_divs.each(function(k,v){
        if(k==0){
            $("#slider_content_show").html($(v).find(".slider_content").html());
        }
        if(k>0){
            var html="";
            html+='<div class="col-sm-'+column_count+'">';
            html+='<div class="mm-btnn">';
            html+=$(v).find(".slider_button_content").html();
            html+='</div>';
            html+='</div>';
        }
        $("#slider_button_show").append(html);
    });
    $(document).on("click",".cyclic_button",function(e){
        e.preventDefault();
        var counting=$(this).data("counting");
        $("#slider_content_show").html($("#slider_no_"+counting).find(".slider_content").html());
        $(this).parent().html($("#slider_no_"+active_div).find(".slider_button_content").html());
        active_div=counting;
    });
    $(document).ready(function(){
        //jQuery('input, textarea').placeholder();
        //jQuery('.news ul li:last-child').css({ borderBottom: 'none' });


        $(".pg_header .navbar-nav>li,.pg_header_2 .navbar-nav>li").click(function (e) {
            if (windowWidth > 768) {
                $(this).find('.d-down').slideDown();
            }
            else { $(this).find('.d-down').slideToggle(); }
        });

        $(".srch").click(function (e) {
            e.preventDefault();
            if (windowWidth > 768) {
                $(".srch-frm").slideToggle(200);
            }
        });


        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            auto: true,
            speed:2000
        });
        $(".flltrbtn").click(function (e) {
            e.preventDefault();
            $(".oppflt").slideToggle(300);
        });

        $(".flt-bxx>ul>li").click(function (e) {
            $(this).find("ul").slideToggle();
        });


        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 50) {
                $('.pg_header .lg-sec').addClass('lgsrl');
                $('.pg_header_2').addClass('stkyhdr');
                $('.pg_header:after').css("height","170%");
                $('.navbar').addClass('tpup');
                $('.hedlnk-sec').addClass('tpup2');
                $('.totop-btn').addClass('dnon');
            }
            else {
                $('.lg-sec').removeClass('lgsrl');
                $('.pg_header_2').removeClass('stkyhdr');
                $('.pg_header:after').css("height","260%");
                $('.navbar').removeClass('tpup');
                $('.hedlnk-sec').removeClass('tpup2');
                $('.totop-btn').removeClass('dnon');
            }
        });

        $(".totop-btn").click(function () {
            $('html, body').animate({
                scrollTop: "0px"
            }, 400);
        });


    });
    $(window).on( 'resize', function () {
        windowWidth=$(window).width();
    });
    $(".nbartgl").click(function () {
        if (windowWidth < 768) {
            $(this).toggleClass("shnbtn");
            $(".hedlnk-sec").toggleClass("fl");
            $(".navbar-collapse").toggleClass("fl2");
        }
    })
    $(window).load(function(){
        if(typeof region_map!="undefined"){
            var canvas = $('#ata_region_map').children('canvas').get(0);
            var design = new fabric.Canvas(canvas, {
                selection: false,
                hoverCursor: 'normal',
                rotationCursor: 'default',
                centeredScaling: true
            });
            design.allowTouchScrolling = true;
            var designWidth = $('#ata_region_map').width();
            design.setHeight(500);
            design.setWidth(designWidth);
            var imageInstance= new fabric.Image(document.getElementById('ata_regionMapImage'), {
                top: 0,
                left: 0,
                id:"mainImage",
                scaleX: 1,
                scaleY: 1,
                lockMovementX: true,
                lockMovementY: true,
                lockRotation: true,
                lockScalingX: true,
                lockScalingY: true,
                lockUniScaling: true,
                hasBorders:false,
                hasControls:false
            });
            design.add(imageInstance);
            setTimeout(function(){
                $.each(ata_all_positions,function(k,v){
                    var dotimageInstance= new fabric.Image(document.getElementById('ata_dotImage'), {
                        top: parseInt(v.top)+26,
                        left:parseInt(v.left)+13,
                        id: v.id,
                        scaleX: 1,
                        scaleY: 1,
                        hoverCursor: 'pointer',
                        lockMovementX: true,
                        lockMovementY: true,
                        lockRotation: true,
                        lockScalingX: true,
                        lockScalingY: true,
                        lockUniScaling: true,
                        hasBorders:false,
                        hasControls:false
                    });
                    design.add(dotimageInstance);
                });
            },2000)
            design.on({
                'object:selected': function(opts) {
                     if (typeof opts.target.id != 'undefined') {
                          var id=  opts.target.id;
                         var objects=design.getObjects();
                         for (var i in objects) {
                             if(objects[i].id=="mainImage"){
                                 continue;
                             }
                             if(objects[i].id===id){
                                 objects[i].set({scaleX:1.5,scaleY:1.5});
                                 objects[i].filters.push(new fabric.Image.filters.Tint({color: '#996604'}));
                                 objects[i].applyFilters(design.renderAll.bind(design));
                                 loadRegionData(id);
                             }else{
                                 objects[i].set({scaleX:1,scaleY:1});
                                 objects[i].filters.push(new fabric.Image.filters.Tint({color: '#292f3d'}));
                                 objects[i].applyFilters(design.renderAll.bind(design));
                             }
                         }
                    }
                }
            });
        }
        $('.grid').masonry({
            itemSelector: '.grid-item'
        });
        if(typeof BlogInfiniteScroll!="undefined") {
            load_ajax_posts({
                'action': 'get_more_posts',
                'offset': offset,
                'cat':categories,
                'tag':tags
            });
        }
    });
$(document).on("change","#ata_regional_contact",function(e){
   loadRegionalContactData($(this).val());
});

    var loadRegionData=function(regionId){
        $('#ata_region_content').block({message: null,
            overlayCSS: {
                background: 'transparent',
                opacity: 0.6
            }
        });
        var data = {
            'action': 'get_region_data',
            'regionId': regionId
        };
        $.post(ata_data.ajaxurl, data, function(response) {
           $("#ata_region_content").html(response);
           $("#ata_region_content").unblock();
        });
    };
    var loadRegionalContactData=function(termId){
        $('#ata_regional_contact_show').block({message: null,
            overlayCSS: {
                background: 'transparent',
                opacity: 0.6
            }
        });
        var data = {
            'action': 'get_regional_contact_data',
            'termId': termId
        };
        $.post(ata_data.ajaxurl, data, function(response) {
            $("#ata_regional_contact_show").html(response);
            $("#ata_regional_contact_show").unblock();
        });
    };
    loadRegionalContactData($("#ata_regional_contact").val());
    $(document).on("click",".ata_toggle_button",function(e){
        e.preventDefault();
        var parentRow= $(this).closest('.row'),
            categorySlug=$(this).data('category'),
            thisParent=$(this).parent(),
            nextRow=parentRow.next();
        if(thisParent.hasClass("acctv")){
            return false;
        }
        $('.display_toggle').slideUp('slow');
        $(nextRow).html('');
        $(nextRow).slideDown('slow');
        $(nextRow).block({message: null,
            overlayCSS: {
                background: 'transparent',
                opacity: 0.6
            }
        });
        var data = {
            'action': 'get_society_data',
            'category': categorySlug
        };
        $.post(ata_data.ajaxurl, data, function(response) {
            $(nextRow).html(response);
            $(nextRow).unblock();
            $('.lsst-btn').removeClass('acctv');
            $(thisParent).addClass('acctv');
            $(".display_toggle").not(nextRow).hide("slow");
        });
    });
    $(document).on("click",".ata_toggle_more_button",function(e){
        e.preventDefault();
        var $this = $(this),
            toggleDiv=$this.prev();
        $(toggleDiv).slideToggle('slow');
        $this.toggleClass('ata_show');
        if ($this.hasClass('ata_show')) {
            $this.text(ata_data.less_text+'...');
        } else {
            $this.text(ata_data.more_text+'...');
        }
    });
    $(document).on("click","#ata_load_more_button",function(e){
        e.preventDefault();
        if(typeof BlogInfiniteScroll!="undefined" ) {
            load_ajax_posts({
                'action': 'get_more_posts',
                'offset': offset,
                'cat': categories,
                'tag': tags
            });
        }
    });
    $(document).on("change",".filter_checkbox",function(){
        var val=parseInt($(this).val());
        var type=$(this).data("type");
        switch (type){
            case "category":
                if(this.checked) {
                    categories.push(val);
                }else{
                    categories=_.without(categories,val);
                }
                break;
            case "tag":
                if(this.checked) {
                    tags.push(val);
                }else{
                    tags=_.without(tags,val);
                }
                break;
        }
        offset=0;
        if(typeof BlogInfiniteScroll!="undefined" ) {
            load_ajax_posts({
                'action': 'get_more_posts',
                'offset': offset,
                'cat':categories,
                'tag':tags
            },true);
        }
    });
    $(document).on("click","#ata_back_button",function(e){
        parent.history.back();
        return false;
    });
});