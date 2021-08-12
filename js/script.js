$(document).ready(function() {
    $(".js-ajax-button-1").click(function(){
        $.ajax({
            type: "POST",
            url: "./php/ajax.php", 
            data: { 
                creatеDirectory: 'js-ajax-button-1', 
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-1").html(data);
            },
        });
    });

    $(".js-ajax-button-2").click(function(){
        $.ajax({
            type: "POST", 
            url: "./php/ajax.php", 
            data: { 
                findSharedFiles: 'js-ajax-button-2', 
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-2").html(data);
            },
        });
    });

    $(".js-ajax-button-3").click(function(){
        $.ajax({
            type: "POST",
            url: "./php/ajax.php",
            data: {
                findUniqueFilesFirstFolder: 'js-ajax-button-3',
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-3").html(data);
            },
        });
    });
    $(".js-ajax-button-4").click(function(){
        $.ajax({
            type: "POST", 
            url: "./php/ajax.php", 
            data: {
                findUniqueFilesSecondFolder: 'js-ajax-button-4',
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-4").html(data);
            },
        });
    });
    $(".js-ajax-button-5").click(function(){
        $.ajax({
            type: "POST", 
            url: "./php/ajax.php", 
            data: { 
                createThirdDirectory: 'js-ajax-button-5', 
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-5").html(data);
            },
        });
    });
    $(".js-ajax-button-6").click(function(){
        $.ajax({
            type: "POST", 
            url: "./php/ajax.php", 
            data: { 
                clearDirectory: 'js-ajax-button-6', 
            },
            success: function(data)
            {
                $(".js-answer-ajax-button-6").html(data);
            },
        });
    });
});
