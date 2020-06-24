$(document).ready(function(){

    
    $('.dozentDialog .abbrechen').on('click', function(){
        resetInput($('.schuelerDialog'));
        $('.raumDialog').find('input[type="hidden"]').val(0);

    })
    $('.dozentDialog .btn-secondary').on('click', function(){
        var _this = this;
        $(_this.dataset.tohide).addClass(' d-none');

    })

    $('.dozentList .editicon').on('click', function(){
        var $dialog = $('.dozentDialog');
        var idInput = $dialog.find('input[type="hidden"]');
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
            if(data.status){
                idInput.val(Dozent_ID);
                var result = data.data[0];     
                var textInputs = $dialog.find('input[type="text"]');
                var checkboxInputs = $dialog.find('input[type="checkbox"]');
                var dateInput = $dialog.find('input[type="date"]');
                
                textInputs.each(function(index, ele){
                    ele = $(ele)
                    var eleName = ele.attr('name');
                    for(var key in result){

                        if(key === eleName){
                            var value = result[key];
                            ele.val(value);
                        }
                    }
                })
                if(result['Geburtsdatum']){
                    dateInput.val(result['Geburtsdatum']);
                }
                if(result['qualifikation']){
                    checkboxInputs.attr('checked', false);
                    for(var key in result['qualifikation']){
                        
                        checkboxInputs.each(function(index, ele){
                            ele = $(ele);
                            var eleVal = ele.val();
                                if(eleVal == key){
                                    ele.prop('checked', true);
                                }
                        }) 
                    }
                }
            }
        })
    })

    // input search
    $('.dozentList #inputSearch').on('keyup', function(){
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
    $('#deletedozentModal').on('show.bs.modal', function (e) {
        var dozentid = $(e.relatedTarget).parent().parent()[0].dataset.dozentid;
        $('#deletedozentModal').data('dozentid', dozentid)
        
      })
      $('#deletedozentModal').on('click', '.btn-danger', function (e) {
        var _this = $('#deletedozentModal');
        var dozentid = $('#deletedozentModal').data('dozentid');
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


      $('.dozentDialog .btn').on('click', function(){
        var $dialog = $('.dozentDialog');

        var Dozent_ID = $('.dozentDialog').find('input[type="hidden"]').val();
        var textInputs = $dialog.find('input[type="text"]');
        var checkboxInputs = $dialog.find('input[type="checkbox"]');
        var dateInput = $dialog.find('input[type="date"]');

        var param = {};
        param['qualifikation'] = [];
        param['Geburtsdatum'] = dateInput.val(); 
        textInputs.each(function(index, ele){
            ele = $(ele);
            var eleName = ele.attr('name');
            param[eleName] = ele.val();
        })
        checkboxInputs.each(function(index, ele){
            ele = $(ele);
            if(ele.prop('checked') == true) {
                param['qualifikation'].push(ele.val());
            }
        })
        var append = '<div class="listEle dozent_'+Dozent_ID+'" data-dozentid="'+Dozent_ID+'">\
                            <div class="listEleLeft">\
                                <p>'+param['Nachname']+', '+param['Vorname']+'</p>\
                            </div>\
                            <div class="listEleRight">\
                                    <img class="editicon" src="assets/media/edit.png" alt="edit">\
                                    <img class="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deleteDozentModal">\
                            </div>\
                        </div>';
        if(Boolean(Number(Dozent_ID))){
        // update
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=update&type=Dozent&id=' + Dozent_ID,
                dataType: 'json',
                data: param
            }).done(function(data){
                var html = param['Vorname'] + ", " + param['Nachname'];
                $('.listEle.dozent_' + Dozent_ID + ' .listEleLeft p').html(html);
                resetInput($('.dozentDialog'));
            })
        }
        else{
            // neuer Datensatz
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=create&type=Dozent',
                dataType: 'json',
                data: param
            }).done(function(data){
                $('.listBody').append($(append));
                resetInput($('.dozentDialog'));

            })
        }
      })
})



