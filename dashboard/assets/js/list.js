$(document).ready(function(){

    
    $('.addicon').on('click', function(){
        var _this = $(this);
        $('.dozentDialog').removeClass('d-none');
    })

    $('.dozentDialog .btn-secondary').on('click', function(){
        var _this = this;
        $(_this.dataset.tohide).addClass(' d-none');

    })

    $('.editicon').on('click', function(){
        var _this = this;
        var parent = $(_this).parent().parent()[0];
        var Dozent_ID = parent.dataset.dozentid;
        var mm = 10;
        $.ajax({
            url :'ajaxResponder.php?action=get&type=Dozent',
            method: 'GET',
            dataType: 'json',
            data:{id:Dozent_ID}
        }).done(function(data){
            console.log(data);
        })
        
    })

    // input search
    $('#inputSearch').on('keyup', function(){
        var _this = $(this);
        var _thisVal = _this.val();
        var regex = new RegExp(_thisVal);
        var listEleLeft = $('.listEleLeft');
        listEleLeft.each(function(index, ele){
            var ele = $(ele);
            var eleParent = ele.parent();
            var eleText = ele.text();
            if(eleText.match(regex)){
                eleParent.show();
            }else{
                eleParent.hide();
            }
        })
    })



    // Delete
    $('#deleteDozentModal').on('show.bs.modal', function (e) {
        var dozentid = $(e.relatedTarget).parent().parent()[0].dataset.dozentid;
        $('#deleteDozentModal').data('dozentid', dozentid)
        
      })
      $('#deleteDozentModal').on('click', '.btn-danger', function (e) {
        var _this = $('#deleteDozentModal');
        var dozentid = $('#deleteDozentModal').data('dozentid');
        $.ajax({
            method: 'POST',
            url: 'ajaxResponder.php?action=delete&type=Dozent',
            dataType: 'json',
            data: {'id': dozentid}
        }).done(function(data){
            console.log(data);
            $('.dozent_' + dozentid).remove();
            $('.listAnzahl').html($('.listEle').length + " ");
            _this.modal('hide');
        })
      })
})



