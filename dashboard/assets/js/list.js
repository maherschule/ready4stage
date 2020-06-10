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


