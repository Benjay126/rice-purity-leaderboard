window.addEventListener("load", () => {
    function num_sfx(num) {
        if (num % 10 == 1 && num != 11) { return 'st'; }
        else if (num % 10 == 2 && num != 12) { return 'nd'; }
        else if (num % 10 == 3 && num != 13) { return 'rd'; }
        else { return 'th'; }
    }

    var data = JSON.parse('[{"name": "BEN", "init_score": 50,"curr_score": 50},{"name": "RBY","init_score": 50,"curr_score": 50},{"name": "NOA","init_score": 50,"curr_score": 50},{"name": "MDM","init_score": 50,"curr_score": 50},{"name": "SHN","init_score": 50,"curr_score": 50},{"name": "TOB","init_score": 50,"curr_score": 50},{"name": "KEY","init_score": 50,"curr_score": 50},{"name": "JMS","init_score": 50,"curr_score": 50},{"name": "MLY","init_score": 50,"curr_score": 50},{"name": "JNG","init_score": 50,"curr_score": 50}]');
    data.sort(function (a, b) {
        return (b.init_score / b.curr_score) - (a.init_score / a.curr_score);
    });

    for (let i = 0; i < data.length; i++) {
        tableElem = document.getElementById('table');
        name = data[i].name;
        init_score = data[i].init_score;
        curr_score = data[i].curr_score
        score_change = Math.round(((init_score / curr_score) - 1) * 100)
        rank = (i + 1) + num_sfx(i + 1);
    }

    for (let i = 1; i < document.getElementById('table').children.length; i++) {
        console.log(document.getElementById('table').children[i].innerText);
    }
});

