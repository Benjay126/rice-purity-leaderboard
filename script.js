window.addEventListener("load", () => {
    function num_sfx(num) {
        if (num % 10 == 1 && num != 11) { return 'st'; }
        else if (num % 10 == 2 && num != 12) { return 'nd'; }
        else if (num % 10 == 3 && num != 13) { return 'rd'; }
        else { return 'th'; }
    }

    var data = JSON.parse('[{"name": "BEN", "init_score": 51,"curr_score": 50},{"name": "RBY","init_score": 41,"curr_score": 40},{"name": "NOA","init_score": 72,"curr_score": 72},{"name": "MDM","init_score": 63,"curr_score": 60},{"name": "SHN","init_score": 50,"curr_score": 50},{"name": "TOB","init_score": 61,"curr_score": 61},{"name": "KEY","init_score": 63,"curr_score": 63},{"name": "JMS","init_score": 34,"curr_score": 34},{"name": "MLY","init_score": 85,"curr_score": 85},{"name": "JNG","init_score": 81,"curr_score": 81}]');
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
        entryTemplate = `<tr><td>${rank}</td><th>${name}</th><th>${init_score}</th><th>${curr_score}</th><th>${score_change}%</td></tr>`;
        tableElem.innerHTML += entryTemplate;
        tableElem.addEventListener("click", function (e) {
            window.location.href = 'questions.html?id=' + e.target.parentNode.children[1].innerText;
        });
    }

    for (let i = 1; i < document.getElementById('table').children.length; i++) {
        console.log(document.getElementById('table').children[i].innerText);
    }
});

