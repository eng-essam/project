$(function(){
    $('#governerate').on('change', function(){
        var selectedGovernerate = $('#governerate option:selected');
        var number = selectedGovernerate.val();
        $('#numberContainer').text('اطلب هذا الرقم : ' + number);
        
    
    });
});