// $(document).ready(function() {
//     $("#addItem1").click(function() {
//         var item = $("#itemInput1").val();
//         if (item !== '') {
//             $("#list1").append("<li>" + item + "</li>");
//             $("#itemInput1").val('');
//         }
//     });

//     $("#addItem2").click(function() {
//         var item = $("#itemInput2").val();
//         if (item !== '') {
//             $("#list2").append("<li>" + item + "</li>");
//             $("#itemInput2").val('');
//         }
//     });

//     $("#list1").on("click", "li", function() {
//         var item = $(this).text();
//         $("#list2").append("<li>" + item + "</li>");
//     });

//     $("#list2").on("click", "li", function() {
//         var item = $(this).text();
//         $("#list1").append("<li>" + item + "</li>");
//     });

//     $("#addAllTo2").click(function() {
//         $("#list1 li").each(function() {
//             var item = $(this).text();
//             $("#list2").append("<li>" + item + "</li>");
//         });
//     });

//     $("#addAllTo1").click(function() {
//         $("#list2 li").each(function() {
//             var item = $(this).text();
//             $("#list1").append("<li>" + item + "</li>");
//         });
//     });
// });

// without duplicating
$(document).ready(function() {
    $("#addItem1").click(function() {
        var item = $("#itemInput1").val();
        if (item !== '' && !isDuplicate(item, "#list1")) {
            $("#list1").append("<li>" + item + "</li>");
            $("#itemInput1").val('');
        }
    });

    $("#addItem2").click(function() {
        var item = $("#itemInput2").val();
        if (item !== '' && !isDuplicate(item, "#list2")) {
            $("#list2").append("<li>" + item + "</li>");
            $("#itemInput2").val('');
        }
    });

    function isDuplicate(item, listId) {
        var found = false;
        $(listId + " li").each(function() {
            if ($(this).text() === item) {
                found = true;
                return false; // Break out of the loop
            }
        });
        return found;
    }

    $("#list1").on("click", "li", function() {
        var item = $(this).text();
        if (!isDuplicate(item, "#list2")) {
            $("#list2").append("<li>" + item + "</li>");
        }
    });

    $("#list2").on("click", "li", function() {
        var item = $(this).text();
        if (!isDuplicate(item, "#list1")) {
            $("#list1").append("<li>" + item + "</li>");
        }
    });

    $("#addAllTo2").click(function() {
        $("#list1 li").each(function() {
            var item = $(this).text();
            if (!isDuplicate(item, "#list2")) {
                $("#list2").append("<li>" + item + "</li>");
            }
        });
    });

    $("#addAllTo1").click(function() {
        $("#list2 li").each(function() {
            var item = $(this).text();
            if (!isDuplicate(item, "#list1")) {
                $("#list1").append("<li>" + item + "</li>");
            }
        });
    });
});
