(function ($) {
    // Get the path to action from CakePHP
    var autoCompleteSource = urlToAutocompleteAction;
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,        
        minLength: 1
        ,
        select: function (event, ui){
            $("#country-id").val(ui.item.values );
            $("#autocomplete").val(ui.item.label);
            return false;
        }
    });
})(jQuery);

