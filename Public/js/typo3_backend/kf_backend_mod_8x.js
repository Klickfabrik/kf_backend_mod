TYPO3.jQuery(document).ready(function($){

    var contentSub = $('.t3-grid-container .t3-page-ce-body-inner');

    // substring previewtext
    if(contentSub.length>0){
        console.log("init: page_mod ... ");
        contentSub.each(function(){
            var that = $(this);
            var maxLength = 250;

            that.find("a").each(function(){
                var text = $(this).text();
                if(text.length > maxLength){
                    $(this).text(text.substring(0, maxLength)+"...");
                }
            });
        });
    }
});