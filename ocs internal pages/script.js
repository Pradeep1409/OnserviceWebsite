$(document).ready(function() {
    $('.minus').click(function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});


//back top 
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
// responsive navbar  
function onClickMenu() {
    document.getElementById("menu").classList.toggle("change");
    document.getElementById("nav").classList.toggle("change");

    document.getElementById("menu-bg").classList.toggle("change-bg");

}

function onClickMenu() {
    document.getElementById("menuside").classList.toggle("change");
    document.getElementById("navside").classList.toggle("change");
    // document.getElementById("leftarrow").classList.toggle(" arrow");
    
    document.getElementById("menuside-bg").classList.toggle("change-bg");
    document.getElementById("sidearr").classList.toggle("pc_left");
    document.getElementById("sidearr").classList.add('pc_left');

}

// function onClickMenu() {
//     document.getElementById("menuside").classList.toggle("change");
//     document.getElementById("navside").classList.toggle("change");

//     document.getElementById("menuside-bg").classList.toggle("change-bg");
// }