$(function(){
    checkMembershipControl();
    
    $('#membership_membershipControl').change(checkMembershipControl);
    
    function checkMembershipControl()
    {
        if ($('#membership_membershipControl').val() == 2) {
            $('#membership_membershipPasscode_control_group').show();
        } else {
            $('#membership_membershipPasscode_control_group').hide();
        }
    }
    
});