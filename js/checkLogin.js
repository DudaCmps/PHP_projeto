
document.addEventListener('DOMContentLoaded', () => {
    fetch('/locafast/auth/checkLogin.php')
        .then(response => response.json())
        .then(data => {
            if(data.logado) {
                document.getElementById('login-button').style.display = 'none';
                document.getElementById('conta-dropdown').style.display = 'flex';
                // colocar a inicial do nome no avatar
                document.querySelector('#conta-dropdown .avatar').textContent = data.nome[0].toUpperCase();
            } else {
                document.getElementById('login-button').style.display = 'flex';
                document.getElementById('conta-dropdown').style.display = 'none';
            }
        });
});
