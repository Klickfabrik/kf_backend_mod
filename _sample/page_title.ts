# **
# * Title: pages
# ***********************************************
config.noPageTitle = 2
temp.headertitle = COA
temp.headertitle {
    10 = TEXT
    10 {
        field =  customSeoTitle // nav_title // subtitle // title
        noTrimWrap= || - |
    }
    20 = TEXT
    20 {
        field = subtitle
        if.isTrue.field = subtitle
        noTrimWrap= || - |
    }

    30 = TEXT
    30 {
        data = TSFE : tmpl | setup | sitetitle
        noTrimWrap= |
        ifEmpty =
    }

    stdWrap.noTrimWrap = |    <title>|</title>||
}

page.headerData.10 < temp.headertitle