jQuery(function($){
    $(window).load(function(){
        if (typeof regionPage != 'undefined') {
            var canvas = $('#ata_region_points').children('canvas').get(0);
            var design = new fabric.Canvas(canvas, {
                selection: false,
                hoverCursor: 'normal',
                rotationCursor: 'default',
                centeredScaling: true
            });
            var designWidth = $('#ata_region_points').width();
            design.setHeight(500);
            design.setWidth(designWidth);
            design.setBackgroundColor("#cfcfcf");
            var imageInstance= new fabric.Image(document.getElementById('ata_regionMapImage'), {
                top: 0,
                left: 0,
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
            var pinimageInstance= new fabric.Image(document.getElementById('ata_pinImage'), {
                top: parseInt(ata_positions.y),
                left:parseInt(ata_positions.x),
                scaleX: 1,
                scaleY: 1,
                hoverCursor: 'pointer',
                lockMovementX: false,
                lockMovementY: false,
                lockRotation: true,
                lockScalingX: true,
                lockScalingY: true,
                lockUniScaling: true,
                hasBorders:false,
                hasControls:false
            });

             design.add(imageInstance);
             design.add(pinimageInstance);

          //  setTimeout(function(){

                $.each(ata_all_positions,function(k,v){
                    var dotimageInstance= new fabric.Image(document.getElementById('ata_dotImage'), {
                        top: parseInt(v.y)+26,
                        left:parseInt(v.x)+13,
                        scaleX: 1,
                        scaleY: 1,
                        hoverCursor: 'normal',
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
            design.renderAll();

           // },2000);

            design.on({
                'object:moving': function(opts) {
                    var X = Math.round(opts.target.left);
                    var Y = Math.round(opts.target.top);
                   $("#ata_pos_x").val(X);
                   $("#ata_pos_y").val(Y);
                }
            });

        }
    });

});
