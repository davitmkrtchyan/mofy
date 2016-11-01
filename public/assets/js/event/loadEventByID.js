$(document).ready(function () {

    // $('ul.nav-list>li').each(function () {
    //     var sportTypeLink = $(this);
    //     sportTypeLink.find('ul>li').each(function () {
    //         var countryLi = $(this);
    //         var countryLink = $(this).find('a');
    //         var countryName = '';
    //         var sportName = '';
    //         var groups = "";
    //         countryLink.click(function (e) {
    //             e.preventDefault();
    //             countryLi.find('ul.submenu').find('li').each(function (k, v) {
    //                 var splittedHref = $(this).find('a').attr('href').split("/");
    //                 countryName = splittedHref[4];
    //                 sportName = splittedHref[3];
    //                 groups = groups + splittedHref.pop() + "+";
    //             });
    //             $.ajax({
    //                 data: {
    //                     sportName: sportName,
    //                     countryName: countryName,
    //                     groupsList: groups.substring(0, groups.length - 1)
    //                 },
    //                 url: $("#loadCountForGroupsURL").val(),
    //                 success: function () {
    //                     alert(1);
    //                 },
    //                 error: function () {
    //                     alert(5);
    //                 }
    //             });
    //         });
    //     });
    // });

});