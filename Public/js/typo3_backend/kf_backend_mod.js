TYPO3.jQuery(document).ready(function($){

    var contentSub = $('.t3-grid-container .exampleContent');

    // substring previewtext
    if(contentSub.length>0){
        console.log("init: page_mod ... ");
        contentSub.each(function(){
            var that = $(this);
            var maxLength = 250;

            that.find(".t3-page-ce-body a").each(function(){
                var text = $(this).text();
                if(text.length > maxLength){
                    $(this).text(text.substring(0, maxLength)+"...");
                }
            });
        });
    }
});

