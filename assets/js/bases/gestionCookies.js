$(document).ready(function()
{
    //fonction pour récupérer un cookie
    function getCookie(cname)
    {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++)
        {
            var c = ca[i];
            while (c.charAt(0) == ' ')
            {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0)
            {
                return c.substring(name.length, c.length);
            }
        }
        return null;
    }

    function clearCookie(name, domain, path)
    {
        try {
            if (getCookie(name)) {
                var domain = domain || document.domain;
                var path = path || "/";
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + domain + "; path=" + path;
            }
        }
        catch(err) {}
    };

    $("#sncf_search_langue").change(function()
    {
        var cookieManager = getCookie("search_langue");
        if(cookieManager == "disabled")
        {
            //Suppression du cookie "search_langue"
            document.cookie = "search_langue=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
        //Création du cookie search_langue àenabled
        var expiryDate = new Date();
        expiryDate.setDate(expiryDate.getDate() + 1);
        var labels = [];
        $("#sncf_search_langue option:selected").each(function()
            {
                if ($(this).attr('label') !== undefined)
                {
                    labels.push($(this).attr('label'));
                }
                else
                {
                    labels.push($(this).html());
                }
            });
        var liste_langue = labels.join(', ') + '';

        document.cookie = 'search_langue='+ liste_langue +'; path=/; expires=' + expiryDate.toGMTString();
    });
    $("#sncf_search_entreprise").change(function()
    {
        var cookieManager = getCookie("search_entreprise");
        if(cookieManager == "disabled")
        {
            //Suppression du cookie "search_entreprise"
            document.cookie = "search_entreprise=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
        //Création du cookie search_entreprise àenabled
        var expiryDate = new Date();
        expiryDate.setDate(expiryDate.getDate() + 1);
        var labels = [];
        $("#sncf_search_entreprise option:selected").each(function()
            {
                if ($(this).attr('label') !== undefined)
                {
                    labels.push($(this).attr('label'));
                }
                else
                {
                    labels.push($(this).html());
                }
            });
        var liste_entreprise = labels.join(', ') + '';

        document.cookie = 'search_entreprise='+ liste_entreprise +'; path=/; expires=' + expiryDate.toGMTString();
    });


    function checkFilters()
    {
        var langues = getCookie('search_langue');
        if(langues !== null)
        {
            langues = langues.split(', ');
            var langues_indexes = [];
            $("#sncf_search_langue option").each(function()
                {
                    if (langues.includes($(this).html()))
                    {
                        langues_indexes.push($(this).attr('value'));
                        $(this).attr('selected','selected');
                    }
                });
            if (langues_indexes !== 0)
            {
                $("#sncf_search_langue").multiselect('select', langues_indexes);
                $("#sncf_search_langue").change();
            }
        }

        var entreprises = getCookie('search_entreprise');
        if(entreprises !== null)
        {
            entreprises = entreprises.split(', ');
            var entreprise_indexes = [];
            $("#sncf_search_entreprise option").each(function()
                {
                    if (entreprises.includes($(this).html()))
                    {
                        entreprise_indexes.push($(this).attr('value'));
                        $(this).attr('selected','selected');
                    }
                });
            if (entreprise_indexes.length !== 0)
            {
                $("#sncf_search_entreprise").multiselect('select', entreprise_indexes);
                $("#sncf_search_entreprise").change();
            }
        }
    }
    checkFilters();


});
