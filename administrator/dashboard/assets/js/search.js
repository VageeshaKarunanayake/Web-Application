function search_filter()
{
    var filter = document.getElementById("filter").value;
    window.location.href = "http://chamodpriyamal.com/ccp/administrator/dashboard/search.php?filter="+filter;
}

function onstart()
{
    var sear = window.location.search;
    var parts = sear.split('=', 2);
    var x = parts[1];
    document.getElementById("filter_change").innerHTML = "FILTERED FOR :- " + x;
}