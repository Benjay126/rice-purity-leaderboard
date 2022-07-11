for (var i = 0; i < document.getElementById('table').children.length; i++) {
    document.getElementById('table').children.addEventListener('click', (e) => {
        var id = e.target.children[1].value
        console.log(id);
        window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
    });
}​