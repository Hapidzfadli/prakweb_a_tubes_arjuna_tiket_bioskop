// Menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

$(document).ready(function(){
    $("#searchbar").bind("keypress click", function(){
        var value = $(this).val().toLowerCase();
        
        $('.list-nav li').filter(function(){
            $(this).toggle($(this).find('span').text().toLowerCase().indexOf(value) > -1)
        })
        $('.list-nav').removeClass( "d-none" );
        
    });
    $(document).on('click', function(){
        $('.list-nav').addClass( "d-none" );
    });
});