$(document).ready(function(){



    $('.raumDialog .abbrechen').on('click', function(){
        resetInput($('.raumDialog'));
        $('.raumDialog').find('input[type="hidden"]').prop('value', 0)

    })
    $('.raumList .editicon').on('click', function(){
        var $dialog = $('.raumDialog');
        var idInput = $dialog.find('input[type="hidden"]');
        var _this = this;
        var parent = $(_this).parent().parent()[0];
        var raum_ID = parent.dataset.raumid;
        $.ajax({
            url :'ajaxResponder.php?action=getRaum',
            method: 'GET',
            dataType: 'json',
            data:{id:raum_ID}
        }).done(function(data){
            if(data.status){
                // debugger
                idInput.val(raum_ID);
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

                    checkboxInputs.prop('checked', false);
                    for(var key in result['eignung']){
                        checkboxInputs.each(function(index, ele){
                            ele = $(ele);
                            var eleVal = ele.val();
                                if(eleVal == key){
                                    ele.prop('checked', true);
                                }
                        }) 
                    }
            }
        })
    })

    // input search
    $('.raumList #inputSearch').on('keyup', function(){
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



    // delete 
      $('.raumList .deleteicon').on('click', function(){
        var raumid = $('.' + $(this).data('parentele')).data('raumid');
            alertify.confirm(
                'Raum löschen', 
                'Möchten Sie diesen raum aus der Datenbank löschen.?',
                function(){ 
                    console.log('okokokokokok')
                    //alertify.success('success')
                     $.ajax({
                        method: 'POST',
                        url: 'ajaxResponder.php?action=deleteRaum',
                        dataType: 'json',
                        data: {'id': raumid}
                    }).done(function(data){
                        $('.raum_' + raumid).remove();
                        $('.listAnzahl').html($('.listEle').length + " ");
                        alertify.success('Raum wurde gelöscht...');
                    })
                },
                function(){ alertify.error('Cancel')}
            ).set('labels', {ok:'Bestätigen', cancel:'abrechen'});
      })



      // save 
      $('.raumDialog .speichern').on('click', function(){
        var $dialog = $('.raumDialog');
        var raum_ID = $('.raumDialog').find('input[type="hidden"]').val();
        var textInputs = $dialog.find('input[type="text"]');
        var checkboxInputs = $dialog.find('input[type="checkbox"]');
        var dateInput = $dialog.find('input[type="date"]');

        var param = {};
        param['eignung'] = [];
        textInputs.each(function(index, ele){
            ele = $(ele);
            var eleName = ele.attr('name');
            param[eleName] = ele.val();
        })
        checkboxInputs.each(function(index, ele){
            ele = $(ele);
            if(ele.prop('checked') == true) {
                param['eignung'].push(ele.val());
            }
        })
        var append = '<div class="listEle raum_'+raum_ID+'" data-raumid="'+raum_ID+'">\
                            <div class="listEleLeft">\
                                <p>'+param['Raumnr']+'</p>\
                            </div>\
                            <div class="listEleRight">\
                                    <img class="editicon" src="assets/media/edit.png" alt="edit">\
                                    <img class="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deleteraumModal">\
                            </div>\
                        </div>';
       // debugger
        if(raum_ID){
        // update
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=updateRaum&id=' + raum_ID,
                dataType: 'json',
                data: param
            }).done(function(data){
                var html = param['Raumnr'];
                $('.listEle.raum_' + raum_ID + ' .listEleLeft p').html(html);
                resetInput($('.raumDialog'));
                alertify.success('Datensatz gespeichert');
            }).fail(function() {
                alertify.error('Datensatz gespeichert');
                
              })
        }
        else{
            // neuer Datensatz
            $.ajax({
                method: 'POST',
                url: 'ajaxResponder.php?action=saveRaum',
                dataType: 'json',
                data: param
            }).done(function(data){
                $('.listBody').append($(append));
                resetInput($('.raumDialog'));
            })
        }
      })


})



