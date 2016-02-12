$(function(){
    var cropImage = $('.crop-area img');
    var ow, oh;

    /** calculate image correction rate (because of max-width css parameter) */
    var imageCorrectionRate;
    $("<img/>")
        .attr("src", cropImage.attr("src"))
        .load(function() {
            ow = Math.floor($('.crop-area').width());
            oh = Math.floor($('.crop-area').height());
            imageCorrectionRate = this.width/ow;

            cropImage.Jcrop({
              onChange: showPreview,
              onSelect: showPreview,
              aspectRatio: 1,
              minSize: [50, 50],
              setSelect: [0, 0, 256, 256],
              allowSelect: false
            });
        });



    function showPreview(coords)
    {
        var rx = 256 / coords.w;
        var ry = 256 / coords.h;

        /** Resize thumbnail */
        $('.crop-preview-area > img').css({
            width: Math.round(rx * ow) + 'px',
            height: Math.round(ry * oh) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px'
        });

        /** Fill inputs */        
        if( imageCorrectionRate ){
            $('#crop_image_x').val(coords.x * imageCorrectionRate);
            $('#crop_image_y').val(coords.y * imageCorrectionRate);
            $('#crop_image_w').val(coords.w * imageCorrectionRate);
            $('#crop_image_h').val(coords.h * imageCorrectionRate);
        }
        
    }
});
