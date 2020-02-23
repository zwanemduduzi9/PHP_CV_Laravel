function confirmDelete(user_id){
    //console.log(user_id);
    $.confirm({
        theme: 'black',
        animationBounce: 2.5,
        closeIcon: true,
        cancelButtonClass: 'btn-primary',
        cancelButton:'Cancel',
        icon: 'fa fa-spinner fa-2x',
        title:'Danger!!!',
        content: 'You are about to delete a record, are your sure?',
        type: "blue",
        draggable: false,
        buttons: {
            tryAgain: {
                text: 'Confirm',
                btnClass: 'btn-primary',
                action: function(){
                            $.ajax({
                                type: 'GET',
                                url: "destroyUser/"+user_id,
                                dataType: "text",
                                success: function () {
                                   
                                    //slideSuccess('Records Deactivated successfully!!!', 3000);
                                    location.reload(); 
                                }
                            });
                }
            },
            cancel: function () {

            }
        }
    });



}