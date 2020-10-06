# Browserdetection
###############################
lib.currentBrowser = TEXT
lib.currentBrowser {
    value = no_browser
    noTrimWrap = || |
}
[browser = msie] && [version = 6]
    lib.currentBrowser.value = ie6
[browser = msie] && [version = 7]
    lib.currentBrowser.value = ie7
[browser = msie] && [version = 8]
    lib.currentBrowser.value = ie8
[browser = msie] && [version = 9]
    lib.currentBrowser.value = ie9
[browser = msie] && [version = 10]
    lib.currentBrowser.value = ie10
[browser = msie] && [version = 11]
    lib.currentBrowser.value = ie11
[browser = msie] && [version > 11]
    lib.currentBrowser.value = ieedge
[browser = firefox]
    lib.currentBrowser.value = firefox
[browser = Safari]
    lib.currentBrowser.value = safari
[browser = opera]
    lib.currentBrowser.value = opera
[browser = chrome]
    lib.currentBrowser.value = chrome
[global]

# Systemdetection
###############################
lib.currentSystem < lib.currentBrowser
lib.currentSystem.value = no_system
[system = win]
    lib.currentSystem.value = win
[system = mac]
    lib.currentSystem.value = mac
[global]


# unique id on page
###############################
temp.body = COA
temp.body {
    10 = TEXT
    10 {
        field = uid
        noTrimWrap = | id="page_|"|
    }


    20 = TEXT
    20 {
        data = levelfield:-1, customTemplateClass, slide
        noTrimWrap = | class="| |
    }

    # languageClass
    21 = TEXT
    21 {
        value < config.language
        noTrimWrap = |lang_| |
    }

    # BrowserClass
    25 < lib.currentBrowser
    26 < lib.currentSystem

    # custom Class
    30 = TEXT
    30 {
        value =
        noTrimWrap = ||" |
    }

    wrap = <body |>
}





# Home-class
###############################
[globalVar = TSFE:id = 1]
    temp.body.30.value = home
[global]


page.bodyTagCObject < temp.body