$(document).ready(function(){

    


    $('.schuelerDialog .abbrechen').on('click', function(){
        resetInput($('.schuelerDialog'));
        $('.raumDialog').find('input[type="hidden"]').val(0);

    })

    $('.schuelerList .editicon').on('click', function(){
        var $dialog = $('.schuelerDialog');
        var idInput = $dialog.find('input[type="hidden"]');
        var _this = this;
        var parent = $(_this).parent().parent()[0];
        var schueler_ID = parent.dataset.schuelerid;
        var mm = 10;
        $.ajax({
            url :'ajaxResponder.php?action=get&type=schueler',
            method: 'GET',
            dataType: 'json',
            data:{id:schueler_ID}
        }).done(function(data){
            if(data.status){
                idInput.val(schueler_ID);
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
            }
        })
    })

    // input search
    $('.schuelerList #inputSearch').on('keyup', function(){
        console.log("asdasd")
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
    $('#deleteSchuelerModal').on('show.bs.modal', function (e) {
        var schuelerid = $(e.relatedTarget).parent().parent()[0].dataset.schuelerid;
        $('#deleteSchuelerModal').data('schuelerid', schuelerid)
        
      })
      $('#deleteSchuelerModal').on('click', '.btn-danger', function (e) {
        var _this = $('#deleteSchuelerModal');
        var schuelerid = $('#deleteSchuelerModal').data('schuelerid');
        $.ajax({
            method: 'POST',
            url: 'ajaxResponder.php?action=delete&type=schueler',
            dataType: 'json',
            data: {'id': schuelerid}
        }).done(function(data){
            console.log(data);
            $('.schueler_' + schuelerid).remove();
            $('.listAnzahl').html($('.listEle').length + " ");
            _this.modal('hide');
            alertify.success('Datensatz wurde gelöscht');

        })
      })


      $('.schuelerDialog .speichern').on('click', function(){
        var $dialog = $('.schuelerDialog');

        var schueler_ID = $('.schuelerDialog').find('input[type="hidden"]').val();
        var textInputs = $dialog.find('input[type="text"]');
        var checkboxInputs = $dialog.find('input[type="checkbox"]');
        var dateInput = $dialog.find('input[type="date"]');

        var param = {};
        /*
        param['qualifikation'] = [];
        */
        param['Geburtsdatum'] = dateInput.val(); 
        textInputs.each(function(index, ele){
            ele = $(ele);
            var eleName = ele.attr('name');
            param[eleName] = ele.val();
        })
        /*
        checkboxInputs.each(function(index, ele){
            ele = $(ele);
            if(ele.prop('checked') == true) {
                param['qualifikation'].push(ele.val());
            }
        })
        */
        var append = '<div class="listEle schueler_'+schueler_ID+'" data-schuelerid="'+schueler_ID+'">\
                            <div class="listEleLeft">\
                                <p>'+param['Nachname']+', '+param['Vorname']+'</p>\
                            </div>\
                            <div class="listEleRight">\
                                    <img class="editicon" src="assets/media/edit.png" alt="edit">\
                                    <img class="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deleteSchuelerModal">\
                            </div>\
                        </div>';
        if(Boolean(Number(schueler_ID))){
        // update
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=update&type=schueler&id=' + schueler_ID,
                dataType: 'json',
                data: param
            }).done(function(data){
                var html = param['Vorname'] + ", " + param['Nachname'];
                $('.listEle.schueler_' + schueler_ID + ' .listEleLeft p').html(html);
                resetInput($('.schuelerDialog'));
                alertify.success('die Daten sind gespeichert');

            })
        }
        else{
            // neuer Datensatz
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=create&type=schueler',
                dataType: 'json',
                data: param
            }).done(function(data){
                $('.listBody').append($(append));
                resetInput($('.schuelerDialog'));
                alertify.success('Success message');
                alertify.success('die Daten sind gespeichert');
            })
        }
      })


})



