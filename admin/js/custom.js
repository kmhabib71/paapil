$(function() {
    
            var uid = $(".ui").data('uid');
            var pid = $(".ui").data('pid');
            $(document).on("click", ".filter_user", function() {
                var time = $(this).data("userfilter");


                $.post("https://paapil.com/core/ajax/adminUserFilter.php", {
                    time: time
                }, function(data) {
                    $('.userFilterTable').empty().html(data);

                })
               
            })
            $(document).on("click", ".delete-data", function() {
                var userDelete = $(this).data("deleteid");
                $("#delete-ok").attr("data-deleteid",userDelete);
                // $.post("https://paapil.com/core/ajax/admin.php", {
                //     userDelete: userDelete
                // }, function(data) {
                    
                //     $('.userFilterTable').empty().html(data);

                // })
               
               
            })
            $(document).on('click', '#delete-ok', function() {
                var deleteid = $(this).data('deleteid');
                $(this).removeData();


                // console.log(postid);
                $.post('https://paapil.com/core/ajax/admin.php', {
                    deleteUser: deleteid,
                    userid1: uid
                }, function(data) {
                    if (data.trim() !== '') {
                        $('.confirm-delete-tweet').text(data);
                        $('#delete-ok').hide();
                        $('#delete-no').text('Ok');
                        setTimeout(function() {
                            $('#delete-post').modal('hide');
                        }, 2000);



                    } else {
                        $('.confirm-delete-tweet').text("Tweet can't be deleted");

                    }
                })

            })

            $(document).on('click', '#delete-no', function() {
                $('#delete-post').modal('hide');
            })

        })
