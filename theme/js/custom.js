function total(){
    var total = 0;

    design = $("input[name='BaseDesign']:checked").val();
    if(design){
        if($('#design'+design).val() != ''){
            total += parseFloat($('#design'+design).val());
            $('#design_hid').val(parseFloat($('#design'+design).val()));
        }
    }

    cate1 = $("input[name='cate1']:checked").val();
    if(cate1){
        if($('#cate_text'+cate1).val() != '' && $('#cate_text'+cate1).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate1).val());
            $('#catetext1').val(parseFloat($('#cate_text'+cate1).val()));
        }
    }

    cate2 = $("input[name='cate2']:checked").val();
    if(cate2){
        if($('#cate_text'+cate2).val() != '' && $('#cate_text'+cate2).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate2).val());
            $('#catetext2').val(parseFloat($('#cate_text'+cate2).val()));
        }
    }

    cate3 = $("input[name='cate3']:checked").val();
    if(cate3){
        if($('#cate_text'+cate3).val() != '' && $('#cate_text'+cate3).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate3).val());
            $('#catetext3').val(parseFloat($('#cate_text'+cate3).val()));
        }
    }

    cate4 = $("input[name='cate4']:checked").val();
    if(cate4){
        if($('#cate_text'+cate4).val() != ''  && $('#cate_text'+cate4).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate4).val());
            $('#catetext4').val(parseFloat($('#cate_text'+cate4).val()));
        }
    }

    for (var i = 0; i <= 4; i++) {
        qty     = $('#cate5qty'+i).val();
        rate    = $('#cate5text'+i).val();
        if(qty != '' && rate != '' && rate != 'inc'){
            total += parseFloat(qty) * parseFloat(rate);
        }
    }

    cate6 = $("input[name='cate6']:checked").val();
    if(cate6){
        if($('#cate_text'+cate6).val() != ''  && $('#cate_text'+cate6).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate6).val());
            $('#catetext6').val(parseFloat($('#cate_text'+cate6).val()));
        }
    }

    cate7 = $("input[name='cate7']:checked").val();
    if(cate7){
        if($('#cate_text'+cate7).val() != ''  && $('#cate_text'+cate7).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate7).val());
            $('#catetext7').val(parseFloat($('#cate_text'+cate7).val()));
        }
    }

    cate8 = $("input[name='cate8']:checked").val();
    if(cate8){
        if($('#cate_text'+cate8).val() != ''  && $('#cate_text'+cate8).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate8).val());
            $('#catetext8').val(parseFloat($('#cate_text'+cate8).val()));
        }
    }

    for (var i = 0; i <= 2; i++) {
        rate        = $('#cate9text'+i).val();
        if($('#cate9'+i).is(":checked") && rate != '' && rate != 'inc'){
            total += parseFloat(rate);
        }
    }

    cate10 = $("input[name='cate10']:checked").val();
    if(cate10){
        if($('#cate_text'+cate10).val() != ''  && $('#cate_text'+cate10).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate10).val());
            $('#catetext10').val(parseFloat($('#cate_text'+cate10).val()));
        }
    }

    cate11 = $("input[name='cate11']:checked").val();
    if(cate11){
        if($('#cate_text'+cate11).val() != ''  && $('#cate_text'+cate11).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate11).val());
            $('#catetext11').val(parseFloat($('#cate_text'+cate11).val()));
        }
    }

    for (var i = 0; i <= 3; i++) {
        rate        = $('#cate12text'+i).val();
        if($('#cate12'+i).is(":checked") && rate != '' && rate != 'inc'){
            total += parseFloat(rate);
        }
    }

    cate13 = $("input[name='cate13']:checked").val();
    if(cate13){
        if($('#cate_text'+cate13).val() != ''  && $('#cate_text'+cate13).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate13).val());
            $('#catetext13').val(parseFloat($('#cate_text'+cate13).val()));
        }
    }

    for (var i = 0; i <= 3; i++) {
        rate        = $('#cate14text'+i).val();
        if($('#cate14'+i).is(":checked") && rate != '' && rate != 'inc'){
            total += parseFloat(rate);
        }
    }

    cate15 = $("input[name='cate15']:checked").val();
    if(cate15){
        if($('#cate_text'+cate15).val() != ''  && $('#cate_text'+cate15).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate15).val());
            $('#catetext15').val(parseFloat($('#cate_text'+cate15).val()));
        }
    }

    cate16 = $("input[name='cate16']:checked").val();
    if(cate16){
        if($('#cate_text'+cate16).val() != ''  && $('#cate_text'+cate16).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate16).val());
            $('#catetext16').val(parseFloat($('#cate_text'+cate16).val()));
        }
    }

    cate17 = $("input[name='cate17']:checked").val();
    if(cate17){
        if($('#cate_text'+cate17).val() != ''  && $('#cate_text'+cate17).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate17).val());
            $('#catetext17').val(parseFloat($('#cate_text'+cate17).val()));
        }
    }

    cate18 = $("input[name='cate18']:checked").val();
    if(cate18){
        if($('#cate_text'+cate18).val() != ''  && $('#cate_text'+cate18).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate18).val());
            $('#catetext18').val(parseFloat($('#cate_text'+cate18).val()));
        }
    }

    cate19 = $("input[name='cate19']:checked").val();
    if(cate19){
        if($('#cate_text'+cate19).val() != ''  && $('#cate_text'+cate19).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate19).val());
            $('#catetext19').val(parseFloat($('#cate_text'+cate19).val()));
        }
    }

    cate20 = $("input[name='cate20']:checked").val();
    if(cate20){
        if($('#cate_text'+cate20).val() != ''  && $('#cate_text'+cate20).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate20).val());
            $('#catetext20').val(parseFloat($('#cate_text'+cate20).val()));
        }
    }

    cate21 = $("input[name='cate21']:checked").val();
    if(cate21){
        if($('#cate_text'+cate21).val() != ''  && $('#cate_text'+cate21).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate21).val());
            $('#catetext21').val(parseFloat($('#cate_text'+cate21).val()));
        }
    }

    cate22 = $("input[name='cate22']:checked").val();
    if(cate22){
        if($('#cate_text'+cate22).val() != ''  && $('#cate_text'+cate22).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate22).val());
            $('#catetext22').val(parseFloat($('#cate_text'+cate22).val()));
        }
    }

    cate23 = $("input[name='cate23']:checked").val();
    if(cate23){
        if($('#cate_text'+cate23).val() != ''  && $('#cate_text'+cate23).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate23).val());
            $('#catetext23').val(parseFloat($('#cate_text'+cate23).val()));
        }
    }

    cate24 = $("input[name='cate24']:checked").val();
    if(cate24){
        if($('#cate_text'+cate24).val() != ''  && $('#cate_text'+cate24).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate24).val());
            $('#catetext24').val(parseFloat($('#cate_text'+cate24).val()));
        }
    }

    for (var i = 0; i <= 5; i++) {
        qty     = $('#cate25qty'+i).val();
        rate    = $('#cate25text'+i).val();
        
        if(qty != '' && rate != '' && rate != 'inc'){
            total += parseFloat(qty) * parseFloat(rate);
        }
    }

    for (var i = 0; i <= 19; i++) {
        qty     = $('#cate26qty'+i).val();
        rate    = $('#cate26text'+i).val();
        
        if(qty != '' && rate != '' && rate != 'inc'){
            total += parseFloat(qty) * parseFloat(rate);
        }
    }

    

    for (var i = 0; i <= 3; i++) {
        rate        = $('#cate27text'+i).val();
        if($('#cate27'+i).is(":checked") && rate != '' && rate != 'inc'){
            total += parseFloat(rate);
        }
    }

    cate28 = $("input[name='cate28']:checked").val();
    if(cate28){
        if($('#cate_text'+cate28).val() != ''  && $('#cate_text'+cate28).val() != 'inc'){
            total += parseFloat($('#cate_text'+cate28).val());
            $('#catetext28').val(parseFloat($('#cate_text'+cate28).val()));
        }
    }

    for (var i = 0; i <= 10; i++) {
        qty     = $('#cate29qty'+i).val();
        rate    = $('#cate29text'+i).val();
        
        if(qty != '' && rate != '' && rate != 'inc'){
            total += parseFloat(qty) * parseFloat(rate);
        }
    }

    for (var i = 0; i <= 12; i++) {
        qty     = $('#cate30qty'+i).val();
        rate    = $('#cate30text'+i).val();
        
        if(qty != '' && rate != '' && rate != 'inc'){
            total += parseFloat(qty) * parseFloat(rate);
        }
    }

    for (var i = 0; i <= 14; i++) {
        rate        = $('#cate31text'+i).val();
        if($('#cate31'+i).is(":checked") && rate != '' && rate != 'inc'){
            total += parseFloat(rate);
        }
    }

    for (var i = 0; i <= 15; i++) {
        rate    = $('#others_rate'+i).val();
        
        if(rate != ''){
            total += parseFloat(rate);
        }
    }


    

    if($('#demolition_cost').val() != '')
    {
        total += parseFloat($('#demolition_cost').val());
    }

    if($('#land_clearing_cost').val() != '')
    {
        total += parseFloat($('#land_clearing_cost').val());
    }

    if($('#meter').val() != '' && $('#price_meter').val() != '')
    {
        total += parseFloat($('#meter').val()) * parseFloat($('#price_meter').val());
    }

    if($('#approval_cost').val() != '' && total != 0)
    {
        total += parseFloat($('#approval_cost').val());
    }

    $('#grand_total').val(total.toFixed(2));
}


$(function () {

    $('#quotation').submit(function(){
        string = 'Please correct the following errors on the form:';
        flag = 0;
        

        if($('#first_name').val() == ''){
            string += '<br>First name is required.';
            flag = 1;
        }
        if($('#last_name').val() == ''){
            string += '<br>Last name is required.';
            flag = 1;
        }
        if($('#email').val() == ''){
            string += '<br>Email address is required.';
            flag = 1;
        }
        if($('#remarks').val() == ''){
            string += "<br>'The quotation is based on' description is required.";
            flag = 1;
        }

        

        if(flag == 1){
            $('#validation-summary').html(string);
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }
    });



    $(".numners").keydown(function (event) {


        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

        } else {
            event.preventDefault();
        }
        
        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 110)
            event.preventDefault();

    });
});