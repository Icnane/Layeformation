<html><head><base href="https://layformation-login.com/">
    <title>LAYFORMATION - Connexion et Inscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f0f4f8;
            --text-color: #333;
            --light-text: #ecf0f1;
            --border-color: #ddd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }

        .header {
            background-color: #e74c3c;
            color: var(--light-text);
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin-bottom: 10px;
        }

        .tab-control {
            display: flex;
        }

        .tab-control button {
            flex: 1;
            background-color: #e74c3c;
            border: none;
            color: var(--light-text);
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .tab-control button.active {
            background-color: #e74c3c;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #e74c3c;
        }

        #loginForm, #registerForm {
            display: none;
        }

        #loginForm.active, #registerForm.active {
            display: block;
        }

        .error-message {
            color: #e74c3c;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LAYFORMATION</h1>
            <p>Connectez-vous </p>
        </div>
        <div class="tab-control">
            <button id="loginTab" class="active">Connexion</button>
            <!-- <button id="registerTab">Inscription</button> -->
        </div>
        <div class="form-container">
            <form id="loginForm" class="active">
                <div class="form-group">
                    <label for="loginEmail">Adresse e-mail</label>
                    <input type="email" id="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Mot de passe</label>
                    <input type="password" id="loginPassword" required>
                </div>
                <button type="submit" class="btn">Se connecter</button>
                <p class="error-message" id="loginError"></p>
            </form>
            <!-- <form id="registerForm">
                <div class="form-group">
                    <label for="registerLastName">Nom</label>
                    <input type="text" id="registerLastName" required>
                </div>
                <div class="form-group">
                    <label for="registerFirstName">Prénom</label>
                    <input type="text" id="registerFirstName" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Adresse e-mail</label>
                    <input type="email" id="registerEmail" required>
                </div>
                <div class="form-group">
                    <label for="registerSex">Sexe</label>
                    <select id="registerSex" required>
                        <option value="">Sélectionnez</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                        <option value="O">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Mot de passe</label>
                    <input type="password" id="registerPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" id="confirmPassword" required>
                </div>
                <button type="submit" class="btn">Créer un compte</button>
                <p class="error-message" id="registerError"></p>
            </form> -->
        </div>
    </div>

    <script>
        // Gestion des onglets
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        });

        // Fonction pour envoyer une requête au serveur
        async function sendRequest(url, method, data) {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
            return await response.json();
        }

        // Gestion de la connexion
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            try {
                const result = await sendRequest('/api/login', 'POST', { email, password });
                if (result.success) {
                    window.location.href = '/dashboard';
                } else {
                    document.getElementById('loginError').textContent = result.message;
                }
            } catch (error) {
                document.getElementById('loginError').textContent = "Une erreur s'est produite. Veuillez réessayer.";
            }
        });

        // Gestion de l'inscription
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const lastName = document.getElementById('registerLastName').value;
            const firstName = document.getElementById('registerFirstName').value;
            const email = document.getElementById('registerEmail').value;
            const sex = document.getElementById('registerSex').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('registerError').textContent = "Les mots de passe ne correspondent pas.";
                return;
            }

            try {
                const result = await sendRequest('/api/register', 'POST', { lastName, firstName, email, sex, password });
                if (result.success) {
                    alert("Compte créé avec succès. Vous pouvez maintenant vous connecter.");
                    loginTab.click();
                } else {
                    document.getElementById('registerError').textContent = result.message;
                }
            } catch (error) {
                document.getElementById('registerError').textContent = "Une erreur s'est produite. Veuillez réessayer.";
            }
        });
    </script>
</body></html>