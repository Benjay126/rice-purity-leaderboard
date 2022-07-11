function redirect() {
    var id = this.children[1].value
    console.log(id);
    window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
}