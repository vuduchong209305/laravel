$(document).ready(function(){

	$('body, html').on('click', '.checkall', function(e){
		var table = $(e.target).closest('table');
		$('td input:checkbox',table).prop('checked',this.checked);
	})

    $('.btn_select').click(function(){
        $(".imgUpload").click();
    })

    $('.imgUpload').change(function(){

        if (this.files && this.files[0]) {

            // Kiểm tra file có phải là ảnh không ?
            var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(this.files[0]['type'], ValidImageTypes) < 0) {
                alert('Vui lòng chọn đúng định dạng ảnh');
                return false;
            }

            // Kiểm tra dung lượng file
            if(niceBytes(this.files[0].size) > 2) {
                alert('Dung lượng ảnh là ' + niceBytes(this.files[0].size) + 'MB, đã vượt quá 2MB, vui lòng chọn ảnh khác !');
                return false;
            }

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.preview_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    })

    // Quy đổi sang MB
    function niceBytes(x){
        let l = 0, n = parseInt(x, 10) || 0;
        while(n >= 1024 && ++l)
            n = n/1024;
        return(n.toFixed(n >= 10 || l < 1 ? 0 : 1));
    }

    $('.remove_preview').click(function(){

        $('.preview_image').attr('src', "/storage/app/avatar/no_image.png" );
        $('.imgUpload').val('');

    })

});