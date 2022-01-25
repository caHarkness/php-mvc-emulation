$(function() {
    $("#alert-container").hide();
});

fncAlertSuccess = function(strMessage)
{
    $("#alert-message")
        .removeClass("*")
        .addClass("alert alert-success")
        .text(strMessage);

    $("#alert-container")
        .hide()
        .fadeIn(400);
};

fncAlertWarning = function(strMessage)
{
    $("#alert-message")
        .removeClass("*")
        .addClass("alert alert-warning")
        .text(strMessage);

    $("#alert-container")
        .hide()
        .fadeIn(400);
};

fncAlertDanger = function(strMessage)
{
    $("#alert-message")
        .removeClass("*")
        .addClass("alert alert-danger")
        .text(strMessage);

    $("#alert-container")
        .hide()
        .fadeIn(400);
};