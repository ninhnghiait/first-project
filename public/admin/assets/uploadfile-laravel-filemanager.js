      // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
     // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
     var urlobj;
     var urlrs;
     function BrowseServer(obj, rs = null)
     {
        urlobj = obj;
        urlrs = rs;
        OpenServerBrowser('/laravel-filemanager?type=image', screen.width * 0.7, screen.height * 0.7 ) ;
     }

     function OpenServerBrowser( url, width, height )
     {
        var iLeft = (screen.width - width) / 2 ;
        var iTop = (screen.height - height) / 2 ;
        var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
        sOptions += ",width=" + width ;
        sOptions += ",height=" + height ;
        sOptions += ",left=" + iLeft ;
        sOptions += ",top=" + iTop ;
        var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
     }

     function SetUrl( url, width, height, alt )
     {
        num = url.search("photos") - 1;
        url = url.substr(num);
        document.getElementById(urlobj).value = url ;
        if (urlrs != null) document.getElementById(urlrs).src = url ;
        oWindow = null;
     }
