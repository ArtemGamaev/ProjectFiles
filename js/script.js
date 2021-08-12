$(document).ready(function() { // безопасная манипуляция на странице
    $(".js-ajax-button-1").click(function(){
        $.ajax({
            type: "POST", // метод отправки на бэкенд
            url: "./php/ajax.php", // путь к php файлу
            data: { // данные, которые мы отправляем на php
                creatеDirectory: 'js-ajax-button-1', // переменная, отправляемая на php
            },
            success: function(data)
            {
                // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                console.log(data, '11111111111111111111');
                $(".js-answer-ajax-button-1").html(data);
            },
        });
    });

    $(".js-ajax-button-2").click(function(){
        $.ajax({
            type: "POST", // метод отправки на бэкенд
            url: "./php/ajax.php", // путь к php файлу
            data: { // данные, которые мы отправляем на php
                findSharedFiles: 'js-ajax-button-2', // переменная, отправляемая на php
            },
            success: function(data)
            {
                // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                console.log(data, '11111111111111111111');
                $(".js-answer-ajax-button-2").html(data);
            },
        });
    });

    $(".js-ajax-button-3").click(function(){
        $.ajax({
            type: "POST", // метод отправки на бэкенд
            url: "./php/ajax.php", // путь к php файлу
            data: { // данные, которые мы отправляем на php
                findUniqueFilesFirstFolder: 'js-ajax-button-3', // переменная, отправляемая на php
            },
            success: function(data)
            {
                // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                console.log(data, '11111111111111111111');
                $(".js-answer-ajax-button-3").html(data);
            },
        });
    });
    $(".js-ajax-button-4").click(function(){
        $.ajax({
            type: "POST", // метод отправки на бэкенд
            url: "./php/ajax.php", // путь к php файлу
            data: { // данные, которые мы отправляем на php
                findUniqueFilesSecondFolder: 'js-ajax-button-4', // переменная, отправляемая на php
            },
            success: function(data)
            {
                // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                console.log(data, '11111111111111111111');
                $(".js-answer-ajax-button-4").html(data);
            },
        });
    });
    $(".js-ajax-button-5").click(function(){
        $.ajax({
            type: "POST", // метод отправки на бэкенд
            url: "./php/ajax.php", // путь к php файлу
            data: { // данные, которые мы отправляем на php
                createThirdDirectory: 'js-ajax-button-5', // переменная, отправляемая на php
            },
            success: function(data)
            {
                // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                console.log(data, '11111111111111111111');
                $(".js-answer-ajax-button-5").html(data);
            },
        });
    });
});
