function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("product_image").files[0]);
    oFReader.onload = function (oFREvent) {
        document.getElementById("placeholderimg").src = oFREvent.target.result;
        
    };
};

/*$(document).ready(function(){
    $("#placeholderimg").
});*/

 // Appending Social Icons To Items
 $('.add-social').on('click',function(){
    var text = $(this).data('text');
    $('#social-section').append(`
        <div class="d-flex">
            <div>
                <div class="form-group">
                    <button
                        class="btn btn-secondary social-picker"
                        name="social_icons[]"
                        data-icon="fab fa-font-awesome">
                    </button>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="form-group mb-1"><input type="text"
                        class="form-control"
                        name="social_links[]"
                        placeholder="${text}">
                </div>
            </div>
            <div class="flex-btn">
                <button type="button"
                    class="btn btn-danger remove-social">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
    `);

    $('.social-picker').iconpicker();

}); 









