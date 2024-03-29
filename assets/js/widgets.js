jQuery(document).ready(function($) {

    var at_document = $(document);

    at_document.on('click','.custom_docile_button', function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        var docile_image_upload = $(this);
        var docile_title = $(this).data('title');
        var docile_button = $(this).data('button');
        var docile_input_val = $(this).prev();
        var docile_image_url_value = $(this).prev().prev().children('img');
        var docile_image_url = $(this).siblings('.img-preview-wrap');

        var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: docile_title,
            button: { text:  docile_button },
            library: { type: 'image' }
        });
        // Opens the media library frame.
        meta_image_frame.open();
        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var docile_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            docile_input_val.val(docile_attachment.url);
            if( docile_image_url_value !== null ){
                docile_image_url_value.attr( 'src', docile_attachment.url );
                docile_image_url.show();
                LATESTVALUE(docile_image_upload.closest("p"));
            }
        });
    });

   // Runs when the image button is clicked.
   jQuery('body').on('click','.docile-image-remove', function(e){
    $(this).siblings('.img-preview-wrap').hide();
    $(this).prev().prev().val('');
});
   
   var LATESTVALUE = function (wrapObject) {
    wrapObject.find('[name]').each(function(){
        $(this).trigger('change');
    });
};  

});
