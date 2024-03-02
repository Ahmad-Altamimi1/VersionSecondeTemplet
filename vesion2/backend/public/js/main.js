function editB(hhhhhh, user_ID, access, name, user_AFN) {

    if (hhhhhh.checked) {
        $.post("js/main.php", { userallow: 1, userallowIDUB: user_ID, user_AFN: user_AFN, access: access, name: name },
            function (data) {
                $('#usermessage').html(data);
            });
    } else {
        $.post("js/main.php", { userallow: 0, userallowIDUB: user_ID, user_AFN: user_AFN, access: access, name: name },
            function (data) {
                $('#usermessage').html(data);
            });
    }
}

function edittaskboy(hhhhhh, task_ID, task) {

    if (hhhhhh.checked) {
        $.post("js/main.php", { userallow: 1, userallowIDtaskboy: task_ID, task: task },
            function (data) {
                $('#usermessage').html(data);
            });
    } else {
        $.post("js/main.php", { userallow: 0, userallowIDtaskboy: task_ID, task: task },
            function (data) {
                $('#usermessage').html(data);
            });
    }
}

function maketaskok(hhhhhh, task_ID, task, date, userid) {

    if (hhhhhh.checked) {
        $.post("js/main.php", { userallow: 1, userupdatetask: task_ID, task: task, date: date, userid: userid },
            function (data) {
                $('#usermessage').html(data);
            });
    } else {
        $.post("js/main.php", { userallow: 0, userupdatetask: task_ID, task: task, date: date, userid: userid },
            function (data) {
                $('#usermessage').html(data);
            });
    }
}